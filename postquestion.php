<?php
// postquestion.php - v1.0A - ©2012 Daniël Koek
// Summary: This script ensures that the questions along with the tags in the DB are stored.

require 'html/header.php';
//check if all text are set
if (isset($_POST["question"]) && isset($_POST["description"]) && isset($_POST["tags"])) {
    //each tag seperated by ; is posted as a tag
    $tags = explode(";", $_POST["tags"]);
    foreach ($tags as &$tag) {
        insertTag($tag);
    }
    //insert the question in the database, with the name of the user added
    sqlQuestionInsert($_POST["question"], $_POST["description"], $_SESSION['username'], $_POST["tags"]);
    echo "Post word verwerkt.....";
    echo "<meta http-equiv='refresh'content='2;url=index.php'>";
} else
    echo "Problemen met het posten sorry!";
require 'html/bottom.php';
?>