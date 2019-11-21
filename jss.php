<form method="post" action="/Tests/Post" onsubmit="return ValidateForm();">
    <fieldset>
    <legend>What is Your Favorite Pet?</legend>
    <input type="radio" name="favorite_pet" value="Cats" onchange="abcc()">Cats<br>
    <input type="radio" name="favorite_pet" value="Dogs">Dogs<br>
    <input type="radio" name="favorite_pet" value="Birds">Birds<br>
        <br>
    <input type="submit" value="Submit now">
    </fieldset>
</form>

<script type="text/javascript">
function abcc()
{
    var radioButtons = document.getElementsByName("favorite_pet");
    for(var i = 0; i < radioButtons.length; i++)
    {
        if(radioButtons[i].checked == true)
        {
            if(confirm("You have selected " + radioButtons[i].value + " as your favorite pet. Is that correct?"))
                return true;
            else
                return false;
        }
    }
}
</script>