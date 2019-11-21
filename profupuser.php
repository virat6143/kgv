<?php
include 'head.php';
include 'connect.php';
$uid=$_COOKIE['uid'];
$qry="select * from userreg where u_id='".$uid."'";
$rss=mysqli_query($con,$qry);
$ttt=mysqli_fetch_assoc($rss);
$name=$ttt['uname'];
$mob=$ttt['umob'];
$email=$ttt['uem'];
$add=$ttt['uadd'];
$pin=$ttt['pin'];

?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<style type="text/css">
	
  @media(min-width: 768px) {
    .field-label-responsive {
      padding-top: .5rem;
      text-align: right;
    }
  }
</style>
<script type="text/javascript">
  function onlyNos(e, t) {

    try {

      if (window.event) {

        var charCode = window.event.keyCode;

      }

      else if (e) {

        var charCode = e.which;

      }

      else { return true; }

      if (charCode > 31 && (charCode < 48 || charCode > 57)) {

        return false;

      }

      return true;

    }

    catch (err) {

      alert(err.Description);

    }

  }
  var alpha = "[ A-Za-z]";
  var numeric = "[0-9]"; 
  var alphanumeric = "[ A-Za-z0-9]"; 

  function onKeyValidate(e,charVal){
    var keynum;
    var keyChars = /[\x00\x08]/;
    var validChars = new RegExp(charVal);
    if(window.event)
    {
      keynum = e.keyCode;
    }
    else if(e.which)
    {
      keynum = e.which;
    }
    var keychar = String.fromCharCode(keynum);
    if (!validChars.test(keychar) && !keyChars.test(keychar))   {
      return false
    } else{
      return keychar;
    }
  }

  function mobileNumber(){

   var Number = document.getElementById('umob').value;
   var IndNum = /^[0]?[6789]\d{9}$/;

   if(IndNum.test(Number)){
    return;
  }

  else{
   alert( "મોબાઇલ નંબર સરખો નાખો.");
   document.getElementById('umob').value="";
   document.getElementById('umob').focus();
 }

}
function ema(){

 var Number = document.getElementById('uem').value;
 var IndNum =/^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z]+\.)+([a-zA-Z]{2,3})$/;

 if(IndNum.test(Number)){
  return;
}

else{
 alert("ઈ મેલ સરખો નાખો");
 document.getElementById('uem').focus();
 document.getElementById('uem').value="";
}

}
function check()
{
  if(document.getElementById('upassword').value === document.getElementById('ucpassword').value)
  {

  } 
  else 
  {
    document.getElementById('upassword').value="";
    document.getElementById('ucpassword').value="";
    document.getElementById('upassword').focus();
    alert("તમારો પાસવર્ડ સરખો નથી");
  }
}

function pincode(){

 var Number = document.getElementById('pin').value;
 var IndNum = /^[3-9][0-9]{5}$/;

 if(IndNum.test(Number)){
  return;
}

else{
 alert( "પીનકોડ સરખો નાખો.");
 document.getElementById('pin').value="";
 document.getElementById('pin').focus();
}

}

</script>  


<script type="text/javascript">

  function change_district()
  {
    var id =$('#districtID').val();


    var request = $.ajax({
      url: "disajax.php",
      type: "GET",
      data: {district : id},
      dataType: "html"
    });

    request.done(function(msg) {
      $("#talukaID").html("");
      $("#talukaID").html(msg);        
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Request failed: " + textStatus );
    });
  }



  function change_village()
  {
    var tid =$('#talukaID').val();
    var did =$('#districtID').val();


    var request = $.ajax({
      url: "talukaajax.php",
      type: "GET",
      data: {taluka : tid,district:did},
      dataType: "html"
    });

    request.done(function(msg) {
      $("#villageID").html("");
      $("#villageID").html(msg);        
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Request failed: " + textStatus );
    });
  }
</script>

<script type="text/javascript">
  google.load("elements", "1", {packages: "transliteration"});
</script> 
<script type="text/javascript">


  google.load("elements", "1", {
    packages: "transliteration"
  });

  function onLoad() {
    var options = {
      sourceLanguage:
      google.elements.transliteration.LanguageCode.ENGLISH,
      destinationLanguage:
      [google.elements.transliteration.LanguageCode.GUJARATI],
      shortcutKey: 'ctrl+g',
      transliterationEnabled: true
    };


    var control = new google.elements.transliteration.TransliterationControl(options);


    if($("#uname").length){
      control.makeTransliteratable(['uname']);
    }
   /* if($("#umob").length){
      control.makeTransliteratable(['umob']);
    }*/
    if($("#uadd").length){
      control.makeTransliteratable(['uadd']);
    }
    if($("#usname").length){
      control.makeTransliteratable(['usname']);
    }
    if($("#v_name").length){
      control.makeTransliteratable(['v_name']);
    }
    

  }
  google.setOnLoadCallback(onLoad);
</script>

<div class="container">
  <form class="form-horizontal"  role="form" name="RegForm"  method="POST" id="contact_form" action="userprof1.php">
    <div class="row" align="center">
      <div class="col-md-3"></div>

      <div class="col-md-6">
        <b><h2><span class="badge badge-primary">સુધારો કરો</h2></b>
        <hr>
      </div>

    </div>
    <?php  

    if (isset($_GET["success"]))
      echo "<center><div class='alert alert-success alert-dismissible fade show col-md-6'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>અભિનંદન!!!  સફ્રતાપૂર્વક સુધારો થઇ ગયો છે</strong> 
  </div></center>";

  ?>
  <div class="row">
    <div class="col-md-3 field-label-responsive">
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <div class="input-group mb-1 mr-sm-1 mb-sm-0" style="color: black">
          <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
          <input type="text"  name="uname" class="form-control" id="uname"
          placeholder="યુઝરનું નામ નાખો" value="<?php echo $name ?>" onkeypress="return onKeyValidate(event,alpha);" required>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-control-feedback">
        <span class="text-danger align-middle">
        </span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 field-label-responsive">  
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: black">
          <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-phone"></i></div>
          <input type="text" name="umob" class="form-control" id="umob"
          placeholder="યુઝરનો મોબાઈલ નંબર નાખો"  maxlength="10" title="6,7,8 અને 9 થી ચાલુ થતા નંબર જ નખાશે" minlength="10" onchange="mobileNumber(this)" value="<?php echo $mob ?>" required>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-control-feedback">
        <span class="text-danger align-middle">
        </span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 field-label-responsive">  
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: black">
          <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-envelope"></i></div>
          <input type="email" name="uem" class="form-control" id="uem"
          placeholder="યુઝરનો ઈ-મેલ નાખો" value="<?php echo $email ?>"  onkeyup="isalphanum(this)" onchange="ema(this.value);" required>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-control-feedback">
        <span class="text-danger align-middle">
        </span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 field-label-responsive">
    </div>
    <div class="col-md-6">
      <div class="form-group has-danger">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: black">
          <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-map-marker-alt"></i></div>
          <textarea class="form-control" rows="2"  name="uadd" id="uadd"><?php echo $add ?></textarea>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-control-feedback">    
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 field-label-responsive">
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: black">
          <div class="input-group-addon" style="width: 2.6rem">
           <i class="fas fa-barcode"></i>
         </div>
         <input type="text" name="pin" class="form-control"
         id="pin"  placeholder="પીનકોડ નાખો" maxlength="6" value="<?php echo $pin ?>" title="3 થી ચાલુ થતા નંબર જ નખાશે" minlength="6" onchange="pincode(this)" required>
       </div>
     </div>
   </div>
 </div>
 <div class="row">
  <div class="col-md-3 field-label-responsive">
  </div>
</div> 
<div class="row" align="center">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <button type="submit"  onclick="return all_check();" id="submit1" class="btn btn-success">સેવ કરો</button>
  </div>
</div>
</form>
<div align="right">
  <a href="home.php" class="btn btn-info">
    <i class="fas fa-arrow-left"></i> હોમપેજ પર જવા
  </a>
</div>
</div>

<?php
include 'footer.php';
?>