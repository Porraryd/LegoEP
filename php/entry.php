

<?php 

function readResults() {
    
	$jsonFromFile = file_get_contents("../resources/entries.json");
    $assoc_arr = json_decode($jsonFromFile, true);
	
	return $assoc_arr;
}

$assoc_arr = readResults();
if(!$assoc_arr){
	$assoc_arr = array();
}
if(isset($_POST['message']) && isset($_POST['name']))  
{
	$arr = array();
	$arr["name"] = $_POST['name'];
	$arr["message"] = $_POST['message'];
	$datetime=date("y-m-d h:i:s");
	$arr["time"] = $datetime;
	$assoc_arr[] = $arr;

	$json_string = json_encode($assoc_arr);
	file_put_contents("../resources/entries.json", $json_string);
}

header("Location: ../mess.php");
