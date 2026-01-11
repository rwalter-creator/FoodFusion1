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
            <select id="dietaryFilter" class="filter-select">
                <option value="">All Dietary Preferences</option>
                <option value="vegetarian">Vegetarian</option>
                <option value="vegan">Vegan</option>
                <option value="gluten-free">Gluten-Free</option>
                <option value="dairy-free">Dairy-Free</option>
                <option value="keto">Keto</option>
                <option value="paleo">Paleo</option>
            </select>
            <select id="difficultyFilter" class="filter-select">
                <option value="">All Difficulties</option>
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
        </div>
    </section>

    <section class="recipes-grid-section">
        <h2 class="section-title">Featured Recipes</h2>
        <div class="recipes-grid">
            <div class="recipe-card" data-category="lunch" data-cuisine="american" data-dietary="gluten-free dairy-free" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/fresh-vegetable-salad-with-grilled-chicken-breast.jpg" alt="Grilled Chicken Salad">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Grilled Chicken Salad</h3>
                    <p class="recipe-description">A healthy and delicious salad with grilled chicken breast, fresh vegetables, and a light dressing.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 15 min</span>
                        <span class="cook-time">Cook: 20 min</span>
                        <span class="dietary">Gluten-Free, Dairy-Free</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="dinner" data-cuisine="mediterranean" data-dietary="vegan vegetarian" data-difficulty="medium">
                <div class="recipe-image">
                    <img src="pics/hot-spicy-stew-eggplant-sweet-pepper-olives-capers-with-basil-leaves.jpg" alt="Spicy Eggplant Stew">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Spicy Eggplant Stew</h3>
                    <p class="recipe-description">A hearty stew with eggplant, sweet peppers, olives, and capers, flavored with fresh basil.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 20 min</span>
                        <span class="cook-time">Cook: 30 min</span>
                        <span class="dietary">Vegan, Vegetarian</span>
                        <span class="difficulty">Medium</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="dinner" data-cuisine="italian" data-dietary="" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/penne-pasta-tomato-sauce-with-chicken-tomatoes-wooden-table.jpg" alt="Chicken Penne Pasta">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Chicken Penne Pasta</h3>
                    <p class="recipe-description">Creamy penne pasta with tender chicken pieces and fresh tomatoes in a rich sauce.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 10 min</span>
                        <span class="cook-time">25 min</span>
                        <span class="dietary">Standard</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="lunch" data-cuisine="mediterranean" data-dietary="vegetarian gluten-free" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/mediterranean-quinoa-bowl-hero.jpg" alt="Mediterranean Quinoa Bowl">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Mediterranean Quinoa Bowl</h3>
                    <p class="recipe-description">Nutritious quinoa bowl with fresh vegetables, feta cheese, and olive oil dressing.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 15 min</span>
                        <span class="cook-time">15 min</span>
                        <span class="dietary">Vegetarian, Gluten-Free</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="dinner" data-cuisine="asian" data-dietary="vegan vegetarian gluten-free dairy-free" data-difficulty="medium">
                <div class="recipe-image">
                    <img src="pics/Green-curry-chicken-sq-2.jpg" alt="Thai Green Curry">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Thai Green Curry</h3>
                    <p class="recipe-description">Authentic Thai green curry with coconut milk, vegetables, and aromatic spices.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 20 min</span>
                        <span class="cook-time">25 min</span>
                        <span class="dietary">Vegan, Vegetarian, Gluten-Free, Dairy-Free</span>
                        <span class="difficulty">Medium</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="dinner" data-cuisine="mexican" data-dietary="" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/classic beef tacos.jpg" alt="Classic Beef Tacos">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Classic Beef Tacos</h3>
                    <p class="recipe-description">Traditional beef tacos with seasoned ground beef, fresh toppings, and corn tortillas.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 15 min</span>
                        <span class="cook-time">15 min</span>
                        <span class="dietary">Standard</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>
            <div class="recipe-card" data-category="dinner" data-cuisine="american" data-dietary="" data-difficulty="medium">
                <div class="recipe-image">
                    <img src="pics/closeup-roasted-meat-with-sauce-vegetables-fries-plate-table.jpg" alt="Roasted Beef with Vegetables and Fries">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Roasted Beef with Vegetables and Fries</h3>
                    <p class="recipe-description">Juicy roasted beef served with fresh vegetables and crispy fries, topped with a rich sauce.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 20 min</span>
                        <span class="cook-time">45 min</span>
                        <span class="dietary">Standard</span>
                        <span class="difficulty">Medium</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="dinner" data-cuisine="american" data-dietary="" data-difficulty="hard">
                <div class="recipe-image">
                    <img src="pics/high-angle-delicious-brazilian-food-composition.jpg" alt="Brazilian Feijoada">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Brazilian Feijoada</h3>
                    <p class="recipe-description">Traditional Brazilian black bean stew with pork, served with rice, collard greens, and farofa.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 30 min</span>
                        <span class="cook-time">2 hours</span>
                        <span class="dietary">Standard</span>
                        <span class="difficulty">Hard</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="dinner" data-cuisine="american" data-dietary="gluten-free" data-difficulty="medium">
                <div class="recipe-image">
                    <img src="pics/chicken-roll-breast-wooden-plate-arranged-with-vegetable-pieces.jpg" alt="Chicken Roll with Vegetables">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Chicken Roll with Vegetables</h3>
                    <p class="recipe-description">Tender chicken breast rolled and served with a colorful array of fresh vegetables.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 25 min</span>
                        <span class="cook-time">30 min</span>
                        <span class="dietary">Gluten-Free</span>
                        <span class="difficulty">Medium</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="breakfast" data-cuisine="american" data-dietary="vegan vegetarian gluten-free dairy-free" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/delicious-berry-bowl-breakfast.jpg" alt="Berry Breakfast Bowl">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Berry Breakfast Bowl</h3>
                    <p class="recipe-description">A refreshing bowl of mixed berries, perfect for a healthy morning start.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 5 min</span>
                        <span class="cook-time">0 min</span>
                        <span class="dietary">Vegan, Vegetarian, Gluten-Free, Dairy-Free</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="lunch" data-cuisine="mediterranean" data-dietary="vegan vegetarian gluten-free dairy-free" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/delicious-veggie-dishes-still-life.jpg" alt="Vegetable Medley">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Vegetable Medley</h3>
                    <p class="recipe-description">A vibrant assortment of seasonal vegetables, lightly seasoned and steamed to perfection.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 15 min</span>
                        <span class="cook-time">20 min</span>
                        <span class="dietary">Vegan, Vegetarian, Gluten-Free, Dairy-Free</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="dinner" data-cuisine="mediterranean" data-dietary="vegan vegetarian gluten-free dairy-free" data-difficulty="medium">
                <div class="recipe-image">
                    <img src="pics/front-view-pearl-barley-with-tasty-cooked-vegetable.jpg" alt="Pearl Barley with Vegetables">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Pearl Barley with Vegetables</h3>
                    <p class="recipe-description">Nutritious pearl barley cooked with a medley of fresh, tasty vegetables.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 10 min</span>
                        <span class="cook-time">40 min</span>
                        <span class="dietary">Vegan, Vegetarian, Gluten-Free, Dairy-Free</span>
                        <span class="difficulty">Medium</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="lunch" data-cuisine="mediterranean" data-dietary="vegan vegetarian gluten-free dairy-free" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/healthy-salad-with-avocadolettucetomato-chickpeas-wooden-table.jpg" alt="Avocado Chickpea Salad">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Avocado Chickpea Salad</h3>
                    <p class="recipe-description">Fresh salad with creamy avocado, crisp lettuce, juicy tomatoes, and protein-rich chickpeas.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 15 min</span>
                        <span class="cook-time">0 min</span>
                        <span class="dietary">Vegan, Vegetarian, Gluten-Free, Dairy-Free</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="breakfast" data-cuisine="american" data-dietary="keto gluten-free" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/plate-with-keto-diet-food-fried-egg-bacon-avocado-arugula-strawberries-keto-breakfast.jpg" alt="Keto Breakfast Plate">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Keto Breakfast Plate</h3>
                    <p class="recipe-description">Low-carb breakfast featuring fried egg, bacon, avocado, arugula, and fresh strawberries.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 10 min</span>
                        <span class="cook-time">10 min</span>
                        <span class="dietary">Keto, Gluten-Free</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="lunch" data-cuisine="asian" data-dietary="vegan vegetarian gluten-free dairy-free" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/quinoa-mushrooms-lettuce-red-cabbage-spinach-cucumbers-tomatoes-buddha-bowl.jpg" alt="Quinoa Buddha Bowl">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Quinoa Buddha Bowl</h3>
                    <p class="recipe-description">Nutritious bowl with quinoa, mushrooms, mixed greens, red cabbage, spinach, cucumbers, and tomatoes.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 20 min</span>
                        <span class="cook-time">15 min</span>
                        <span class="dietary">Vegan, Vegetarian, Gluten-Free, Dairy-Free</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>

            <div class="recipe-card" data-category="lunch" data-cuisine="american" data-dietary="gluten-free dairy-free" data-difficulty="easy">
                <div class="recipe-image">
                    <img src="pics/top-view-healthy-diet-salad-with-grilled-chicken-broccoli-cauliflower-tomato-lettuce-avocado-lettuce.jpg" alt="Grilled Chicken Salad Bowl">
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">Grilled Chicken Salad Bowl</h3>
                    <p class="recipe-description">Healthy salad bowl with grilled chicken, broccoli, cauliflower, tomatoes, lettuce, and avocado.</p>
                    <div class="recipe-meta">
                        <span class="prep-time">Prep: 15 min</span>
                        <span class="cook-time">20 min</span>
                        <span class="dietary">Gluten-Free, Dairy-Free</span>
                        <span class="difficulty">Easy</span>
                    </div>
                    <button class="view-recipe-btn">View Recipe</button>
                </div>
            </div>
        </div>
    </section>


</main>