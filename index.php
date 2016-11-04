<!-- index.php - V1.0A - �2012 Dani�l Koek & Martijn van Delden.   -->
<!-- Summary: This script prints the tagcloud to HTML. -->
<?php
//get header
require 'html/header.php';
?>

<?php
//get tagcloud
$stmt = getCloud();
$maximum = getMaxCloud();
echo '<div id="tagcloud">';
echo '<div id="titel">QBA Tagcloud:</div>';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//decides how big the tag is
    $tag = $row['tag'];
    $percent = floor(($row['counter'] / $maximum) * 100);
    if ($percent < 20):
        $class = 'smallest';
    elseif ($percent >= 20 and $percent < 40):
        $class = 'small';
    elseif ($percent >= 40 and $percent < 60):
        $class = 'medium';
    elseif ($percent >= 60 and $percent < 80):
        $class = 'large';
    else:
        $class = 'largest';
    endif;

    echo "<span class= $class>";
    echo "<a href=qa.php?tag=" . $tag . ">$tag</a>";
    echo "</span>";

}
echo '</div>';
?>
<!-- style for box with users at OBA -->
<div id="ledenAanwezig">
<div id='ledenAanwezigTitel'>
<div id='titel'>Nu aanwezig bij OBA Amsterdam</div>
<br>
</div>
<div id='ledenAanwezigLocatie'>
<div id='textklein'>Oosterdokskade  143
<br>
1011DL Amsterdam
<br>
Tel nr: 020-5230900
</div>
</div>
<img src='images/obaamsterdam.jpg' style='position: absolute; margin-left: -314px;'>
<table id='ledenAanwezigTable'>

<?php

// the users who are at OBA are shown, if there are.
$resulttext = countUsers();
	if($resulttext!==0)
	{
	$stmt = aanwezigOba();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$username = $row['username'];
	    $section1[] = "<td><a href='showprofile_user.php?username=". $username . "'>" . $row['username'] . " <img src='images/online_klein.png'></td>";
}
	echo "<tr><td>" . $section1[0] . $section1[1] . $section1[2] . $section1[3] . "</td></tr><tr><td>" . $section1[4] . $section1[5] . $section1[6] . $section1[7] . "</td></tr><tr><td>" . $section1[8] . $section1[9] . $section1[10] . $section1[11] . "</td></tr><tr><td>" . $section1[12] . $section1[13] . $section1[14] . $section1[15] . "</td></tr>";
}
	else
	{
	echo "<tr><td>Op dit moment zijn er geen QBA leden aanwezig in de OBA.</td></tr>";
	}
?>
</table>
</div>

<div id="hotVragen">
<div id='titel' style='text-align:left;'>Meest populaire vragen van dit moment</div>
<table id='hotVragenTable'>
<?php

//shows the most recent questions in a table form
$stmt =  hotQuestions();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$question_title = $row['question_title'];
	$question_id =$row['question_id'];
	$section2[] = "<td><div class='hideextra' style='width: 300px';>> <a href='qa.php?tag=&qa=" . $question_id . "'>" . $row['question_title'] . "</div></td>";
}
	echo "<tr>" . $section2[0] . $section2[1] . "</tr><tr>" . $section2[2] . $section2[3] . "</tr><tr>" . $section2[4] . $section2[5] . "</tr><tr>" . $section2[6] . $section2[7] . "</tr><tr>" . $section2[8] . $section2[9] . "</tr><tr>" . $section2[10] . $section2[11] . "</tr><tr>" . $section2[12] . $section2[13] . "</tr>";
?>
</table>
</div>

<?php
require 'html/bottom.php';
?>
