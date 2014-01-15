function showResults(data) {
    setTimeout(fetchData, 1000);
}

function fetchData() {
    $.getJSON('../LegoEPny/resources/search_log.json', showResults);
}

fetchData();
