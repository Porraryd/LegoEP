<?php
include "error_logger.php";

function readResults() {
    
	$jsonFromFile = file_get_contents("resources/entries.json");
    $assoc_arr = json_decode($jsonFromFile, true);
	
	return $assoc_arr;
}

function showForm() {
echo 	'<form action = "php/entry.php" method = "post">';
echo 	'Name: <br> <input id="name" name="name" class="input_text" placeholder="Your name"><br>
		Your message: <br><textarea id="message" name="message" class="gb_textarea" placeholder="Message"></textarea>
		<br><input type = "submit" value="Send message">
		</form>';
		
}

function showGuestbook() {

$results = readResults();
 
for($i = 0; $i < count($results); $i++) {
		echo '<div id="guestbook_entry">';
		echo '<div class="gb_name">' . $results[$i]['name'] . '</div>' . '<div class="gb_timestamp">' . $results[$i]['time'] . '</div><br>';
		echo $results[$i]['message'];
		echo '</div>';
	}
}