const API = 'https://www.themealdb.com/api/json/v1/1/random.php';

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

