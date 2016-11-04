<?php
// rating.php - v1.0A - ©2012 Daniël Koek & Graham Tjinliepshie
// Summary: This script will ensure that the correct rating for a query is stored in the DB.

//includes html/header.php
require 'html/header.php';

/**if rating, answer, qa and user variables are not null than the value of user is assigned to $user
 * and the value of username is assigned to $username
 */
if (isset($_GET["rating"]) && isset($_GET["answer"]) && isset($_GET["qa"]) && isset($_GET["user"])) {
    $user     = $_GET["user"];
    $username = $_SESSION["username"];
    
    /**if the user and username variables are equal than 
* refreshes the qa.php?tag=&qa= url dus preventing white page (this page)
* alert is displayed
*/
    if ($user == $username) {
        echo "<meta http-equiv='refresh'content='0.1;url=qa.php?tag=&qa=" . $_GET["qa"] . "'>";
        echo '<script>alert("U mag uw eigen antwoord niet raten!");</script>';
    }
    
    // the value of answer is assigned to answer and the value of rating becomes false
    else {
        $answer = $_GET["answer"];
        $rating = false;
        
        // the value of rating is equal to 1 than the value of rating becomes true
        if ($_GET["rating"] == 1) {
            $rating = true;
        }
        
        // checks if the user already rated the same answer
        if (answerRatingCheck($answer, $user)) {
            //updates the rating answer and user rating thumbsup 
            if ($rating) {
                updateRatingAnswer(1, $answer);
                updateRatingUser(1, $user);
                insertRating($answer, $user, 1);
            }
            
            // updates the rating answer thumbsdown, user rating and the rating
            if (!$rating) {
                updateRatingAnswer(-1, $answer);
                updateRatingUser(-1, $user);
                insertRating($answer, $user, -1);
            }
            
           /** displays alert (U heeft de vraag succesvol gerate)
		*  refreshes the page qa.php?tag=&qa after rating in 0.1 seconds
		*/	
            echo '<script>alert("U heeft de vraag succesvol gerate.");</script>';
            echo "<meta http-equiv='refresh'content='0.1;url=qa.php?tag=&qa=" . $_GET["qa"] . "'>";
        }
        
      /** if rating condition is false the page qa.php?tag=&qa= refreshes in 0.1 seconds
	* if condition is false alert is displayed(U heeft deze vraag al gerate, dit mag u niet nogmaals doen!)
	*/
        else {
            echo "<meta http-equiv='refresh'content='0.1;url=qa.php?tag=&qa=" . $_GET["qa"] . "'>";
            echo '<script>alert("U heeft deze vraag al gerate, dit mag u niet nogmaals doen!");</script>';
        }
    }
}

//includes html/bottom.php
require 'html/bottom.php';
?>