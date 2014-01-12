<?php
include "php/search_functions.php";

if(isset($_GET['search'])) {
    $text = $_GET['search'];
    $searches = readResults();

    if(!isset($searches[$text])) {
        $searches[$text] = 0;
    }
    $searches[$text]++;

    //var_dump($searches);

    $jsonToSave = json_encode($searches);
    file_put_contents("search_log.json", $jsonToSave);
}
//header("Location: index.php");
?>