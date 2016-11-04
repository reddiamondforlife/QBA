<?php
// qa.php - v1.0A - ©2012 Daniël Koek
// Summary: This script creates the formatting of all questionnaires, tables and tagclouds.

/**includes html/header.php
 *includes displayquestion.php
 */
require 'html/header.php';
require 'displayquestions.php';

/**if tag variable and qa variable are not null then the questions and the answer that are relevant to the qa are displayed
 * and the textarea for the answer is displayed
 */
if (isset($_GET["tag"]) && isset($_GET["qa"])) {
    displayQuestions($_GET["qa"]);
    displayAnswer($_GET["qa"]);
    displayTextareaAnswer();
}

//if tag variable is set than the relevant questions are displayed
else if (isset($_GET["tag"])) {
    displayTagQuestions($_GET["tag"]);
}

//if tag variable is null than a line break is displayed and the dates of the relevant questions are displayed
if (!isset($_GET["tag"])) {
    echo '<br>';
    echo displayQuestionsDate();
}

/**if answer var is not null and question var is not null than the value of answer is given to answer
 *and the value of question is given to question
 *and the question that is answered is updated with the variables answer and question
 * and UpdateQuestionIsAnswered funtction is called
 */
if (isset($_POST["answer"]) && isset($_POST["question"])) {
    $answer   = $_POST["answer"];
    $question = $_POST["question"];
    updateQuestionIsAnswered($answer, $question);
    echo "<meta http-equiv='refresh'content='2;url=" . $_POST["url"] . "'>";
}

//includes html/bottom.php
require 'html/bottom.php';
?>