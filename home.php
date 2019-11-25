<!DOCTYPE html>
<html>

<?php
include "connect.php";
include "head.php";
?>
<style>
  body {
    background: #111
  }

  .caption {
    overflow: hidden;
    opacity: .99;
    position: relative;
    box-shadow: 0 0 1.5em 0 rgba(0, 0, 0, 0.05);
    display: inline-block
  }

  .caption:before {
    content: '';
    background: -webkit-linear-gradient(top, transparent 0%, rgba(0, 0, 0, 0.85) 100%);
    background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.85) 100%);
    width: 100%;
    height: 50%;
    opacity: 1;
    position: absolute;
    top: 50%;
    left: 0;
    z-index: 2;
    -webkit-transition-property: top, opacity;
    transition-property: top, opacity;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
  }

  .caption img {
    display: block;
    max-width: 100%;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
  }

  .caption .details {
    font-size: 1em;
    line-height: 1.1em;
    padding: 1em;
    color: #fff;
    text-shadow: 0px 0px 3px #000;
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: 3;
  }

  .caption .details span {
    display: block;
    opacity: 1;
    position: relative;
    top: 50%;
    -webkit-transition-property: top, opacity;
    transition-property: top, opacity;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
  }

  .caption .details .title {
    line-height: 1em;
    font-weight: bold;
    font-size: 1em;
  }

  .caption .details .info {
    line-height: 1.2em;
    margin-top: 0.25em;
    font-size: 0.8em;
  }

  @media only screen and (min-width:768px) {
    .caption .details span {
      opacity: 1;
      top: 100px
    }
    .caption:before {
      opacity: 1;
      top: 100%
    }
    .caption:focus:before,
    .caption:focus span,
    .caption:hover:before,
    .caption:hover span {
      opacity: 1;
    }
    .caption:focus:before,
    .caption:hover:before {
      top: 50%;
    }
    .caption:focus span,
    .caption:hover span {
      top: 0;
    }
    .caption:focus .title,
    .caption:hover .title {
      -webkit-transition-delay: 0.15s;
      transition-delay: 0.15s;
    }
    .caption:focus .info,
    .caption:hover .info {
      -webkit-transition-delay: 0.25s;
      transition-delay: 0.25s;
    }
  }
</style>






<?php
$con=mysqli_connect('localhost','root','','psms');
if (mysqli_connect_errno($con)){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT * FROM book WHERE status=0";
if ($result = mysqli_query($con,$sql)){
  $rowcount = mysqli_num_rows($result);
  mysqli_free_result($result);
}
mysqli_close($con);
?>
<?php
$con=mysqli_connect('localhost','root','','psms');
if (mysqli_connect_errno($con)){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT * FROM subscriber";
if ($result = mysqli_query($con,$sql)){
  $rowcount3 = mysqli_num_rows($result);
  mysqli_free_result($result);
}
mysqli_close($con);
?>

<?php
$con=mysqli_connect('localhost','root','','psms');
if (mysqli_connect_errno($con)){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sqla = "SELECT * FROM book WHERE  bno <= 100 AND status = 0";
if ($resulta = mysqli_query($con,$sqla)){
  $rowcount2 = mysqli_num_rows($resulta);

  mysqli_free_result($resulta);
}
mysqli_close($con);
?>

<div class="alert alert-success">
 <body>
   <center><b style="color:black">આંણદ કૃષિ યુનિવર્સિટી દ્વારા  વિવિધ  વિષયો  ઉપર  પ્રકાશીત   કરવામાં આવેલ  પુસ્તકો </b></center>
 </body>
</div>
<div class="row">
  <div class="form-group row col-sm-12">
    <div class="col-sm-6">
     <div class="card" style="height: 300px;width: 520px;background-color: aliceblue">
       <a href="#" class="caption">
        <img src="aaub.jpg" alt="Los Angeles" width="520" height="300">
        <div class="details">
          <span class="title">આંણદ કૃષિ યુનિવર્સિટી ભવન</span>
        </div>
      </a>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="height: 300px;width: 520px;background-color: aliceblue">
      <div class="alert alert-info">
        <center><h6 style="color: black"><b>પ્રકાશીત કરવામાં આવેલ પુસ્તકોની યાદી</b></h6></center>
      </div>
      <marquee scrollamount="4" direction= "up"> 
       <center>
         <h6 style="color: black"><b>ફળ પાકો</b></h6>
         <h6 style="color: black"><b>સજીવ ખેતી</h6>
         <h6 style="color: black"><b>જૈવિક ખાતરો</h6>
         <h6 style="color: black"><b>જૈવિક નિયત્રંણ</h6>
         <h6 style="color: black"><b>ડેરી ઉદ્યોગ</h6>
         <h6 style="color: black"><b>શાકભાજી પાકો</h6>
         <h6 style="color: black"><b>મસાલા પાકો</h6>
         <h6 style="color: black"><b>મધમાખી પાલન</h6>
         <h6 style="color: black"><b>વર્મીકમ્પોસ્ટ</h6>
         <h6 style="color: black"><b>ઘાસચારા  પાકો</h6>
         <h6  style="color: black"><b>કિચન ગાર્ડન</h6>
         <h6 style="color: black"><b>કૃષિ માર્ગદર્શિકા</h6>
         <h6 style="color: black"><b>આદર્શ બીજ ઉત્પાદન </h6>
         <h6 style="color: black"><b>માનવ આહાર અને પોષણ</h6>
         <h6 style="color: black"><b>ખેતી આધુનિક અભિગમો</h6>
         <h6 style="color: black"><b>મશરૂમ ની વૈજ્ઞાનિક ખેતી</h6>
         <h6 style="color: black"><b>વૃક્ષો ની  વૈજ્ઞાનિક ખેતી</h6>
         <h6  style="color: black"><b>સૂક્ષ્મ પિયત પધ્ધતિ</h6>
         <h6  style="color: black"><b>ગૃહ ઉદ્યોગ તરીકે બેકરી વાનગીઓ</h6>
         <h6  style="color: black"><b>કૃષિ ક્ષેત્રે વપરાતા કીટનાશક</h6>
         <h6 style="color: black"><b>પશુપાલન બમની આવક નો સ્ત્રોત</h6>
         <h6 style="color: black"><b>ગ્રીનહાઉશ અને નેટહાઉશ  ટેકનોલોજી</h6>
         <h6  style="color: black"><b>તેલીબિયાંના પાકોની વૈજ્ઞાનિક ખેતી</h6>
         <h6 style="color: black"><b>સોયાબીનની વૈજ્ઞાનિક ખેતી અને મૂલ્ય વર્ધન</h6>
         <h6  style="color: black"><b>ખેતી પાકો ના અગત્યના રોગો અને તેનું નિયત્રંણ</h6>
         <h6  style="color: black"><b>કૃષિ પાકોમાં પ્રોસેસીંગ અને તેનું મૂલ્ય વર્ધન</h6>
       </center>
     </marquee>
   </div>
 </div>
</div>
</div>
<div class="alert alert-info">
 <body>
   <center><b style="color: orange">મુખ્ય માહિતી</b></center>
 </body>
</div>
<div class="container" style="background-color:">
  <br>
  <div class="form-group row col-sm-12">
    <div class="col-sm-4">
      <div class="card" style="width: 16rem;">

       <a href="#" class="caption">
         <img class="card-img-top" src="bst.png" alt="Card image cap">
         <div class="details">
          <span class="title"><b>હાજર બુક :-<?php echo $rowcount; ?></b></span>
        </div>
      </a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="width: 16rem;">
      <a href="#" class="caption">
        <img class="card-img-top" src="sub.png" alt="Card image cap">
        <div class="details">
          <span class="title"><b>હાજર કૃષિ ગોવિદ્યા ગ્રાહક:-</b><b><?php echo $rowcount3; ?></b></span>
        </div>
      </a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="width: 16rem;">
     <a href="#" class="caption">
      <img class="card-img-top" src="Books-icon.png" alt="Card image cap">
      <div class="details">
        <span class="title"><b> ૧૦૦ કરતા ઓછી બુક :-<?php echo $rowcount2; ?></b></span>
      </div>
    </a>
  </div>
</div>
</div> 
</div>
<br>
<div class="form-group row col-sm-12">
  <div class="col-sm-7">
   <div class="panel panel-default">
    <div class="panel-body">
      <div id="calendar" style="width: 80%;height: 90%;"></div>
    </div>  
  </div>
</div> 
<div class="col-sm-5">
 <div class="panel panel-default">
  <div class="panel-body">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.1532012528555!2d72.9727256150489!3d22.535933139994697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e4c1404dc0095%3A0xfe74f82d3ca3cf00!2sUniversity+Bhavan!5e0!3m2!1sen!2sin!4v1566583029827!5m2!1sen!2sin" width="450" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>  
</div>
</div> 
</div>
<bR>
  <style type="text/css">
    .ancc {
      background: #16222A;
      background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
      background: linear-gradient(59deg, #3A6073, #16222A);
      color: white;
    }
  </style>
  <div class="ancc" style="height: 250px;">
    <div class="container-fluid text-center text-md-left">
      <div class="row">
        <div class="col-md-6 mt-md-0 mt-5">
          <br>
          <h3 style="color: white">::::::::::::સંપર્ક કરો::::::::::::</h3>
          <br>
          <h5><i class="fa fa-user" aria-hidden="true"  style="color: orange"></i> તંત્રી શ્રી:<b>પિનાકીન સી પટેલ</b></h5>
          <h4><i class="fa fa-mobile" aria-hidden="true" style="color: orange"></i> ફોન: (02692) 261921</h4>
          <h4><i class="fa fa-envelope" aria-hidden="true"  style="color: orange"></i><a href="http://www.aaunews@aau.in/"> aaunews@aau.in</a></h4>
        </div>

        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-6 mb-md-0 mb-3">
          <br>
          <h3 style="color: white">::::::::::::સરનામું::::::::::::</h3>
          <br>
          <h6><i class="fa fa-map-marker" aria-hidden="true" style="color: orange"></i> <b>તંત્રી,</h6>
          <h6>'કૃષિ ગોવિદ્યા' પ્રકાશન વિભાગ વિસ્તરણ શિક્ષણ નિયામક ની કચેરી યુનિવર્સિટી ભવન, આણંદ કૃષિ  યુનિવર્સિટી આણંદ જી.આણંદ -388110.</b></h6>
        </div>
      </div>
    </div>
  </div>
  <div>
    <a id="back2Top" title="Back to top" href="#">&#10148;</a>
  </div>
  </html>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

  <script type="text/javascript">
    $(function () {

     $('#navDashboard').addClass('active');

     var date = new Date();
     var d = date.getDate(),
     m = date.getMonth(),
     y = date.getFullYear();

     $('#calendar').fullCalendar({
       header:{
         left:'prev,next today',
         center:'title',
         right:''
       },
       buttonText: {
        today: 'આજની તારીખ',
        month: 'month'          
      }        
    });

   });
 </script>
 <style>
  #back2Top {
    width: 60px;
    line-height: 40px;
    overflow: hidden;
    z-index: 999;
    display: none;
    cursor: pointer;
    -moz-transform: rotate(270deg);
    -webkit-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
    position: fixed;
    bottom: 80px;
    right: 0;
    background-color:orange;
    color: #555;
    text-align: center;
    font-size: 40px;
    text-decoration: none;
  }
  #back2Top:hover {
    background-color: #DDF;
    color: #000;
  }
</style>

<script>
 $(window).scroll(function() {
  var height = $(window).scrollTop();
  if (height > 100) {
    $('#back2Top').fadeIn();
  } else {
    $('#back2Top').fadeOut();
  }
});
 $(document).ready(function() {
  $("#back2Top").click(function(event) {
    event.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });

});
</script>
<?php
//include "address.php";
include "footer.php";
?>