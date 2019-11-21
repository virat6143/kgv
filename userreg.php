<title>DEE.AAU</title>
<link rel="icon" type="image/gif" href="aau.gif"></link>          
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;charset=utf8">
<link rel="stylesheet" href="BS4/bootstrap.min.css">
<script src="BS4/popper.min.js"></script>
<script src="BS4/jquery.min.js"></script>
<script src="BS4/bootstrap.min.js"></script>
<script src="js/jsapi.js"></script>

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
  function uservalid(evt) {
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

function viewPassword()
{
  var passwordInput = document.getElementById('upassword');
  var passStatus = document.getElementById('pass-status');

  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}
function viewPassword2()
{
  var passwordInput1 = document.getElementById('ucpassword');
  var passStatus1 = document.getElementById('pass-status1');

  if (passwordInput1.type == 'password'){
    passwordInput1.type='text';
    passStatus1.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput1.type='password';
    passStatus1.className='fa fa-eye';
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
  function ValidateCpwd() {
    var isValid = false;
    var regex = /^(?=.{6,})/;
    isValid = regex.test(document.getElementById("upassword").value);
    document.getElementById("spnErrorCpwd").style.display = !isValid ? "block" : "none";
    return isValid;
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
  <div class="jumbotron text-center" style="margin-bottom:10px;margin-top: 15px;background-image: url(reg1.jpg);">
    <form class="form-horizontal" role="form" name="RegForm"  method="POST" id="contact_form"  onsubmit="return uservalidation('contact_form');" action="userreg1.php">
      <div class="row" align="center">
        <div class="col-md-3"></div>

        <div class="col-md-12">
          <b><h2 class="btn btn-success">કલાર્ક તમારી નોંધણી કરો</h2></b>
          <hr>
        </div>

      </div>
      <?php  

      if (isset($_GET["success"]))
        echo "<div class='alert alert-success alert-dismissible fade show'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong> અભિનંદન !!!</strong> <b> સફ્રતાપૂર્વક તમે રજીસ્ટર થઇ ગયા છો!તમારી વિનતી એડમીન જોડે પોહચી ગઈ છે.</b>
    </div>";
    ?>


    <div class="form-group">
     <div class="input-group mb-1 mr-sm-1 mb-sm-0" style="color: orange">
      <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
      <input type="text"  name="uname" class="form-control" id="uname"
      placeholder="નામ નાખો" onkeypress="return onKeyValidate(event,alpha);">
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
      <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
          <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-phone"></i></div>
          <input type="text" name="umob" class="form-control" id="umob"
          placeholder="મોબાઈલ નંબર નાખો"  maxlength="10" title="6,7,8 અને 9 થી ચાલુ થતા નંબર જ નખાશે" minlength="10" 
          onchange="mobileNumber(this)" onkeypress='uservalid(event)'>
        </div>
        <span id="availabilitymob"></span>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
          <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-envelope"></i></div>
          <input type="email" name="uem" class="form-control" id="uem"
          placeholder="ઈ-મેલ નાખો" onchange="ema(this.value);">
        </div>
        <span id="availability1"></span>
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
       <div class="form-group">
      <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
        <div class="input-group-addon" style="width: 2.6rem">
          <i class="fas fa-chevron-circle-right"></i>
        </div>
        <select class="form-control" id="districtID" name="district" onchange="change_district()">
         <option value="">જિલ્લો પસંદ કરો</option>
         <?php
         include("connect.php");
         $qry="select * from district;";
         $rc=mysqli_query($con,$qry);
         while($data=mysqli_fetch_assoc($rc))
         {

          echo "<option value='".$data["d_id"]."'>".$data["district_name"]."</option>";

        }

        ?>
      </select>

    </div>
  </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
       <div class="form-group">
      <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
        <div class="input-group-addon" style="width: 2.6rem">
          <i class="fas fa-chevron-circle-right"></i>
        </div>
        <select class="form-control" id="talukaID" name="t_name" onchange="change_village()">
         <option value="">તાલુકો પસંદ કરો</option>
       </select>
     </div>
   </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
     <div class="form-group">
      <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
        <div class="input-group-addon" style="width: 2.6rem">
          <i class="fas fa-chevron-circle-right"></i>
        </div>
        <input type="text" name="v_name" class="form-control"
        id="v_name" placeholder="ગામનું નામ" onkeypress="return onKeyValidate(event,alpha);">
      </div>
    </div>
  </div>
   
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
      <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
        <div class="input-group-addon" style="width: 2.6rem">
         <i class="fas fa-barcode"></i>
       </div>
       <input type="text" name="pin" class="form-control"
       id="pin"  placeholder="પીનકોડ નાખો" maxlength="6" title="3 થી ચાલુ થતા નંબર જ નખાશે" minlength="6" onchange="pincode(this)"
       onkeypress='uservalid(event)'>
     </div>
     </div>
    </div>
 </div>

 <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
          <div class="input-group-addon" style="width: 2.6rem">
            <i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i>
          </div>
          <input type="password" name="upassword" class="form-control"
          id="upassword" placeholder="પાસવર્ડ નાખો" maxlength="25" minlength="3" onkeyup="isalphanum(this)"  onchange="return ValidateCpwd(this)">
        </div>
        <div class="form-row">
          <span id="spnErrorCpwd" style="color: orange; display: none">
            <b>*ઓછા માં ઓછા છ મૂળાક્ષર નાખો</b>
          </span>
        </div>
      </div>
  </div>
   
    <div class="col-xs-6 col-sm-6 col-md-6">
       <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
         <div class="input-group-addon" style="width: 2.6rem">
          <i id="pass-status1" class="fa fa-eye" aria-hidden="true" onClick="viewPassword2()"></i>
        </div>
        <input type="password" name="ucpassword" class="form-control"
        id="ucpassword" placeholder="પાસવર્ડ પુષ્ટિ કરો" maxlength="30" minlength="4" onkeyup="isalphanum(this)" onchange="check()">
      </div>
    </div>
    </div>
 </div>

   
     <div class="form-group has-danger">
      <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
        <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-map-marker-alt"></i></div>
        <textarea class="form-control" rows="2"  placeholder="સરનામું નાખો" aria-describedby="basic-addon1"  name="uadd" id="uadd"></textarea>
      </div>
    </div>
  
<button type="submit" id="submit11" class="btn btn-success" style="width: 60rem">સેવ કરો</button>
</form>
<button type="cencle" id="cencle" class="btn btn-danger" style="width: 60rem">રદ્દ કરો</button>

<div align="right">
<br>
  <a href="index.php" class="btn btn-info">
    <i class="fas fa-arrow-left"></i>પાછા જવા
  </a>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){ 
    $('#uem').blur(function(){

      var uem = $(this).val();
      $.ajax({

        url:'emailcheck.php',
        method:"POST",
        data:{email:uem},
        success:function(data)
        {
          if(data != '0')
          {
            $('#availability1').html('<span style="color:orange"><b>ઈમૈલ રજીસ્ટર થઇ ચુક્યો છે</b></span>');
            $('#submit11').attr("disabled", true);
          }
          else
          {
            $('#availability1').html('<span class="text-success"></span>');
            $('#submit11').attr("disabled", false);
          }
        }
      });

    });
  });

  $(document).ready(function(){ 
    $('#umob').blur(function(){

      var umob = $(this).val();
      $.ajax({

        url:'umobcheck.php',
        method:"POST",
        data:{mob1:umob},
        success:function(data)
        {
          if(data != '0')
          {
            $('#availabilitymob').html('<span style="color:orange"><b>મોબાઈલ નંબર રજીસ્ટર થઇ ચુક્યો છે</b></span>');
            $('#submit11').attr("disabled", true);
          }
          else
          {
            $('#availabilitymob').html('<span class="text-success"></span>');
            $('#submit11').attr("disabled", false);
          }
        }
      });

    });
  });
  $(document).ready(function(){
    $("#cencle").click(function(){
      $("#contact_form")[0].reset();
    });});

  function uservalidation(mmyform)
  {

    myform=document.forms[mmyform];
    if(myform.uname.value=="" ||myform.umob.value=="" ||myform.uem.value=="" || myform.uadd.value=="" || myform.upassword.value=="" || myform.ucpassword.value=="" || myform.districtID.value=="" || myform.talukaID.value=="" || myform.v_name.value=="" || myform.pin.value=="")
    {
     alert("કેટલીક વસ્તુ ભરવાની બાકી રહી ગયી છે.");
     return false;

   }
 }


 
</script>