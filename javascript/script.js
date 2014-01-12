
function fetchData() {
    $.getJSON('../php/search_log.json', showResults);
}

fetchData();
