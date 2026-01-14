<?php
/* $fileName = basename($_SERVER['REQUEST_URI']); 
if ($fileName != 'login.php') {
  session_start();
} else  {

} */
session_start();
require __DIR__ . '/database.php';
require __DIR__ . '/../models/user.php';
require __DIR__ . '/../models/messages.php';

// Helper functions
function e($string)
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function current_user_email()
{
  return $_SESSION['email'] ?? null;
}

function current_user_id()
{
  return $_SESSION['id'] ?? null;
}

function require_login()
{
  if (!current_user_id()) {
    header('Location: /login.php');
    exit;
  }
}

function csrf_token()
{
  if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  }
  return $_SESSION['csrf_token'];
}

function verify_csrf($token)
{
  return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
