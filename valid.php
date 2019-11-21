<input type='text' onkeypress='validate(event)' />

<script type="text/javascript">

function validate(evt) {
  var theEvent = evt || window.event;

  
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
 
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>