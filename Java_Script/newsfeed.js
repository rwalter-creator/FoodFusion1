/* const API = 'https://www.themealdb.com/api/json/v1/1/random.php';

async function loadMeal() {
    try {
        const response = await fetch(API);
        const data = await response.json();
        const meal = data.meals[0];

        // Populate HTML
        document.getElementById('mealImage').src = meal.strMealThumb;
        document.getElementById('mealTitle').textContent = meal.strMeal;
        document.getElementById('mealDescription').textContent =
            meal.strInstructions.substring(0, 150) + '...'; // Short preview

        // Read More button opens full recipe in a new tab
        document.getElementById('readMoreBtn').onclick = () => {
            window.open(meal.strSource || meal.strYoutube, '_blank');
        };
    } catch (error) {
        console.error('Error fetching meal:', error);
    }
}

// Load on page ready
document.addEventListener('DOMContentLoaded', loadMeal);
 */





// TheMealDB v1 public API with test key 1
// Docs: https://www.themealdb.com/api.php
const API = 'https://www.themealdb.com/api/json/v1/1';

// DOM elements
const mealImg = document.getElementById('mealImg');
const mealTitle = document.getElementById('mealTitle');
const mealPreview = document.getElementById('mealPreview');
const viewBtn = document.getElementById('viewBtn');
const lastRefresh = document.getElementById('lastRefresh');

// Modal elements
const mealModalEl = document.getElementById('mealModal');
const mealModal = new bootstrap.Modal(mealModalEl);
const modalTitle = document.getElementById('modalTitle');
const modalImg = document.getElementById('modalImg');
const modalCategory = document.getElementById('modalCategory');
const modalArea = document.getElementById('modalArea');
const modalIngredients = document.getElementById('modalIngredients');
const modalInstructions = document.getElementById('modalInstructions');
const youtubeWrap = document.getElementById('youtubeWrap');
const modalYoutube = document.getElementById('modalYoutube');
const modalSource = document.getElementById('modalSource');

// Local storage keys
const LS_KEY = 'ff_meal_of_day';
const LS_TIME = 'ff_meal_of_day_ts';
const DAY_MS = 24 * 60 * 60 * 1000;

async function fetchJSON(url) {
    const res = await fetch(url);
    if (!res.ok) throw new Error('HTTP ' + res.status);
    return res.json();
}

function storeMeal(id) {
    localStorage.setItem(LS_KEY, String(id));
    localStorage.setItem(LS_TIME, String(Date.now()));
}

function getStoredMeal() {
    const id = localStorage.getItem(LS_KEY);
    const ts = Number(localStorage.getItem(LS_TIME));
    if (!id || !ts) return null;
    return { id: Number(id), ts };
}

function within24Hours(ts) {
    return Date.now() - ts < DAY_MS;
}

function formatTime(ts) {
    const d = new Date(ts);
    return `Last updated ${d.toLocaleDateString()} ${d.toLocaleTimeString()}`;
}

async function getMealOfDay() {
    const cached = getStoredMeal();
    if (cached && within24Hours(cached.ts)) {
        lastRefresh.textContent = formatTime(cached.ts);
        return lookupMeal(cached.id); // details by ID
    }
    // Fetch new random meal and cache its ID
    // Endpoint: random.php returns one full recipe
    // Source: TheMealDB docs
    const data = await fetchJSON(`${API}/random.php`);            // [1](https://freeapihub.com/apis/themealdb)[2](https://github.com/RiyanS07/TheMealDB)
    const meal = data.meals?.[0];
    if (!meal) throw new Error('No meal returned');
    storeMeal(meal.idMeal);
    lastRefresh.textContent = formatTime(Date.now());
    return meal;
}

async function lookupMeal(id) {
    const data = await fetchJSON(`${API}/lookup.php?i=${id}`);    // [1](https://freeapihub.com/apis/themealdb)[3](https://deepwiki.com/iamgerwin/mealdb-rag-system-python/5.1-themealdb-api-integration)
    return data.meals?.[0];
}

function previewText(instr, len = 130) {
    if (!instr) return 'Instructions unavailable.';
    const t = instr.replace(/\s+/g, ' ').trim();
    return t.length > len ? t.slice(0, len) + '...' : t;
}

function renderCard(meal) {
    mealImg.src = meal.strMealThumb || '';
    mealImg.alt = meal.strMeal || 'Meal';
    mealTitle.textContent = meal.strMeal || 'Meal';
    const catArea = [meal.strCategory, meal.strArea].filter(Boolean).join(' • ');
    mealPreview.textContent = `${catArea ? catArea + ' — ' : ''}${previewText(meal.strInstructions)}`;

    viewBtn.onclick = async (e) => {
        e.preventDefault();
        const full = await lookupMeal(meal.idMeal);
        openModal(full);
    };
}

function openModal(meal) {
    modalTitle.textContent = meal.strMeal || 'Recipe';
    modalImg.src = meal.strMealThumb || '';
    modalImg.alt = meal.strMeal || 'Recipe';
    modalCategory.textContent = meal.strCategory || '';
    modalArea.textContent = meal.strArea || '';
    modalIngredients.innerHTML = '';
    for (let i = 1; i <= 20; i++) {
        const ing = meal[`strIngredient${i}`];
        const qty = meal[`strMeasure${i}`];
        if (ing && ing.trim()) {
            const li = document.createElement('li');
            li.textContent = `${qty ? qty + ' ' : ''}${ing}`.trim();
            modalIngredients.appendChild(li);
        }
    }
    modalInstructions.textContent = meal.strInstructions || 'No instructions available.';

    // YouTube embed if available
    if (meal.strYoutube) {
        try {
            const id = new URL(meal.strYoutube).searchParams.get('v');
            if (id) {
                modalYoutube.src = `https://www.youtube.com/embed/${id}`;
                youtubeWrap.classList.remove('d-none');
            } else {
                youtubeWrap.classList.add('d-none');
                modalYoutube.src = '';
            }
        } catch {
            youtubeWrap.classList.add('d-none');
            modalYoutube.src = '';
        }
    } else {
        youtubeWrap.classList.add('d-none');
        modalYoutube.src = '';
    }

    // External source link
    if (meal.strSource) {
        modalSource.href = meal.strSource;
        modalSource.classList.remove('d-none');
    } else {
        modalSource.classList.add('d-none');
        modalSource.removeAttribute('href');
    }

    mealModal.show();
}

// Initialize
(async function init() {
    try {
        const meal = await getMealOfDay();
        renderCard(meal);
    } catch (err) {
        console.error(err);
        mealTitle.textContent = 'Unable to load recipe';
        mealPreview.textContent = 'Please try again later.';
    }
})();

// Optional auto-refresh check at page view
// This re-checks the 24-hour rule when the tab regains focus
window.addEventListener('focus', async () => {
    const cached = getStoredMeal();
    if (!cached || !within24Hours(cached.ts)) {
        const meal = await getMealOfDay();
        renderCard(meal);
    }
});

