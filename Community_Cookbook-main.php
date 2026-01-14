<?php




// Handle quick like
/* if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like_recipe_id'])) {
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
 */
// This handles recipe submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    require_login();
    if (!verify_csrf($_POST['csrf'] ?? null)) {
        http_response_code(400);
        exit('Invalid CSRF token');
    }
    // This handles file upload
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
    $_SESSION['flash_success'] = 'Recipe submitted successfully! Click <a href="Recipe_Collection.php">here</a> to view it.';
    header('Location: community_cookbook.php');
    exit;
}
?>



<main class="container py-4">

    <section class="hero-section">
        <h1 class="hero-title">Community Cookbook</h1>
        <p class="hero-description">
            Share your favorite recipes and connect with fellow food enthusiasts.
        </p>
    </section>

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

    <?php if (current_user_email()): ?>
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
        <div class="alert alert-warning">Log in to submit recipes. <a href="login.php">Log in</a></div>
    <?php endif; ?>


</main>