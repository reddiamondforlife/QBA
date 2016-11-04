<?php
// pdo.php - v1.0A - �2012 Dani�l Koek
// Summary: All queries are stored using the PDO protocol.

//creating the default connection on wich the db can be munipilated
$db = new PDO('mysql:host=localhost;dbname=qba;charset=utf8', 'qba', 'qba');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//all inserts!
function sqlQuestionInsert($questiontitle, $questioncontent, $userid, $tag)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO questions (question_title, question_content, username, tag) VALUES (:questiontitle,:questioncontent,:userid,:tag)");
    $stmt->execute(array(
        ':questiontitle' => $questiontitle,
        ':questioncontent' => $questioncontent,
        ':userid' => $userid,
        ':tag' => $tag
    ));
}
function insertRating($answer, $user, $rating)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO rating (answer_id, username, rating) VALUES (:answer, :user, :rating)");
    $stmt->execute(array(
        ':answer' => $answer,
        ':user' => $user,
        ':rating' => $rating
    ));
}
function registerUser($username, $passwordhash, $email)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO users (username,password,contact_email) VALUES (:username,:passwordhash,:email)");
    $stmt->execute(array(
        ':username' => $username,
        ':passwordhash' => $passwordhash,
        ':email' => $email
    ));

}
function sqlAnswerInsert($answercontent, $questionid, $username)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO answers (answer_content, question_id, username) VALUES (:answercontent, :questionid, :username)");
    $stmt->execute(array(
        ':answercontent' => $answercontent,
        ':questionid' => $questionid,
        ':username' => $username
    ));
}
function sqlEmailQuestionInsert($questionid, $username)
{
    global $db;
    $stmt = $db->prepare("SELECT question_id FROM mail WHERE question_id=:question_id AND contact_email=:contact_email");
    $stmt->bindParam(':question_id', $questionid, PDO::PARAM_STR);
    $stmt->bindParam(':contact_email', showEmail($username), PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $stmt2 = $db->prepare("INSERT INTO mail (question_id, contact_email) VALUES (:question_id, :contact_email)");
        $stmt2->execute(array(
            ':question_id' => $questionid,
            ':contact_email' => showEmail($username)
        ));
    } else {
    }
}

//all select statements
function sqlQuestionsDate()
{
    global $db;
    return $db->query('SELECT question_date, question_title, username, question_id FROM questions ORDER BY question_date DESC');
}
function showQBAnu()
{
    global $db;
    return $db->query('SELECT question_date,question_title FROM questions ORDER BY question_date DESC LIMIT 11');
}
function showTopContributors()
{
    global $db;
    return $db->query('SELECT username,user_rating FROM users ORDER BY user_rating DESC LIMIT 10');
}
function getCloud()
{
    global $db;
    return $db->query("SELECT tag,counter FROM tagcloud ORDER BY RAND() LIMIT 40");
}
function sqlQuestionsByTag($tag)
{
    global $db;
    $stmt = $db->prepare("SELECT question_date, question_title, username, question_id FROM questions WHERE tag LIKE :tag1 OR tag LIKE :tag2 OR tag LIKE :tag3 OR tag LIKE :tag4 ORDER BY question_date");
    $tag1 = '%;' . $tag . ';%';
    $tag2 = '%;' . $tag;
    $tag3 = $tag . ';%';
    $tag4 = $tag;
    $stmt->bindParam(':tag1', $tag1, PDO::PARAM_STR);
    $stmt->bindParam(':tag2', $tag2, PDO::PARAM_STR);
    $stmt->bindParam(':tag3', $tag3, PDO::PARAM_STR);
    $stmt->bindParam(':tag4', $tag4, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}
function search($searchquery)
{
    $tag = $searchquery;
    global $db;
    $stmt         = $db->prepare("SELECT * FROM questions WHERE question_title LIKE :searchquery1 OR question_content LIKE :searchquery2 OR tag LIKE :tag1 OR tag LIKE :tag2 OR tag LIKE :tag3 OR tag LIKE :tag4");
    $searchquery1 = '%' . $searchquery . '%';
    $searchquery2 = '%' . $searchquery . '%';
    $tag1         = '%;' . $tag . ';%';
    $tag2         = '%;' . $tag;
    $tag3         = $tag . ';%';
    $tag4         = $tag;
    $stmt->bindParam(':searchquery1', $searchquery1, PDO::PARAM_STR);
    $stmt->bindParam(':searchquery2', $searchquery2, PDO::PARAM_STR);
    $stmt->bindParam(':tag1', $tag1, PDO::PARAM_STR);
    $stmt->bindParam(':tag2', $tag2, PDO::PARAM_STR);
    $stmt->bindParam(':tag3', $tag3, PDO::PARAM_STR);
    $stmt->bindParam(':tag4', $tag4, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}
function sqlQuestionsById($questionid)
{
    global $db;
    $stmt = $db->prepare("SELECT question_date, question_title, question_content, username, is_answered FROM questions WHERE question_id=:questionid");
    $stmt->bindParam(':questionid', $questionid, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}
function aanwezigOba()
{
    global $db;
    $stmt = $db->prepare("SELECT username FROM users WHERE atoba='1' LIMIT 16");
    $stmt->execute();
    return $stmt;
}
function hotQuestions()
{
    global $db;
    $stmt = $db->prepare("SELECT question_title,questions.question_id  FROM questions,answers WHERE questions.question_id=answers.question_id GROUP BY question_title ORDER BY question_date DESC, COUNT(*) LIMIT 14");
    $stmt->execute();
    return $stmt;
}

function sqlAnswersByQuestionId($questionid)
{
    global $db;
    $stmt = $db->prepare("SELECT answer_id,username,answer_date,answer_content,answer_rating FROM answers WHERE question_id=:questionid ORDER BY answer_rating DESC");
    $stmt->bindParam(':questionid', $questionid, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}
function sqlAnswersByAnswerId($answerid)
{
    global $db;
    $stmt = $db->prepare("SELECT answer_id,username,answer_date,answer_content,answer_rating FROM answers WHERE answer_id=:answerid");
    $stmt->bindParam(':answerid', $answerid, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}
function showLastAskedQuestions($username)
{
    global $db;
    $stmt = $db->prepare("SELECT question_date, question_title FROM questions WHERE username IN (SELECT username FROM users WHERE username=:username) ORDER BY question_date DESC");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

function showLastAnsweredQuestions($username)
{
    global $db;
    $stmt = $db->prepare("SELECT answers.answer_date, questions.question_title FROM answers INNER JOIN questions ON answers.question_id=questions.question_id AND questions.username IN (SELECT username FROM users WHERE username=:username) ORDER BY answers.answer_date DESC");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}
function checkIsAnswerd($questionid)
{
    global $db;
    $stmt = $db->prepare("SELECT is_answered FROM questions WHERE question_id=:questionid LIMIT 1");
    $stmt->bindParam(':questionid', $questionid, PDO::PARAM_INT);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($check['is_answered'] == 0) {
        return true;
    } else {
        return false;
    }
}
function getMaxCloud()
{
    global $db;
    $stmt = $db->prepare("SELECT MAX(counter) AS counter FROM tagcloud");
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['counter'];
}
function insertTag($tag)
{
    global $db;
    // getting current timestamp
    $now  = date("Y-m-d H:i:s");
    $stmt = $db->prepare("SELECT id FROM tagcloud WHERE tag =:tag");
    $stmt->bindParam(':tag', $tag, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) { // the tag exists - update the counter and the last tagcloud timestamp
        $stmt2 = $db->prepare("UPDATE tagcloud SET counter = counter+1, last_tagged = :now WHERE tag = :tag");
        $stmt2->execute(array(
            ':tag' => $tag,
            ':now' => $now
        ));
    } else { // the tag does not exist - insert a new record
        $stmt3 = $db->prepare("INSERT INTO tagcloud (tag, last_tagged) VALUES (:tag, :now)");
        $stmt3->execute(array(
            ':tag' => $tag,
            ':now' => $now
        ));
    }
}
function answerRatingCheck($answer, $user)
{
    global $db;
    $stmt = $db->prepare("SELECT answer_id FROM rating WHERE answer_id=:answer AND username=:user");
    $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
    $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        return false;
    } else {
        return true;
    }
}

function loginCheck($passwordhash, $username)
{
    global $db;
    $stmt = $db->prepare("SELECT password FROM users WHERE password=:passwordhash AND username=:username");
    $stmt->bindParam(':passwordhash', $passwordhash, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}
function checkLoginIsQuestion($username, $questionid)
{
    global $db;
    $stmt = $db->prepare("SELECT username FROM questions WHERE question_id=:questionid LIMIT 1");
    $stmt->bindParam(':questionid', $questionid, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($check['username'] == $username) {
        return true;
    } else {
        return false;
    }
}
function linkQBAnu($questiontitle)
{
    global $db;
    $stmt = $db->prepare("SELECT question_id FROM questions WHERE question_title=:questiontitle ");
    $stmt->bindParam(':questiontitle', $questiontitle, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['question_id'];
}
function showQBAnuAnswers($questionid)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM answers WHERE question_id=:questionid ");
    $stmt->bindParam(':questionid', $questionid, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}
function countUsers()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE atoba='1'");
    $stmt->execute();
    return $stmt->rowCount();
}
//All show with $username
function showEmail($username)
{
    global $db;
    $stmt = $db->prepare("SELECT contact_email FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['contact_email'];
}
function getEmailQuestion($question_id)
{
    global $db;
    $stmt = $db->prepare("SELECT contact_email FROM mail WHERE question_id=:question_id ");
    $stmt->bindParam(':question_id', $question_id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}
function showFirstName($username)
{
    global $db;
    $stmt = $db->prepare("SELECT first_name FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['first_name'];

}
function showTussenvoegsel($username)
{
    global $db;
    $stmt = $db->prepare("SELECT tussenvoegsel FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['tussenvoegsel'];
}
function showLastName($username)
{
    global $db;
    $stmt = $db->prepare("SELECT last_name FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['last_name'];
}
function showBiography($username)
{
    global $db;
    $stmt = $db->prepare("SELECT biography FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['biography'];
}
function showRating($username)
{
    global $db;
    $stmt = $db->prepare("SELECT user_rating FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['user_rating'];
}
function isEmailHidden($username)
{
    global $db;
    $stmt = $db->prepare("SELECT email_hidden FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['email_hidden'];
}
function isFacebookHidden($username)
{
    global $db;
    $stmt = $db->prepare("SELECT facebook_hidden FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['facebook_hidden'];
}
function isTwitterHidden($username)
{
    global $db;
    $stmt = $db->prepare("SELECT twitter_hidden FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['twitter_hidden'];
}
function showFacebook($username)
{
    global $db;
    $stmt = $db->prepare("SELECT contact_facebook FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['contact_facebook'];
}
function showTwitter($username)
{
    global $db;
    $stmt = $db->prepare("SELECT contact_twitter FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['contact_twitter'];
}
function showRegistrationDate($username)
{
    global $db;
    $stmt = $db->prepare("SELECT registration_date FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['registration_date'];
}
function showAtOBA($username)
{
    global $db;
    $stmt = $db->prepare("SELECT atoba FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['atoba'];
}
function usernameTaken($username)
{
    global $db;
    $stmt = $db->prepare("SELECT username FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $check = $stmt->fetch(PDO::FETCH_ASSOC);
    return $check['username'];

}
//UPDATE!!!
function updateQuestionIsAnswered($answer, $questionid)
{
    global $db;
    $stmt = $db->prepare("UPDATE questions SET is_answered=:answer WHERE question_id=:questionid");
    $stmt->execute(array(
        ':answer' => $answer,
        ':questionid' => $questionid
    ));
}
function updateProfile($firstname, $tussenvoegsel, $lastname, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET first_name=:firstname, tussenvoegsel=:tussenvoegsel, last_name=:lastname WHERE username=:username");
    $stmt->execute(array(
        ':firstname' => $firstname,
        ':tussenvoegsel' => $tussenvoegsel,
        ':lastname' => $lastname,
        ':username' => $username
    ));
}
function updatePassword($passwordhash, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET password=:passwordhash WHERE username=:username");
    $stmt->execute(array(
        ':passwordhash' => $passwordhash,
        ':username' => $username
    ));
}
function updateEmailHidden($email, $emailhidden, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET contact_email=:email, email_hidden=:emailhidden WHERE username=:username");
    $stmt->execute(array(
        ':email' => $email,
        ':emailhidden' => $emailhidden,
        ':username' => $username
    ));
}
//beginning
function updateEmail($email, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET contact_email=:email email_hidden='1' WHERE username=:username");
    $stmt->execute(array(
        ':email' => $email,
        ':username' => $username
    ));
}
function updateFacebookHidden($facebook, $facebookhidden, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET contact_facebook=:facebook facebook_hidden=:facebookhidden WHERE username=:username");
    $stmt->execute(array(
        ':facebook' => $facebook,
        ':facebookhidden' => $facebookhidden,
        ':username' => $username
    ));
}
function updateFacebook($facebook, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET contact_facebook=:facebook facebook_hidden='1' WHERE username=:username");
    $stmt->execute(array(
        ':facebook' => $facebook,
        ':username' => $username
    ));
}
function updateTwitterHidden($twitter, $twitterhidden, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET contact_twitter=:twitter twitter_hidden=:twitterhidden WHERE username=:username");
    $stmt->execute(array(
        ':twitter' => $twitter,
        ':twitterhidden' => $twitterhidden,
        ':username' => $username
    ));
}
function updateTwitter($twitter, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET contact_twitter=:twitter twitter_hidden='1' WHERE username=:username");
    $stmt->execute(array(
        ':twitter' => $twitter,
        ':username' => $username
    ));
}
function updateBiography($biography, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET biography=:biography WHERE username=:username");
    $stmt->execute(array(
        ':biography' => $biography,
        ':username' => $username
    ));
}
function updateRatingUser($rating, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET user_rating=user_rating+:rating WHERE username=:username");
    $stmt->execute(array(
        ':rating' => $rating,
        ':username' => $username
    ));
}
function updateRatingAnswer($rating, $answer)
{
    global $db;
    $stmt = $db->prepare("UPDATE answers SET answer_rating=answer_rating+:rating WHERE answer_id=:answer");
    $stmt->execute(array(
        ':rating' => $rating,
        ':answer' => $answer
    ));
}
function atOBA($username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET atoba='1' WHERE username=:username");
    $stmt->execute(array(
        ':username' => $username
    ));
}
function atOBADestroy($username)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET atoba='0' WHERE username=:username");
    $stmt->execute(array(
        ':username' => $username
    ));
}

?>
