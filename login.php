<?php
require 'app/config/database.php';
require 'app/models/user.php';

$userModel = new User($conn);
$errormsg = '';

session_start();

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}

if (!isset($_SESSION['lock_time'])) {
    $_SESSION['lock_time'] = 0;
}

if (isset($_POST['LoginBtn'])) {
    // Check if locked
    if ($_SESSION['attempts'] >= 2) {
        if (time() - $_SESSION['lock_time'] < 180) {
            $errormsg = "<strong>Too many failed attempts.</strong> Try again after 3 minutes.";
            exit;
        } else {
            // Reset after 3 minutes
            $_SESSION['attempts'] = 0;
            $_SESSION['lock_time'] = 0;
        }
    }

    $login_email = trim($_POST['loginemail']);
    $login_password = trim($_POST['loginpassword']);

    $userresult = $userModel->findemail($login_email);

    if ($userresult != null) {
        $useremail = $userresult['email'];
        $userpassword = $userresult['password'];

        if ($useremail == $login_email && password_verify($login_password, $userpassword)) {
            $_SESSION['email'] = $userresult['email'];
            $_SESSION['first_name'] = $userresult['first_name'];

            $_SESSION['id'] = $userresult['id'];
            $_SESSION['attempts'] = 0;
            $_SESSION['lock_time'] = 0;

            header('Location: index.php');
            exit;
        } else {
            $errormsg = "Invalid Password!";
            $_SESSION['attempts']++;
            if ($_SESSION['attempts'] >= 3) {
                $_SESSION['lock_time'] = time();
            }
        }
    } else {
        $errormsg = "User not found!";
        $_SESSION['attempts']++;
        if ($_SESSION['attempts'] >= 3) {
            $_SESSION['lock_time'] = time();
        }
    }
}


?>

<!-- u:admin@foodfusion.com
p:foodfusionadmin -->


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food Fusion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- This is to make the page responsive -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="css/css.css" rel="stylesheet" type="text/css"> <!-- This is to link the page to the CSS -->
</head>

<body>
    <div class="main-container">
        <?php include 'header.php'; ?>
        <?php include 'nav.php'; ?>
        <main class="home-page">
            <section class="hero-section">
                <h1 class="hero-title">Welcome Back</h1>
                <p class="hero-description">
                    Sign in to your FoodFusion account to access your recipes, save favorites, and connect with the community.
                </p>
            </section>

            <section class="featured-section">
                <h2 class="section-title">Sign In</h2>

                <?php if (!empty($errormsg)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $errormsg ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <form action="#" method="POST" class="login-form">
                    <div class="mb-3">
                        <label for="loginemail" class="form-label">Email Address</label>
                        <input name="loginemail" type="email" class="form-control" id="loginemail" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginpassword" class="form-label">Password</label>
                        <input name="loginpassword" type="password" class="form-control" id="loginpassword" required>
                    </div>
                    <button name='LoginBtn' type="submit" class="btn btn-primary w-100">Sign In</button>
                </form>

                <p class="text-center mt-4">
                    Don't have an account? <a href="index.php" class="text-primary fw-bold">Join FoodFusion today!</a>
                </p>
            </section>
        </main>
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>