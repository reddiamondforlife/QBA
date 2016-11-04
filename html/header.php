<?php
// header.php - v1.0A - �2012 Olger Alphenaar, David de Hoop, Dani�l Koek & Martijn van Delden
// Summary: This file is the header, menu, QBA Now Top Contributors and the twitterfeed.
?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>QBA</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<link rel='stylesheet' href='stylesheets/stylesheet_index.css' type='text/css' />
<link rel='stylesheet' href='stylesheets/stylesheet.css' type='text/css' />
<meta name='description' content='Questions before answers' />
<meta name='keywords' content='QBA, OBA, openbare, bibliotheek, Amsterdam, zzp, zelfstandig, ondernemer, personeel' />


<!-------------------------------------------------DROPDOWN SCRIPT MENU START-->
<SCRIPT LANGUAGE='JavaScript'>
var timeout = 500;
var closetimer = 0;
var ddmenuitem = 0;

// open hidden layer
function mopen(id) {
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose;
</script>
<!-------------------------------------------------------DROPDOWN SCRIPT MENU END-->

<!-------------------------------------------------------TWITTER FEED SCRIPT-->

<script
 src="https://twitterjs.googlecode.com/svn/trunk/src/twitter.min.js"
 type="text/javascript">
</script>
<script type="text/javascript" charset="utf-8">
getTwitters('tweet', {
  id: 'OBAmsterdam',
  count: 3,
  enableLinks: true,
  ignoreReplies: true,
  clearContents: true,
  template: ' <a href="https://twitter.com/%user_screen_name%/statuses/%id_str%/" class="twitter"><b>%user_screen_name%</b> - <b>%time%:</b></a> <br> %text%<br><br><br>'
});
</script>
<!-------------------------------------------------------TWITTER FEED SCRIPT END-->

</head>
  <body bgcolor='#f0f0f0'>
<script src='jquery.js'></script>
<script>
    $(document).ready(function() {

    $('#questionlisttable tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

    });
</script>


    <div id='main' align="center">
    <!--HEADER-->
       <a href='index.php'><img id='header' src='images/header.png'></a>
    <!--EINDE HEADER-->

    <!--NAVIGATIE MENU-->
      <div id='navmenu'>

		  <div id='navtext'>
				<ul id='sddm'>
					<li><a href='index.php'>  Home</a></li>
					<li><a href='qa.php'>Browse vragen</a>

				</li>
					<li><a href='stelvraag.php'>Stel&nbsp;een&nbsp;vraag</a></li>
				</ul>

		   </div>

<?php
//Turn off all error reporting
error_reporting(0);
//creates a session
session_start();
//includes pdo.php
require 'pdo.php';
//checks if user is succesfully logged in and displays page
if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
    $passwordhash = $_SESSION['password'];
    $username     = $_SESSION['username'];
} else {
    $passwordhash = "";
    $username     = "";
}
if (loginCheck($passwordhash, $username)) {
    echo "<div id='navlogin'>
		<table id='logintable'>
	    <tr>
        <form id='login' method='post' action='logout.php'>
        <div id='greetingText'>Welkom bij QBA, <a href='showprofile.php' class='greetingText'><b>" . $_SESSION['username'] . "</b></a></div>
		    <div id='loginknop'>
			<input type=hidden value='https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]' name='url'>
		<ul id='sddm2'><li><input type='submit' class='button4' value='Uitloggen'>
    </li></ul>
		</div>
		</form>
		</tr>

		</table>
			</div>
        </div>";
} else {
//if user is not succesfully logged in than all input is sent to echo until it reaches END
    echo <<<END
<div id='navlogin'>
		<table id='logintable'>
	    <tr>
	    <td>
        <form id='login' method='post' action="login.php">

        <input type="checkbox" name="aanwezig" id="aanwezig" class="regular-checkbox" /><label for="aanwezig"></label>
        <input id="mailField" name="username" type="text" placeholder="Gebruikersnaam" required>
		    <input id="passField" name="password" type="password" placeholder="Wachtwoord" required>
		      <div id="aanwezigText">Aanwezig in de OBA?</div>

			<input type=hidden value="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" name="url">

		    <div id="loginknop">
		<ul id="sddm2"><li><input type="submit" value="Inloggen" class="button2">
    </li></ul>
		</div>
		</form>
		<FORM METHOD="LINK" ACTION="register.php">
		<div id="loginknop">
		<ul id="sddm2"><li><input type="submit" value="Registreren" class="button3">
		</div></li></ul>
		</FORM>
		</td>
		</tr>
			</table>
			</div>
        </div>

END;

}
?>

    <!--EINDE NAVIGATIE MENU-->

     <!--SEARCH-->
    <div id='search'>
    <br>
    <img id='zoek' src='images/zoek.png'>
    <form name='zoeken' action='search.php' method='POST'>
    <input id='zoekBalk' name='zoek' placeholder='Typ uw zoekopdracht...'>
	  <input type='submit' class='button' value='Zoeken'>
	  </form>
    </div>

     <!--RECENT-->
    <div id='recent'>
    <div id='titelgroot'>
    QBA NU:
	<?php
	//the value of the showQBAnu() function is assigned to the stmt variable
$stmt = showQBAnu();
// table with id 'qbaNuTable' is displayed
echo "<table id='qbaNuTable'>";

	/**while the result value is assigned to row
	*the current date is stored in question_date
	*??
	*the value of linkQBAnu($questiontitle) is assigned to the variable questionid
	*/
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $row['question_date'] = date("d-m", strtotime($row['question_date']));
    $questiontitle        = $row['question_title'];
    $questionid           = linkQBAnu($questiontitle);
    echo "<tr><td><div class='hideextra' style='width:45px; color:#a7a7a7'>" . $row['question_date'] . "</div></td><td><div class='hideextra' style='width:190px'><a href='qa.php?tag=&qa=" . $questionid . "'>" . $row['question_title'] . "</a></div></td><td style='color:#a7a7a7'>" . showQBAnuAnswers($questionid) . "</td></tr>";
}
echo "</table>";
?>
    </div>
    <br>
    </div>
    <!--EINDE RECENT-->

    <!--TWITTERFEED-->

    <div id='twitterfeed''>
    <div id='titelTwitter'>
    <img src="images/twitter.png">OBA Twitter:
    </div>
    <br>
    <div id='tweet' class="twitter">
    </div>
    </div>
    <!--EINDE TWITTERFEED-->


    <!--TOP CONTRIBUTORS-->

    <div id='contributors'>
    <div id='titelgroot'>
    Top contributors:
    </div>
    <br>
	<?php
	//the value of showTopContributors() is assigned to stmt
$stmt = showTopContributors();
//displays table with id 'contributorTable'
echo "<table id='contributorTable'>";
//displays Gebruiker
echo "<tr><th>Gebruiker</th><th>Rating</th></tr>";
/**the value of result is the same as row
	* the value of username is assigned to username
	*/
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $username = $row['username'];
    echo "<tr><td width='196px'><a href='showprofile_user.php?username=" . $username . "'>" . $row['username'] . "</a></td><td style='text-align:right'>" . $row['user_rating'] . "</td></tr>";
}
echo "</table id='contributorTable'>";
?>


    </div>

    <!--EINDE TOP CONTRIBUTORS-->


    <!--CONTENT-->
    <div id='content'>
