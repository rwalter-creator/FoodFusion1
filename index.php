<?php
require 'app/config/database.php';
require 'app/models/user.php';

$userModel = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  //$username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($password) || empty($email) || empty($first_name) || empty($last_name)) {
    echo "All fields required.";
  } else {
    // Unique email validation
    $row = $userModel->findemail($email);
    //var_dump($row) this is to output on the screen for debugging
    if ($row == NULL) {
      $userModel->create($first_name, $last_name, $password, $email);
      echo "Account created successfully!";
    } else {
      echo "This Email is already in use.";
    }

    // Create user
    /*         if ($userModel->create($first_name, $last_name, $password, $email)) {
            echo "Account created successfully!";
        } else  {
            echo "Error creating account.";
      } */
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Food Fusion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- This is to make the page responsive -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="css/css.css" rel="stylesheet" type="text/css"> <!-- This is to link the page to the CSS -->
  
</head>


<div id="main-container"> <!-- Main Content Section -->

  <body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <?php include 'index-main.php'; ?>
    <?php include 'footer.php'; ?>



</div>

<div id="secondary-container"> <!-- Secondary Content Section-->

</div>
<div class="cookie-container">
  <p>
    cookie cookie cookie. <a href="#">Privacy Policy</a> and <a href="#">Cookie Policy.</a>
  </p>

  <button class="cookie-btn">
    Okay
  </button>

</div>
<script src="Java_Script/main.js"></script>
<script src="Java_Script/modal.js"></script>
<script src="Java_Script/slideshow.js"></script>


</body>