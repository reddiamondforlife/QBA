<?php
// login.php - V1.0A - ©2012 David de Hoop & Daniël Koek(comment and improvements)
// Samenvatting: Dit script handelt de acties van het login formulier af.
// makes sure the any errors are not shown
error_reporting(0);
//includse pdo.php so manipulation of the db is possible
include 'pdo.php';
//username etc from the post (aslo encrypting of the pw)
$username      = $_POST["username"];
$passwordplain = $_POST["password"];
$salt          = md5($passwordplain);
$passwordhash  = hash("sha512", $passwordplain . $salt);
//check if the user exist or not
if (loginCheck($passwordhash, $username)) {
//if user exist it create the session
    session_start();
    if (isset($_POST["aanwezig"])) {
        $_SESSION['aanwezig'] = "aanwezig";
        atOBA($username);
    }
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $passwordhash;
	// reload to the original page otherwhise white page wil appear (the login.php page)
    echo "<meta http-equiv='refresh'content='0.1;url=" . $_POST["url"] . "'>";
} else {
//if user dont exist a error wil occur
    echo '<script>alert("Uw gebruikersnaam en/of wachtwoord zijn onjuist"); window.location = "index.php";</script>';
}
?>