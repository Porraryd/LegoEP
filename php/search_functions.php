<?php
include "error_logger.php";

function readResults() {
    $jsonFromFile = file_get_contents("search_log.json");
    $searches = json_decode($jsonFromFile, true);

    return $searches;
}

function displayResults() {
    $results = readResults();
    asort($results);
    $results = array_reverse($results);

    $i=0;
    echo '<ol>';
    foreach ($results as $text => $searches) {
        if($i==10) break;
        echo '<li><span style="text:' . $text . ';">' 
        . $text . '</span> has ' 
        . $searches . ' searches</li>';
        $i++;
    }
    echo '</ol>';
}