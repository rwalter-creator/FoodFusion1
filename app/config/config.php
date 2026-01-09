<?php
/* $fileName = basename($_SERVER['REQUEST_URI']); 
if ($fileName != 'login.php') {
  session_start();
} else  {

} */
session_start();
require 'app/config/database.php';
require 'app/models/user.php';

?>
