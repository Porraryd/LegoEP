function validate()
{
    var form  = document.getElementById("searchform");
    var query = form.search.value;

    if (query.length < 3)
    {
        window.alert("Please enter something!");
        return false;
    }

    return true;
}