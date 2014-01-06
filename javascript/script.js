$(document).ready(function() {
    $('.search').autocomplete({
        source: function(request, response) {
            $.getJSON('/Setnames.json', { q: request.term }, function(result) {
                response($.map(data.destinations, function(item) {
                return item.value;
            }));
        });
    }
});