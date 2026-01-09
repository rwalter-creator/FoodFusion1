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

/* $counter = 0;
session_start();

if (isset($_POST['LoginBtn'])) {    // Check if the login button was clicked (form submitted via POST)    
    // Process login form submission
    $login_email = trim($_POST['loginemail']);
    $login_password = trim($_POST['loginpassword']);

    $userresult = $userModel->findemail($login_email);
    if ($userresult != null) {
        $useremail=$userresult['email'];
        $userpassword=$userresult['password'];
        if ($useremail==$login_email && password_verify($login_password,$userpassword)) {
            $_SESSION['email'] = $userresult ['email'];
            $_SESSION['first_name'] = $userresult ['first_name'];

            header('Location: Educational_Resources.php');
        } else {
            echo "Invalid Password!";
        }
    } else {
        echo "User not found!";
    }
} */
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
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <div class="login-cntainer">

        <div class="container">
            <!-- <form action="#" method="POST">
                <label for="loginemail">Email</label>
                <input id="loginemail" name="loginemail" type="email" required><br>
                <label for="loginpassword">Password</label>
                <input id="loginpassword" name="loginpassword" type="password" required><br>
                <button name="LoginBtn" type="submit">Login</button>
                <a href="#">Forgot password?</a>
                <a href="#">Don't have an account? Why not register</a>
            </form> -->

            <?php
            if (!empty($errormsg)) {
            ?>

                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <?php echo $errormsg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }
            ?>


            <form action="#" method="POST">
                <div class="row mb-3 mt-3 p-3">
                    <label for="loginemail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="loginemail" type="email" class="form-control" id="loginemail">
                    </div>
                </div>
                <div class="row mb-3 p-3">
                    <label for="loginpassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input name="loginpassword" type="password" class="form-control" id="loginpassword">
                    </div>
                </div>
                <div class="row p-3 col-sm-1">
                    <button name='LoginBtn' type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>