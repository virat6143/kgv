
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript">
  function preventback()
{

  window.history.forward();
}
setTimeout("preventback()",0);
window.onunload = function (){null};
</script>

<style>
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('giphy.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>

  <div class="loader"></div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("slow");
    });
  </script>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-heading">
      <h3 class="text-center" style="color: white">પબ્લિકેશન સ્ટોક મેનેજમેન્ટ સિસ્ટમ,ડી.ઈ.ઈ,એ.એ.યુ.</h3>
      <center><a href="http://www.aau.in/"><img id="profile-img" class="profile-img-card" src="aau.gif"/></center></a>
    </div>
    <hr />
    <?php  
    if (isset($_GET["ar"]))
     echo "<div class='alert alert-success alert-dismissible'>
   <button type='button' class='close' data-dismiss='alert'>&times;</button>
   <strong>સફળતાપૂર્વક લોગઆઉટ.</strong>
 </div>";
 if (isset($_GET["err"]))
   echo "<div class='alert alert-danger alert-dismissible'>
 <button type='button' class='close' data-dismiss='alert'>&times;</button>
 <strong>તમારુ યુઝરનેમ અથવા પાસવર્ડ ખોટો છે.</strong>
</div>";
?>
<div class="modal-body">
  <form action="logcheck.php" method="POST" onsubmit="return validateForm()">

    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-envelope"></span>
        </span>
        <input type="email" class="form-control" id="a_username" placeholder="abc@gmail.com" style="font-family: red; font-style: bold" name="a_username" oninvalid="setCustomValidity('ઈમેલ નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}"  required autofocus>
      </div>
    </div>
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-lock"></span>
        </span>
        <input type="password" class="form-control" id="a_password" placeholder="પાસવર્ડ" style="font-family: red" name="a_password"  oninvalid="setCustomValidity('પાસવર્ડ નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" required>
      </div>
    </div>
    <div class="form-group">
      <div class="input-group">
        <body onload="createCaptcha()">
        <div class="row">
          <div id="captcha" class="col-sm-3">
          </div>
          <div class="col-sm-6"> 
            <input type="text" class="form-control" placeholder="abcdef" id="cpatchaTextBox" oninvalid="setCustomValidity('કેપ્ચા નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" required/>
          </div>
          </div>
        </body>
        </div>
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-success btn-lg" id="submit"  name="submit">લોગઈન</button>
          <a href="userreg.php" class="btn btn-link">કલાર્ક રેજીસ્ટ્રેશન કરવા અહીં ક્લિક કરો</a>
          <a href="forgotps.php" class="btn btn-link"> પાસવર્ડ ભૂલી ગયા છો?</a>
        </div>

      </form>
    </div>
  </div>
</div>
<style type="text/css">
  .modal-content{
    background-color: darkcyan;
  }
  .btn-link{
    color:white;
  }
  .modal-heading h2{
    color:#ffffff;
  }

</style>
<script type="text/javascript">
  var code;
  function createCaptcha() {
 
  document.getElementById('captcha').innerHTML = "";
  var charsArray =
  "abcdefghijklmnopqrstuvwxyz";
  var lengthOtp = 5;
  var captcha = [];
  for (var i = 0; i < lengthOtp; i++) {
    
    var index = Math.floor(Math.random() * charsArray.length + 1); 
    if (captcha.indexOf(charsArray[index]) == -1)
      captcha.push(charsArray[index]);
    else i--;
  }
  var canv = document.createElement("canvas");
  canv.id = "captcha";
  canv.width = 100;
  canv.height = 60;
  var ctx = canv.getContext("2d");
  ctx.font = "30px Georgia";
  ctx.strokeText(captcha.join(""), 0, 30);
  
  code = captcha.join("");
  document.getElementById("captcha").appendChild(canv); 
}
function validateForm() {
  debugger
  if (document.getElementById("cpatchaTextBox").value == code) {
  
  }else{

    
    alert("કેપ્ચા ખોટો છે! ફરી થી નાખો");
    document.getElementById('cpatchaTextBox').value = "";
    createCaptcha();
    return false;

  }
}


 function ema(){

     var Number = document.getElementById('a_username').value;
     var IndNum =/^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z]+\.)+([a-zA-Z]{2,3})$/;

     if(IndNum.test(Number)){
        return;
    }

    else{
       alert("ઈ મેલ સરખો નાખો");
        document.getElementById('a_username').focus();
    document.getElementById('a_username').value="";
    }

}
</script>