const cookieContainer = document.querySelector(".cookie-container");
const cookieButton = document.querySelector(".cookie-btn");

cookieButton.addEventListener("click", () => {
    cookieContainer.classList.remove("active");
    localStorage.setItem("cookieBannerDisplayed","true");
});

setTimeout(     ()  =>  {
    if(!localStorage.getItem("cookieBannerDisplayed"))
        cookieContainer.classList.add("active");
},   2000);

// Recipe filtering functionality
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('categoryFilter');
    const cuisineFilter = document.getElementById('cuisineFilter');
    const dietaryFilter = document.getElementById('dietaryFilter');
    const difficultyFilter = document.getElementById('difficultyFilter');
    const recipeCards = document.querySelectorAll('.recipe-card');

    function filterRecipes() {
        const selectedCategory = categoryFilter.value;
        const selectedCuisine = cuisineFilter.value;
        const selectedDietary = dietaryFilter.value;
        const selectedDifficulty = difficultyFilter.value;

        recipeCards.forEach(card => {
            const category = card.dataset.category;
            const cuisine = card.dataset.cuisine;
            const dietary = card.dataset.dietary;
            const difficulty = card.dataset.difficulty;

            const categoryMatch = !selectedCategory || category === selectedCategory;
            const cuisineMatch = !selectedCuisine || cuisine === selectedCuisine;
            const dietaryMatch = !selectedDietary || dietary.split(' ').includes(selectedDietary);
            const difficultyMatch = !selectedDifficulty || difficulty === selectedDifficulty;

            if (categoryMatch && cuisineMatch && dietaryMatch && difficultyMatch) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    categoryFilter.addEventListener('change', filterRecipes);
    cuisineFilter.addEventListener('change', filterRecipes);
    dietaryFilter.addEventListener('change', filterRecipes);
    difficultyFilter.addEventListener('change', filterRecipes);
});



