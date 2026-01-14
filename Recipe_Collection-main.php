<?php
// Fetch cuisines for the submission form
$stmtCuisine = $pdo->query("SELECT id, name FROM cuisines;");
$cuisines = $stmtCuisine->fetchAll();

// Fetch recipes with author name and like count
$stmtRecipes = $pdo->query("

SELECT 

    r.id, 
    r.title, 
    r.image_path, 
    r.difficulty, 
    r.dietary_pref, 
    r.created_at,
    c.name AS cuisine_name,
    CONCAT(u.first_name, ' ', u.last_name) AS author
    
FROM recipes r
LEFT JOIN cuisines c ON r.cuisine_id = c.id
LEFT JOIN users u ON r.user_id = u.id
ORDER BY r.created_at DESC;

");
$recipes = $stmtRecipes->fetchAll();
?>
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


    <!-- Recipe Grid to move to Recipe_Collection-->
    <!-- <section>
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h4 mb-0">Community Recipes</h2>
        </div>
        <div class="row g-4">
            <?php foreach ($recipes as $r): ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <?php if (!empty($r['image_path'])): ?>
                            <img src="<?= e($r['image_path']) ?>" alt="<?= e($r['title']) ?>" class="card-img-top recipe-card-img">
                        <?php else: ?>
                            <img src="/assets/placeholder.jpg" alt="Recipe image" class="card-img-top recipe-card-img">
                        <?php endif; ?>
                        <h3 class="h5 card-title mb-1"><?= e($r['title']) ?></h3>
                        <p class="card-subtitle text-muted mb-2">By <?= e($r['author']) ?> · <?= e($r['cuisine_name']) ?></p>
                        <div class="mb-2">
                            <span class="badge text-bg-secondary"><?= e($r['difficulty']) ?></span>
                            <span class="badge text-bg-info"><?= e($r['dietary_pref']) ?></span>
                        </div>
                        <p class="text-muted small">Posted on <?= e(date('M j, Y', strtotime($r['created_at']))) ?></p>
                    </div>
                    <div class="card-footer bg-white">
                        <form method="post" action="community_cookbook.php" class="d-flex align-items-center gap-2">
                            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                            <input type="hidden" name="like_recipe_id" value="<?= (int)$r['id'] ?>">
                            <a class="btn btn-primary btn-sm" href="recipe_view.php?id=<?= (int)$r['id'] ?>">View Recipe</a>
                        </form>
                    </div>
                </div>
        </div>
    <?php endforeach; ?>
    <?php if (!$recipes): ?>
        <div class="col-12">
            <div class="alert alert-info">No recipes yet. Be the first to share one.</div>
        </div>
    <?php endif; ?>
    </div>
    </section> -->

        <?php if (current_user_email()): ?>

    <?php foreach ($recipes as $r): ?>

        <div class="recipe-card" data-category="lunch" data-cuisine="american" data-dietary="gluten-free dairy-free" data-difficulty="easy">
            <div class="recipe-image">
                <?php if (!empty($r['image_path'])): ?>
                    <img src="<?= e($r['image_path']) ?>" alt="<?= e($r['title']) ?>" class="card-img-top recipe-card-img">
                <?php else: ?>
                    <img src="/assets/placeholder.jpg" alt="Recipe image" class="card-img-top recipe-card-img">
                <?php endif; ?>
            </div>
            <div class="recipe-content">
                <h3 class="recipe-title"><?= e($r['title']) ?></h3>
                <div class="recipe-meta">
                    <span class="dietary"><?= e($r['dietary_pref']) ?></span>
                    <span class="difficulty"><?= e($r['difficulty']) ?></span>
                    <span><?= e($r['cuisine_name']) ?></span>
                    <span>By <?= e($r['author']) ?></span>
                </div>
                <button class="view-recipe-btn">View Recipe</button>
            </div>
        </div>

    <?php endforeach; ?>


    </div>
    </section>
<?php else: ?>
        <div class="alert alert-warning">Log in to view recipes. <a href="login.php">Log in</a></div>
    <?php endif; ?>

</main>