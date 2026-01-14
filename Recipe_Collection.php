<?php
require __DIR__ . '/app/config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Food Fusion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- This is to make the page responsive -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="css/css.css" rel="stylesheet" type="text/css">  <!-- This is to link the page to the CSS -->
</head>

<body>
  <div class="main-container">
      <?php include 'header.php';?>
      <?php include 'nav.php';?>
      <?php include 'Recipe_Collection-main.php';?>
      <?php include 'footer.php';?>
<script src="Java_Script/main.js"></script>
<script src="Java_Script/slideshow.js"></script>
<script src="Java_Script/newsfeed.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>  

</html>