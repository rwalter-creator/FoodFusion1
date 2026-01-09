<?php
require 'app/config/config.php';

$userModel = new User($conn);

$message = null;
$message_type = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  //$username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($password) || empty($email) || empty($first_name) || empty($last_name)) {
    $message = "All fields required.";
    $message_type = "warning";
  } else {
    // Unique email validation
    $row = $userModel->findemail($email);
    //var_dump($row) this is to output on the screen for debugging
    if ($row == NULL) {
      $userModel->create($first_name, $last_name, $password, $email);
      $message = "Account created successfully!";
      $message_type = "success";
    } else {
      $message = "This Email is already in use.";
      $message_type = "error";
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


<div class="main-container"> <!-- Main Content Section -->

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

<?php if ($message): ?>
<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="notificationToast" class="toast align-items-center text-white bg-<?php echo $message_type == 'success' ? 'success' : ($message_type == 'error' ? 'danger' : 'warning'); ?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <?php echo $message; ?>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<?php endif; ?>

<script src="Java_Script/main.js"></script>
<script src="Java_Script/slideshow.js"></script>
<script src="Java_Script/newsfeed.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php if ($message): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var toastEl = document.getElementById('notificationToast');
  var toast = new bootstrap.Toast(toastEl);
  toast.show();
});
</script>
<?php endif; ?>