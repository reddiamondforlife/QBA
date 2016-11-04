<?php
// displayquestions.php v1.0A - �2012 Dani�l Koek
// Summary: This script is used to ask questions and titles displayed in various forms.

//this function will make a table of questions, containing the latest questions
function displayQuestionsDate()
{
    $stmt = sqlQuestionsDate();
    //create table for title and content
    echo "<table id='questionlisttable'>";
    echo "<tr>
    <th class='title' colspan='6'>Gestelde vragen</th>
    </tr>";
    echo "<tr>
    <th>Titel</th>
    <th>Steller</th> 
    <th style='text-align:right;'>Gesteld op</th>
	</tr>";
    //loop to go to the following.
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //get variables to add to the table	
        $username             = $row['username'];
        $row['question_date'] = date("d-m-Y G:i", strtotime($row['question_date']));
        $online               = "";
        //get a green dot when someone is at OBA
        if (showAtOBA($username) == "1") {
            $online = "<img src='images/online_klein.png'>";
        }
        //Create the contents of each table row and make the whole row in link form
        echo "<tr>";
        echo "<td><div class='hideextra' style='width: 300px';><a class='questionLink' href=qa.php?tag=&qa=" . $row['question_id'] . ">" . $row['question_title'] . "</a></div></td>"; //unused $tag
        echo "<td><a class='questionLink href='showprofile_user.php?username=" . $username . "'>" . $row['username'] . " $online</a></td>";
        echo "<td style='text-align: right; color:a4a4a4;'>" . $row['question_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

//this function will make a table of questions, containing a chosen tag
function displayTagQuestions($tag)
{
    $stmt = sqlQuestionsByTag($tag);
    //test if there are no results for the chosen tag
    if ($stmt->rowCount() == 0) {
        echo "<br><div id='textklein'>Er zijn geen vragen die de tag '" . $tag . "' gebruiken</div>";
        //create table for title and content
    } else {
        echo "<br />";
        echo "<table id='questionlisttable'>";
        echo "<tr>
        <th class='title' colspan='6'>Vragen gesteld met tag " . $tag . ":</th>
        </tr>";
        echo "<tr>
        <th>Titel</th>
        <th>Steller</th>
        <th style='text-align:right;'>Gesteld op</th>
        </tr>";
        //loop to go to the following.
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //get variables to add to the table	
            $row['question_date'] = date("d-m-Y G:i", strtotime($row['question_date']));
            $online               = "";
            //get a green dot when someone is at OBA
            if (showAtOBA($username) == "1") {
                $online = "<img src='images/online_klein.png'>";
            }
            //Create the contents of each table row and make the whole row in link form
            echo "<tr>";
            echo "<div id='linktext'>";
            echo "<td><div class='hideextra' style='width: 300px';><a class='questionLink' href=qa.php?tag=" . $tag . "&qa=" . $row['question_id'] . ">" . $row['question_title'] . "</a></div></td>";
            echo "<td>" . $row['username'] . " $online</td>";
            echo "<td style='text-align: right; color:a4a4a4;'>" . $row['question_date'] . "</td>";
            echo "</div>";
            echo "</tr>";
        }
        //end of the loop
        echo "</table>";
        
    }
}
//this function will determine how the questions will by displayed
function displayQuestions($questionid)
{
    $stmt = sqlQuestionsById($questionid);
    echo "<table id='questiontable'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//Set the time in correct dutch style
        $row['question_date'] = date("d-m-Y G:i", strtotime($row['question_date']));
        $username             = $row['username'];
        $online               = "";
//get a green dot when someone is at OBA
        if (showAtOBA($username) == "1") {
            $online = "<img src='images/online_klein.png'>";
        }
////show repectively username, question title, question content and the date with style
        echo "<tr>
    <th><a href='showprofile_user.php?username=" . $username . "' class='profileLink2'>" . $row['username'] . "$online </a>vraagt:</th>
  </tr>";
        echo "<tr>
    <th class='questionTitle' colspan='2'>" . $row['question_title'] . "</th>
  </tr>";
        echo "<tr>
    <td colspan='2'><br />" . $row['question_content'] . "<br /><br /><br /></td>
  </tr>";
        echo "<tr>
    <td colspan='6' style='text-align: left; font-size:10px; border-top: 1px dotted #b7b7b7;'>Geplaatst op: " . $row['question_date'] . "</td>
    </tr>";
        echo "<tr><td colspan='6' style='border-bottom: 1px solid #e40000;'><br /><br /></td></tr>";
        echo "</table>";
        echo "<br>";
//make it possible to set the answer as suitable for your question; question answered
        if ($row['is_answered'] != 0) {
            $answer = $row['is_answered'];
            $stmt   = sqlAnswersByAnswerId($answer);
            while ($row2 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $row2['answer_date'] = date("d-m-Y G:i", strtotime($row2['answer_date']));
                $username            = $row2["username"];
                $online              = "";
                if (showAtOBA($username) == "1") {
                    $online = "<img src='images/online_klein.png'>";
                }
                echo "<table id='correctAnswertable'>";
//display the answers underneath the question
                echo "<tr>
				
        </tr>

        <tr>
 
        <th class='alt'><a href='showprofile_user.php?username=" . $username . "' class='profileLink'>" . $row2['username'] . " $online</a> antwoordt:</th>
	<td width='80px' class='whitecenter'>Rating:&nbsp;" . $row2['answer_rating'] . "</font></td>
	<td width='25px' class='white'><a href=rating.php?rating=1&answer=" . $row2['answer_id'] . "&qa=" . $_GET["qa"] . "&user=" . $row2["username"] . "><img src='images/thumbsup_logo_small.jpg'></a></td>
	<td width='25px' class='white'><a href=rating.php?rating=0&answer=" . $row2['answer_id'] . "&qa=" . $_GET["qa"] . "&user=" . $row2["username"] . "><img src='images/thumbsdown_logo_small.jpg'></a></td>

  </tr>";
                echo "<tr>
    <td colspan='6'>" . $row2['answer_content'] . "<br/><br/</td>
    </tr>";
                echo "<tr>
    <td colspan='6' style='text-align: left; font-size:10px; border-top: 1px dotted #b7b7b7;'>Geplaatst op: " . $row2['answer_date'] . "</td>
    </tr>";
                echo "<tr><td colspan='6' style='border-bottom: 1px solid #8cd58c;'><br /></td></tr>";
                echo "</table>";
                echo "<br>";
                
            }
        }
        
        
    }
    
}
//this function will display every answer in style
function displayAnswer($questionid)
{
    $stmt = sqlAnswersByQuestionId($questionid);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $answerid = $row['answer_id'];
//check if there is a username set
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        } else {
            $username = null;
        }
//determine whether question is already answred or not, set by question owner, and put the answers in style
        if (checkIsAnswerd($_GET["qa"]) && checkLoginIsQuestion($username, $_GET["qa"])) {
            $beantwoord = "<form method='post'>
<input type=hidden value='$answerid' name='answer'>
<input type=hidden value='$questionid' name='question'>
<input type=hidden value='http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]' name='url'>
<img src='images/vinkje.png'><input type='submit' class='buttonGoedAntwoord' value='Dit heeft mijn vraag beantwoord' align='right'>
</form>";
        } else {
            $beantwoord = "";
        }
        $row['answer_date'] = date("d-m-Y G:i", strtotime($row['answer_date']));
        $username           = $row["username"];
        $online             = "";
        if (showAtOBA($username) == "1") {
            $online = "<img src='images/online_klein.png'>";
        }
//add content in the answers
        echo "<table id='answertable'>";
        echo "<tr>
    <th>&nbsp;<a href='showprofile_user.php?username=" . $username . "' class='profileLink'>" . $row['username'] . " $online</a> antwoordt:</th>
	<td width='80px' style='text-align: center;'>Rating:&nbsp;" . $row['answer_rating'] . "</font></td>
	<td width='25px'><a href=rating.php?rating=1&answer=" . $row['answer_id'] . "&qa=" . $_GET["qa"] . "&user=" . $row["username"] . "><img src='images/thumbsup_logo_small.jpg'></a></td>
	<td width='25px'><a href=rating.php?rating=0&answer=" . $row['answer_id'] . "&qa=" . $_GET["qa"] . "&user=" . $row["username"] . "><img src='images/thumbsdown_logo_small.jpg'></a></td>

  </tr>";
        echo "<tr>
    <td colspan='6'>" . $row['answer_content'] . "<br/><br/</td>
    </tr>";
        echo "<tr>
    <td colspan='6' style='text-align: left; font-size:10px; border-top: 1px dotted #b7b7b7;'>Geplaatst op: " . $row['answer_date'] . "</td>
	</tr>
	";
        
        echo "</table>";
        echo $beantwoord;
        echo "<br/><br/>";
        
        
    }
}
//this function sends email to user if there is an answer an a question
function displayTextareaAnswer()
{
    if (isset($_POST["antwoord"])) {
        sqlAnswerInsert($_POST["antwoord"], $_GET["qa"], $_SESSION['username']);
        $to   = "reacties@reddiamondforlife.com";
        $bcc  = "";
        $stmt = getEmailQuestion($_GET["qa"]);
//MySQL fetch array function with PDO wrapper to prevent injections
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $bcc = $bcc . $row['contact_email'] . ",";
        }
        $subject   = "QBA - Nieuwe reactie geplaatst!";
        $email     = "
		<html>
		<body>
		Beste QBA gebruiker,
		<br><br>
		Er is een nieuwe reactie geplaatst op een vraag die u heeft gesteld. U kunt de reactie zien door op deze link te klikken:
		<br>
		<a href=www.reddiamondforlife.com/qa.php?tag=&qa=" . $_GET["qa"] . "> Bekijk de reactie op uw vraag.</a>
		<br><br>
		Met vriendelijke groet,
		<br><br>
		Het <a href='http://www.reddiamondforlife.com'>QBA</a> Team
		</body>
		</html>
		";
        $headers   = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/html; charset=iso-8859-1";
        $headers[] = "From: QBA <info@reddiamondforlife.com>";
        $headers[] = "Bcc: " . $bcc;
        $headers[] = "Reply-To: reddiamondforlife.com <info@reddiamondforlife.com>";
        $headers[] = "Subject: {$subject}";
        $headers[] = "X-Mailer: PHP/" . phpversion();
        mail($to, $subject, $email, implode("\r\n", $headers));
        sqlEmailQuestionInsert($_GET["qa"], $_SESSION['username']);
        echo "<meta http-equiv='refresh' content='1'>";
    }
    echo "<form action='' method='post'>
<br />
<div id='text'>
Geef uw antwoord:</div>";
    if (checkIsAnswerd($_GET["qa"])) {
        if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
            $passwordhash = $_SESSION['password'];
            $username     = $_SESSION['username'];
        } else {
            $passwordhash = "";
            $username     = "";
        }
//checks if user is logged in, this is needed to reply on a question
        if (loginCheck($passwordhash, $username)) {
            echo "<script src='http://js.nicedit.com/nicEdit-latest.js' type='text/javascript'></script>
<script type='text/javascript'>bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<textarea name='antwoord' rows='5' cols='80'></textarea>
<br />
<input type='submit' class='button' value='Verstuur'/>";
            echo "</form>";
        } else {
            echo "<br><div id='textklein'>Om een antwoord te versturen moet u ingelogd zijn! Nog geen account? Registreer <a href='register.php' class='greetingText'>hier!</a></div>";
        }
    } else {
        echo "<br><div id='textklein'>Deze vraag is al beantwoord, u kunt niet meer antwoorden.</div>";
    }
    
}

?>