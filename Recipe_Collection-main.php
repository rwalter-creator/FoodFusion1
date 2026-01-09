<?php ?>
<main class="recipes-page">
    <section class="hero-section">
        <h1 class="hero-title">Recipe Collection</h1>
        <h2 class="hero-subtitle">Discover Delicious Recipes from Around the World</h2>
        <p class="hero-description">
            Explore our curated collection of recipes, from quick weeknight meals to gourmet dishes. Find inspiration for your next culinary adventure.
        </p>
    </section>

    <section class="search-section">
        <h2 class="section-title">Find Your Perfect Recipe</h2>
        <div class="search-container">
            <input type="text" id="recipeSearch" placeholder="Search recipes..." class="search-input">
            <button class="search-btn">Search</button>
        </div>
        <div class="filter-options">
            <select id="categoryFilter" class="filter-select">
                <option value="">All Categories</option>
                <option value="breakfast">Breakfast</option>
                <option value="lunch">Lunch</option>
                <option value="dinner">Dinner</option>
                <option value="dessert">Dessert</option>
                <option value="snack">Snack</option>
            </select>
            <select id="cuisineFilter" class="filter-select">
                <option value="">All Cuisines</option>
                <option value="american">Caribbean</option>
                <option value="italian">Italian</option>
                <option value="mexican">Mexican</option>
                <option value="asian">Asian</option>
                <option value="mediterranean">Mediterranean</option>
                <option value="american">American</option>
            </select>
        </div>
    </section>

    <section class="recipes-grid-section">
        <h2 class="section-title">Featured Recipes</h2>
        <div class="recipes-grid">
            <div class="recipe-card">
                <div class="recipe-image">
                    <img src="pics/fresh-vegetable-salad-with-grilled-chicken-breast.jpg" alt="Grilled Chicken Salad">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Grilled Chicken Salad</h3>
                    <p class="recipe-description">A healthy and delicious salad with grilled chicken breast, fresh vegetables, and a light dressing.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 15 min</span>
                        <span class="cook-time">Cook: 20 min</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card">
                <div class="recipe-image">
                    <img src="pics/hot-spicy-stew-eggplant-sweet-pepper-olives-capers-with-basil-leaves.jpg" alt="Spicy Eggplant Stew">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Spicy Eggplant Stew</h3>
                    <p class="recipe-description">A hearty stew with eggplant, sweet peppers, olives, and capers, flavored with fresh basil.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 20 min</span>
                        <span class="cook-time">Cook: 30 min</span>
                        <span class="difficulty">Medium</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card">
                <div class="recipe-image">
                    <img src="pics/penne-pasta-tomato-sauce-with-chicken-tomatoes-wooden-table.jpg" alt="Chicken Penne Pasta">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Chicken Penne Pasta</h3>
                    <p class="recipe-description">Creamy penne pasta with tender chicken pieces and fresh tomatoes in a rich sauce.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 10 min</span>
                        <span class="cook-time">25 min</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card">
                <div class="recipe-image">
                    <img src="pics/fresh-vegetable-salad-with-grilled-chicken-breast.jpg" alt="Mediterranean Quinoa Bowl">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Mediterranean Quinoa Bowl</h3>
                    <p class="recipe-description">Nutritious quinoa bowl with fresh vegetables, feta cheese, and olive oil dressing.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 15 min</span>
                        <span class="cook-time">15 min</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card">
                <div class="recipe-image">
                    <img src="pics/hot-spicy-stew-eggplant-sweet-pepper-olives-capers-with-basil-leaves.jpg" alt="Thai Green Curry">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Thai Green Curry</h3>
                    <p class="recipe-description">Authentic Thai green curry with coconut milk, vegetables, and aromatic spices.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 20 min</span>
                        <span class="cook-time">25 min</span>
                        <span class="difficulty">Medium</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card">
                <div class="recipe-image">
                    <img src="pics/penne-pasta-tomato-sauce-with-chicken-tomatoes-wooden-table.jpg" alt="Classic Beef Tacos">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Classic Beef Tacos</h3>
                    <p class="recipe-description">Traditional beef tacos with seasoned ground beef, fresh toppings, and corn tortillas.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 15 min</span>
                        <span class="cook-time">15 min</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>
        </div>
    </section>


</main>