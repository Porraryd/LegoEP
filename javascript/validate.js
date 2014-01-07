function validate()
{
    var form  = document.getElementById("searchform");
    var query = form.search.value;

    if (query == "")
    {
        window.alert("Please enter something!");
        return false;
    }

    return true;
}