<form method="post" action="/login">
    <input type="text" id="email" name="email" size="35" maxlength="40" placeholder="Email" />
    <input type="password" id="password" name="password" size="15" maxlength="20" placeholder="Password"/>
    <input type="submit" id="send" value="Send">
</form>

<script>
$(document).ready(function() {    
    $('#send').prop('disabled', true);

    $('#email, #password').keyup(function(){

        if ($('#password').val() != '' && $('#email').val() != '')
        {
            $('#send').prop('disabled', false);
        }
        else
        {
            $('#send').prop('disabled', true);
        }
    });
});
</script>