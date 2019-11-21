<form method="POST" action="form-handler" onsubmit="return checkForm(this);">
<p>Input: <input type="text" size="32" name="inputfield">
<p>Input: <input type="text" size="32" name="inputfield2">
<p>Input: <input type="text" size="32" name="abcd">
<input type="submit"></p>
</form>

<script>

  function checkForm(form)
  {
    // validation fails if the input is blank
    if(form.inputfield.value == "") {
      alert("Error: Input is empty!");
      form.inputfield.focus();
      return false;
    }
    if(form.inputfield2.value == "") {
      alert("2 fieleeel !");
      form.inputfield2.focus();
      return false;
    }
    if(form.abcd.value == "") {
      alert("3 fieldddd!");
      form.abcd.focus();
      return false;
    }
    return true;
  }

</script>