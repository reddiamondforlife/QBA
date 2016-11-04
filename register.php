<?php
// register.php - v1.0A - �Dani�l Koek & Olger Alphenaar
// Summary: Provides for the registration and stores hashed passwords in the DB.
?>
<?php
//get header
require 'pdo.php';
?>
<?php




if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
    $passwordhash = $_SESSION['password'];
    $username     = $_SESSION['username'];
} else {
    $passwordhash = "";
    $username     = "";
}
// if username and password are correct condition is true (logged in succesfully)
if (loginCheck($passwordhash, $username)) {

// refreshes the page index.php after 0.1 seconds when logged in succesfully
    echo "<meta http-equiv='refresh'content='0.1;url=index.php'>";
}
?>

<img id="head_image" src="images/registratie.png">
<br><br>
<div id="titel">Registreren</div>
<div id="textklein">
    <br>

Registratie bij QBA is heel eenvoudig, vul het onderstaande formulier in en druk op 'Registreer'. Daarna kunt u direct aan de slag met QBA!
    <br><br>
Eerst meer weten over QBA? Bezoek de <a href="faq.php" style='color:e40000;'>help pagina</a>.
<form method="post" action="register.php">
<br>
<table id="registratieTable">
    <tr>
        <td>
<label><div id="textklein"><b>Gebruikersnaam:</b></div></label>
        </td>
        <td>
<input id="textklein" name="username" placeholder="Gebruikersnaam">
        </td>
        </tr>
        <tr>
        <td>
<label><div id="textklein"><b>E-mailadres:</b></div></label>
        </td>
        <td>
<input id="textklein" name="email" placeholder="uw@email.com" >
        </td>
        </tr>
        <tr><td></td></tr>
        <tr>
        <td>
<label ><div id="textklein"><b>Wachtwoord:</b></div></label>
        </td>
        <td>
<input type="password" name="password" placeholder="Wachtwoord" required>
        </td>
        </tr>
        <tr>
        <td>
<label><div id="textklein"><b>Herhaal wachtwoord:</b></div></label>
        </td>
<td>
<input type="password" name="passwordrepeat" placeholder="Herhaal wachtwoord" required>
</td>
    </tr>
</table>
<br>
    <button type="submit" class="button" value="Registreren">Registreer!</button>
</div>

</form>

<?php

/**if the username, password, passwordrepeat variables are not null than
*variables are assigned to values
*/
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["passwordrepeat"])) {
    $username            = $_POST["username"];
    $passwordplain       = $_POST["password"];
    $passwordplainrepeat = $_POST["passwordrepeat"];
    $email               = $_POST["email"];
    $salt                = md5($passwordplain);
    $passwordhash        = hash("sha512", $passwordplain . $salt);
    $usernametaken       = usernameTaken($username);

    //checks if the values of username and usernametaken are equal
    if ($username == $usernametaken) {
        //displays alert
        echo '<script>alert("Deze gebruikersnaam is al in gebruik."); window.location = "register.php";</script>';
    }
    //checks if the value of passwordplain is not equal to the value of passwordplainrepeat
    else if ($passwordplain != $passwordplainrepeat) {
        //alert is displayed
        echo '<script>alert("U heeft uw wachtwoord verkeerd ingevuld, probeer opnieuw."); window.location = "register.php";</script>';
    }

    //else
    else {
	//registers the user
        registerUser($username, $passwordhash, $email);
        //alert is displayed
        echo '<script>alert("U bent nu geregistreerd. U kunt inloggen met uw gegevens."); window.location = "index.php";</script>';
    }



}

//includes html/bottom.php
require 'html/bottom.php';
?>
