<?php
// editprofile.php v0.1A - ©2012 David de Hoop
// Summary: This script is used to customize the form in profile to post and process the database.

//When both password and password retype are set, the change profile session starts
if (isset($_POST["wachtwoord"]) && isset($_POST["herhaalwachtwoord"])) {
    session_start();
    //get content from pdo.php
    include 'pdo.php';
    //gets the data from the sesion variables
    $username            = $_SESSION['username'];
    //collect data from the user with the predefined $_POST variable
    $firstname           = $_POST["voornaam"];
    $tussenvoegsel       = $_POST["tussenvoegsel"];
    $lastname            = $_POST["achternaam"];
    $passwordplain       = $_POST["wachtwoord"];
    $passwordplainrepeat = $_POST["herhaalwachtwoord"];
    $email               = $_POST["email"];
    $emailhidden         = $_POST["hide_email"];
    $facebook            = $_POST["facebook"];
    $facebookhidden      = $_POST["hide_facebook"];
    $twitter             = $_POST["twitter"];
    $twitterhidden       = $_POST["hide_twitter"];
    $biography           = $_POST["biography"];
    //at least first and last name is needed to update the name of the user, else do nothing
    if (!empty($_POST["voornaam"]) && !empty($_POST["achternaam"])) {
        updateProfile($firstname, $tussenvoegsel, $lastname, $username);
    } else {
    }
    //check if email has been posted and update the email of the user, hidden or not
    if (!empty($_POST["email"])) {
        if (isset($_POST["hide_email"])) {
            updateEmailHidden($email, $emailhidden, $username);
        } else {
            updateEmail($email, $username);
        }
    } else {
    }
    //check if facebook has been posted and update the facebook link of the user, hidden or not
    if (!empty($_POST["facebook"])) {
        if (isset($_POST["hide_facebook"])) {
            updateFacebookHidden($facebook, $facebookhidden, $username);
        } else {
            updateFacebook($facebook, $username);
        }
    } else {
    }
    //check if twitter has been posted and update the twitter link of the user, hidden or not
    if (!empty($_POST["twitter"])) {
        if (isset($_POST["hide_twitter"])) {
            updateTwitterHidden($twitter, $twitterhidden, $username);
        } else {
            updateTwitter($twitter, $username);
        }
    } else {
    }
    //checks if password and retype password are identical. If so, the password will be updated
    //?
    if (!empty($_POST["wachtwoord"]) && isset($_POST["herhaalwachtwoord"])) {
        if ($passwordplain != $passwordplainrepeat) {
            echo '<script>alert("De wachtwoorden komen niet overheen, probeer opnieuw."); window.location = "editprofile.php";</script>';
        } else {
            $salt         = md5($passwordplain);
            $passwordhash = hash("sha512", $passwordplain . $salt);
            updatePassword($passwordhash, $username);
        }
    } else {
    }
    //updates the biography from the user when adjusted
    if (!empty($_POST["biography"])) {
        updateBiography($biography, $username);
    } else {
    }
    echo '<script>alert("Uw gegevens zijn nu aangepast."); window.location = "showprofile.php";</script>';
}
?>
<?php
//get header.php contents
require 'html/header.php';
?>
<div class="editprofile">
<img src="images/gegevens.png"><br><br>
Op deze pagina kunt u uw profiel aanpassen en uw gegevens wijzigen.
<br><br>
<!--create form to sent data by POST method to editprofile.php -->
<form name="editprofile" method="post" action="editprofile.php">
<table class="editprofile">
<tr><td><b>Voornaam:</b></td><td><b>Tussenvoegsel:</b></td><td><b>Achternaam:</b></td></tr>
<tr><td><input type="text" name="voornaam"></td><td><input type="text" name="tussenvoegsel"></td><td><input type="text" name="achternaam"></td></tr>
</table>
<br>
<table class="editprofile">
<tr><td><b>Nieuw Wachtwoord:</b></td><td><input type="password" name="wachtwoord"></td></tr>
<tr><td><b>Herhaal Wachtwoord:</b></td><td><input type="password" name="herhaalwachtwoord"></td></tr>
</table>
<br>
<table class="editprofile">
<tr><td><b>E-mailadres:</b></td><td><input type="text" name="email" size="40"></tr>
<tr><td colspan="2" class="smaller"><input type="checkbox" name="hide_email" value="0">Mijn e-mailadres verbergen</td></tr>
<tr><td><b>Facebook:</b></td><td><input type="text" name="facebook" size="40"></td></tr>
<tr><td colspan="2" class="smaller"><input type="checkbox" name="hide_facebook" value="0">Mijn Facebook gegevens verbergen</td></tr>
<tr><td><b>Twitter:</b></td><td><input type="text" name="twitter" size="40"></td></tr>
<tr><td colspan="2" class="smaller"><input type="checkbox" name="hide_twitter" value="0">Mijn Twitter gegevens verbergen</td></tr>
</table>
<br>
<b>Biografie:</b><br>
<textarea name="biography" rows="6" cols="50" maxlength="300" placeholder="Gebruik deze ruimte om kort iets over uzelf te vertellen. Bijvoorbeeld over uw werk of ervaring.">
</textarea>

<br><br>
<input class="button" type="submit" value="Gegevens Aanpassen">
</form>
</div>	
<?php
require 'html/bottom.php';
?>	
	
	

