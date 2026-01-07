<?php
// logout.php
session_start();

// Remove all session variables and destroy the session
$_SESSION = [];
session_unset();
session_destroy();

// Redirect to homepage or login
header('Location: index.php'); // change to 'login.php' if you prefer
exit;

?>