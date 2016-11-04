<?php
// search.php - v1.0A - ©2012 Martijn van Delden
// Summary: Provides the search function on the site.
//includes html/header.php
require 'html/header.php';


//checks if zoek variable is not null
if (isset($_POST["zoek"])) {
    //inlcudes displayquestions.php
    include 'displayquestions.php';
    
    //searchquery is given the "zoek" value
    $searchquery = $_POST["zoek"];
    
    //displays linebreak
    echo "<br>";
    
    //displays table with id 'questionlisttable'
    echo "<table id='questionlisttable'>";
    
    //displays table row
    echo "<tr>
    <th class='title' colspan='6'>U zocht op: " . $searchquery . "</th>
    </tr>
    <tr>
  <th>Titel</th>
  <th>Steller</th>
  <th style='text-align:right;'>Gesteld op</th>
</tr>";
    
    //output of the searchquery is put into a prepared statement
    $stmt = search($searchquery);
    
    //Displays the output in a table
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td><div class='hideextra' style='width: 300px';><a class='questionLink' href=qa.php?tag=" . $row['tag'] . "&qa=" . $row['question_id'] . ">" . $row['question_title'] . "</a></div></td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td style='text-align: right; color:a4a4a4;'>" . $row['question_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    //includes html/bottom.php
    require 'html/bottom.php';
}


?>

