<?php
require __DIR__ . '/app/config/config.php';

// Fetch cuisines for the submission form
$stmtCuisine = $pdo->query("SELECT id, name FROM cuisines ORDER BY name ASC");
$cuisines = $stmtCuisine->fetchAll();

// Fetch recipes with author name and like count
$stmtRecipes = $pdo->query("
    SELECT r.id, r.title, r.image_path, r.difficulty, r.dietary_pref, r.created_at,
           COALESCE(c.name, 'Unknown') AS cuisine_name,
           CONCAT(u.first_name, ' ', u.last_name) AS author,
           (SELECT COUNT(*) FROM recipe_likes rl WHERE rl.recipe_id = r.id) AS likes_count
    FROM recipes r
    LEFT JOIN cuisines c ON r.cuisine_id = c.id
    LEFT JOIN users u ON r.user_id = u.id
    ORDER BY r.created_at DESC
");
$recipes = $stmtRecipes->fetchAll();

// Handle quick like
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like_recipe_id'])) {
    require_login();
    if (!verify_csrf($_POST['csrf'] ?? null)) {
        http_response_code(400);
        exit('Invalid CSRF token');
    }
    $recipeId = (int)$_POST['like_recipe_id'];
    $uid = current_user_id();
    try {
        $stmt = $pdo->prepare("INSERT INTO recipe_likes (recipe_id, user_id) VALUES (?, ?)");
        $stmt->execute([$recipeId, $uid]);
        $_SESSION['flash_success'] = 'Thanks for liking this recipe';
    } catch (PDOException $e) {
        // Duplicate likes are ignored
        $_SESSION['flash_info'] = 'You have already liked this recipe';
    }
    header('Location: community_cookbook.php');
    exit;
}

// Handle recipe submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    require_login();
    if (!verify_csrf($_POST['csrf'] ?? null)) {
        http_response_code(400);
        exit('Invalid CSRF token');
    }
    // Handle file upload
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }
    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO recipes (user_id, title, cuisine_id, dietary_pref, difficulty, image_path, ingredients, instructions, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->execute([current_user_id(), $_POST['title'], $_POST['cuisine_id'] ?: null, $_POST['dietary_pref'], $_POST['difficulty'], $imagePath, $_POST['ingredients'], $_POST['instructions']]);
    $_SESSION['flash_success'] = 'Recipe submitted successfully!';
    header('Location: community_cookbook.php');
    exit;
}
?>
<main class="container py-4">
    <div class="row">
        <div class="col-12">
            <h1 class="display-6">Community Cookbook</h1>
            <p class="text-secondary">Share your favorite recipes and connect with fellow food enthusiasts.</p>
        </div>
    </div>

    <!-- Flash messages -->
    <?php if (!empty($_SESSION['flash_success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= e($_SESSION['flash_success']);
            unset($_SESSION['flash_success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['flash_info'])): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= e($_SESSION['flash_info']);
            unset($_SESSION['flash_info']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['form_errors'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach ($_SESSION['form_errors'] as $err): ?>
                    <li><?= e($err) ?></li>
                <?php endforeach;
                unset($_SESSION['form_errors']); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (current_user_id()): ?>
        <!-- Submit Recipe -->
        <section class="mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <strong>Submit a Recipe</strong>
                </div>
                <div class="card-body">
                    <form action="community_cookbook.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                        <div class="mb-3">
                            <label for="title" class="form-label">Recipe Name</label>
                            <input type="text" id="title" name="title" class="form-control" maxlength="200" required>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="cuisine_id" class="form-label">Cuisine Type</label>
                                <select id="cuisine_id" name="cuisine_id" class="form-select">
                                    <option value="">Select a cuisine</option>
                                    <?php foreach ($cuisines as $c): ?>
                                        <option value="<?= (int)$c['id'] ?>"><?= e($c['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="dietary_pref" class="form-label">Dietary Preference</label>
                                <select id="dietary_pref" name="dietary_pref" class="form-select" required>
                                    <option value="None">None</option>
                                    <option value="Vegetarian">Vegetarian</option>
                                    <option value="Vegan">Vegan</option>
                                    <option value="Gluten-Free">Gluten-Free</option>
                                    <option value="Halal">Halal</option>
                                    <option value="Kosher">Kosher</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mt-0">
                            <div class="col-md-6">
                                <label for="difficulty" class="form-label">Cooking Difficulty</label>
                                <select id="difficulty" name="difficulty" class="form-select" required>
                                    <option value="Easy">Easy</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Hard">Hard</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Upload Image (JPG or PNG, max 2 MB)</label>
                                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="ingredients" class="form-label">Ingredients</label>
                            <textarea id="ingredients" name="ingredients" class="form-control" rows="5" required placeholder="List ingredients with measurements"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="instructions" class="form-label">Instructions</label>
                            <textarea id="instructions" name="instructions" class="form-control" rows="7" required placeholder="Step by step directions"></textarea>
                        </div>

                        <div class="d-grid d-md-flex gap-2">
                            <button class="btn btn-primary" type="submit">Share Recipe</button>
                            <button class="btn btn-outline-secondary" type="reset">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php else: ?>
        <div class="alert alert-warning">Log in to submit, like, or comment on recipes. <a href="login.php">Log in</a></div>
    <?php endif; ?>

    <!-- Recipe Grid -->
    <section>
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
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                ❤️ Like <span class="badge text-bg-light ms-1"><?= (int)$r['likes_count'] ?></span>
                            </button>
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
    </section>
</main>