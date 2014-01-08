<?php 
include "functions.php";

$assoc_arr = readResults();
if(!$assoc_arr){
	$assoc_arr = array();
}
if(!$_POST['name'] == "") {
	
	if(!$_POST['message'] == "") {
		$name = $_POST['name'];
		$mess = $_POST['message'];
		$arr = array();
		$arr["name"] = $name;
		$arr["message"] = $mess;
		$assoc_arr[] = $arr;
	}
}

$json_string = json_encode($assoc_arr);
file_put_contents("entries.json", $json_string);

header("Location: index.php");