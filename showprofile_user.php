<?php
// showprofile.php - v1.0A - �2012 David de Hoop
// Summary: This script shows the profile of a user, also to user who aren't logged in.

// see showprofile.
require 'html/header.php';
$username = $_GET['username'];
function getEmail()
{
    $username = $_GET['username'];
    if (isEmailHidden($username) == "1") {
        echo showEmail($username);
    } else {
        echo "Niet openbaar";
    }
}
function getFacebook()
{
    $username = $_GET['username'];
    if (isFacebookHidden($username) == "1") {
        echo showFacebook($username);
    } else {
        echo "Niet openbaar";
    }
}
function getTwitter()
{
    $username = $_GET['username'];
    if (isTwitterHidden($username) == "1") {
        echo showTwitter($username);
    } else {
        echo "Niet openbaar";
    }
}
function getRegistrationDate()
{
    $username = $_GET['username'];
    $date     = showRegistrationDate($username);
    $dateget  = getdate(strtotime($date));
    $weekday  = $dateget['weekday'];
    switch ($weekday) {
        case "Monday":
            echo "Maandag";
            break;
        case "Tuesday":
            echo "Dinsdag";
            break;
        case "Wednesday":
            echo "Woensdag";
            break;
        case "Thursday":
            echo "Donderdag";
            break;
        case "Friday":
            echo "Vrijdag";
            break;
        case "Saturday":
            echo "Zaterdag";
            break;
        case "Sunday":
            echo "Zondag";
            break;
        default:
            break;
    }
    echo date(" j F Y", strtotime($date));
}
function getRegistrationDateHead()
{
    $username = $_GET['username'];
    $date     = showRegistrationDate($username);
    echo date(" d-m-Y", strtotime($date));
}
function getLastAskedQuestions()
{
    $username = $_GET['username'];
    $stmt     = showLastAskedQuestions($username);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $row['question_date'] = date("d-m-Y G:i", strtotime($row['question_date']));
        $questiontitle        = $row['question_title'];
        $questionid           = linkQBAnu($questiontitle);
        echo "<tr><td class='profilecolumn' width='130px'>" . $row['question_date'] . "</td><td><a href='qa.php?tag=&qa=" . $questionid . "'>" . $row['question_title'] . "</a></td></tr>";
    }
}
function getLastAnsweredQuestions()
{
    $username = $_GET['username'];
    $stmt     = showLastAnsweredQuestions($username);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $row['answer_date'] = date("d-m-Y G:i", strtotime($row['answer_date']));
        $questiontitle      = $row['question_title'];
        $questionid         = linkQBAnu($questiontitle);
        echo "<tr><td class='profilecolumn' width='130px'>" . $row['answer_date'] . "</td><td><a href='qa.php?tag=&qa=" . $questionid . "'>" . $row['question_title'] . "</a></td></tr>";
    }
}
function isAanwezig()
{
    $username = $_GET['username'];
    if (showAtOBA($username) == "1") {
        echo "<span id='welAanwezig'>Aanwezig bij OBA</span>";
    } else {
        echo "<span id='nietAanwezig'><u>Niet</u> aanwezig bij OBA</span>";
    }
}
?>
<div class="editprofile">
<img src="images/profiel.png" align="center"><br><br><div id="profilename"><?php
echo $username;
?></div>
<div id="textklein">Geregisteerd op <?php
getRegistrationDateHead();
?>, <?php
echo isAanwezig();
?></div>
<br><br>
<table class="showprofile">
<tr><th class="profilecolumnheader" colspan="2"><div id="headertext">Gegevens</div></th>
<th class="profilecolumnheader" colspan="3"><div id="headertext">Contact</div></th></tr>
<tr><td class="profilecolumn">Naam</td><td><?php
echo showFirstName($username);
echo " ";
echo showTussenvoegsel($username);
echo " ";
echo showLastName($username);
?>
</td>
<td>
<a href="mailto:<?php
getEmail();
?>"><img src="images/email_logo_small.jpg"></a>
</td>
<td class="profilecolumn">E-mailadres</td>
<td><a href="mailto:<?php
getEmail();
?>"><?php
getEmail();
?></a>
</td>
</tr>
<tr>
<td class="profilecolumn">Registratiedatum</td><td><?php
getRegistrationDate();
?></td>
<td>
<a href="<?php
getFacebook();
?>"><img src="images/facebook_logo_small.jpg"></a>
</td>
<td class="profilecolumn">Facebook</td>
<td>
<a href="<?php
getFacebook();
?>"><?php
getFacebook();
?></a>
</td>
</tr>
<tr>
<td class="profilecolumn"><img src="images/thumbsup_logo_small.jpg"> Karma</td>
<td>
<?php
echo showRating($username);
?>
</td>
<td>
<a href="<?php
getTwitter();
?>"><img src="images/twitter_logo_small.jpg"></a></td>
<td class="profilecolumn">Twitter</td>
<td>
<a href="<?php
getTwitter();
?>"><?php
getTwitter();
?></a></td>
</tr>
</table><br>
<table class="showprofile">
<tr><th class="profilecolumnheader"><div id="headertext">Biografie</div></th></tr>
<tr><td><?php
echo showBiography($username);
?></td></tr>
</table><br>
<table class="showprofile">
<tr><th class="profilecolumnheader" colspan="2"><div id="headertext">Laatst gestelde vragen</div></th></tr>
<?php
getLastAskedQuestions();
?>
</table>
<br>
<table class="showprofile">
<tr><th class="profilecolumnheader" colspan="2"><div id="headertext">Laatst beantwoorde vragen</div></th></tr>
<?php
getLastAnsweredQuestions();
?>
</table>
</div>

<?php
require 'html/bottom.php';
?>
