<?php
require 'app/config/database.php';
require 'app/models/user.php';

$userModel = new User($conn);

$counter = 0;
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
            header('Location: index.php');
        } else {
            echo "Invalid Password!";
        }
    } else {
        echo "User not found!";
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
    <link href="css/css.css" rel="stylesheet" type="text/css"> <!-- This is to link the page to the CSS -->
</head>

<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <div class="login-cntainer">

        <div class="container">
            <form action="#" method="POST">
                <label for="loginemail">Email</label>
                <input id="loginemail" name="loginemail" type="email" required><br>
                <label for="loginpassword">Password</label>
                <input id="loginpassword" name="loginpassword" type="password" required><br>
                <button name="LoginBtn" type="submit">Login</button>
                <a href="#">Forgot password?</a>
                <a href="#">Don't have an account? Why not register</a>
            </form>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>