<?php
include "error_logger.php";

function readResults() {
    
	$jsonFromFile = file_get_contents("resources/entries.json");
    $assoc_arr = json_decode($jsonFromFile, true);
	
	return $assoc_arr;
}

function showForm() {
echo 	'<form action = "entry.php" method = "post">';
		
		
echo 	'Name<br><input id="name" name="name" placeholder="Name"><br>
		Message<br><textarea id="message" name="message" placeholder="Messeage"></textarea>
		<br><input type = "submit">
		</form>';
		
}

function showGuestbook() {

$results = readResults();
 
echo '<ul>';

for($i = 0; $i < count($results); $i++) {
		echo '<li>' . $results[$i]['name'] . '</li>';
		echo $results[$i]['message'];
	}
	echo '</ul>';
}