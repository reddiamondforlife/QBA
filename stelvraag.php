<?php
// stelvraag.php - v1.0A - �2012 Dani�l Koek 
// Summary: This script creates the rich text editor and makes questioning possible.


//includes html/header.php
require 'html/header.php';

//checks if user is succesfully logged in
if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
    $passwordhash = $_SESSION['password'];
    $username     = $_SESSION['username'];
} else {
    $passwordhash = "";
    $username     = "";
}
if (loginCheck($passwordhash, $username)) {
    //if user is not succesfully logged in than all input is sent to echo until it reaches END
    echo <<<END
<img id="head_image" src="images/stelvraag.png">
 <br>
<br>
<form method="post" action="postquestion.php">
<label><div id="titel">Titel: </div></label>
<input id="vraag" name="question" placeholder="Type de titel van uw vraag"><br><br>

<label><div id="titel">Uw vraag:</div></label>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<textarea rows="10" cols="80" name="description"></textarea><br>

<label><div id="titel">Tags:</div></label>
<div id="textklein">
Vul ��n of meerdere steekwoorden in die betrekking hebben op uw vraag. Scheid uw steekwoorden met het teken ";". Geen spaties nodig.<br>
<br>
<input id="tags" name="tags" placeholder="Type hier uw tags, gescheiden met puntkomma's (;)"><br><br></div>
		
<button type="submit" class= "button" value="Verstuur"> Verstuur </button>
</form>
<br>

END;
    
}

/**if condition is false than "U moet ingelogd zijn om een vraag te stellen, u wordt nu doorverwezen naar de registratiepagina."is diplayed
* the page register.php refreshes in 0.2 seconds
*/
else {
    echo "<div id='textklein'>U moet ingelogd zijn om een vraag te stellen, u wordt nu doorverwezen naar de registratiepagina.</div>";
    echo "<meta http-equiv='refresh'content='2;url=register.php'>";
}

//includes html/bottom.php
require 'html/bottom.php';
?>