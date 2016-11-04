<?php
// logout.php - v1.0A - ©2012 Graham Tjinliepshie
// Summary: This script destroys the session and logs the user out.

//preventing error codes 
error_reporting(0);
// makes sure pdo.php is included so that it can connect with the database
require 'pdo.php';
// gets the username of the current user and destroys it at oba variable 
session_start();
$username = $_SESSION['username'];
atOBADestroy($username);
// Unset all of the session variables.
$_SESSION = array();
// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
//this hole sections makes sure that realy everting is destroyed even cookies, wich are not implemented yet but can be later on.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}
// Finally, destroy the session.
session_destroy();
//reload to the page the user was
echo "<meta http-equiv='refresh'content='0.1;url=" . $_POST["url"] . "'>";
?>