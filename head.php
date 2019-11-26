
<?php
include "connect.php";
session_start();
if(!(isset($_SESSION['auname']) || isset($_SESSION['uname'])))
{
  header("Location: index.php");

}

?>

<!DOCTYPE html>
<html>
<head>
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
 
 <style>
  .fakeimg {
    height: 100px;
    background: #aaa;
  }
  li a:hover{
    background-color: orange;
  }

</style>
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
</head>
<script type="text/javascript">
  function preventback()
{

  window.history.forward();
}
setTimeout("preventback()",0);
window.onunload = function (){null};
</script>

<body style="background-image: url(back4.jpg);">
  <div class="container" style="background-color:#e0e0e0";>
    <div class="head1" style="height: 130px;width: 100% auto; background-image: url(h1.jpg);">
        <div class="row" style="align-items: center;">
            <div class="col-sm-2">
             <a href="http://www.aau.in">   <img id="profile-img" class="profile-img-card" src="aau.gif" style="padding-top: 20px;" align="left" />
             </a>
            </div>
            <div class="col-sm-8">
           <a href="home.php">  <h3 class="text-center text-light" align="center">પબ્લિકેશન સ્ટોક મેનેજમેન્ટ સિસ્ટમ,ડી.ઈ.ઈ,એ.એ.યુ.</h3></a>
             </div>
        </div>
    </div>
 
 <!--   <div class="aau">
   <marquee scrollamount="4" behavior="scroll" onmouseout="this.start();" onmouseover="this.stop();" style="overflow-x: hidden; max-width: 100%;background-color: white;height: 40px;padding-top: 10px;"><a href="http://www.aau.in" target="_blank" style="text-decoration:none; color:#81c784;">
       <b>આણંદ કૃષિ યુનિવર્સિટી માં આપણું સ્વાગત છે</b></a></marquee>
  </div> -->
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="nav navbar-nav float-md-left">
       <li>
         <a class="nav-link" style="color:#ffffff" href="home.php"><i class="fa fa-home" aria-hidden="true"></i>  હોમ</a>
       </li>   
       <ul class="nav navbar-nav mx-auto">
        <?php
        if (isset($_SESSION["auname"]))
        {
          echo"<li>
          <a class='nav-link' style='color:#ffffff' href='bookinfo.php'>બુકની માહિતી
        </a>  
        </li>";
        echo "<li>
        <a class='nav-link' style='color:#ffffff' href='subinfo.php'>કૃષિ ગોવિદ્યા ગ્રાહકની માહિતી
        </a>
      </li>";
      echo"<li>
      <a class='nav-link' style='color:#ffffff' href='fetch_user.php'>કલાર્કની માહિતી
     </a>
  </li>";

}
if(isset($_SESSION["uname"]))
{
  echo"<li class='nav-item'>
  <a class='nav-link' style='color:#ffffff' href='adbooksee.php'>બુકની માહિતી
  </a>
</li>";
echo"<li>
<a class='nav-link' style='color:#ffffff' href='ad_ment.php'>જાહેરાત અંગે
</a>
</li>";
echo"<li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' style='color:#ffffff' href='#' id='navbardrop' data-toggle='dropdown'>કૃષિ ગોવિદ્યા
</a>
<div class='dropdown-menu' style='color: white'>
  <a class='dropdown-item' href='subscriber.php' style='color: orange'>ગ્રાહકની માહિતી જુઓ</a>
   <a class='dropdown-item' href='subreport.php' style='color: orange'>રિપોર્ટ મેળવો</a>
    <a class='dropdown-item' href='lable.php' style='color: orange'>લેબલ કાઢવા માટે</a>
</div>
</li>";

echo"<li>
<a class='nav-link' style='color:#ffffff' href='placeorder.php'>વેચાણની રસીદ
</a>
</li>";
echo"<li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' style='color:#ffffff' href='#' id='navbardrop' data-toggle='dropdown'>રિપોર્ટ
</a>
<div class='dropdown-menu' style='color: white'>
  <a class='dropdown-item' href='orderreport.php' style='color: orange'>નાણાં ભરનાર પત્રક રિપોર્ટ</a>
   <a class='dropdown-item' href='1.php' style='color: orange'>બુક વેચાણ રિપોર્ટ (exel)</a>
</div>
</li>";

}
?>  
</ul>
<ul class="nav navbar-nav mx-auto">
  <?php
  if (isset($_SESSION['uname']) || isset($_SESSION['auname'])) 
  {
    if(isset($_SESSION['auname']))
    {

      echo "<li><h5 style='padding-left:80px;margin-top:8px ;font-family:UniversCondensed;color:orange'> એડમીન ".$_SESSION['auname']."</h5></li>";
    }
    if(isset($_SESSION['uname']))
    {

      echo "<li><h5 style='padding-left:90px;margin-top:8px ;font-family:UniversCondensed;color:orange'> શ્રીમાન ".$_SESSION['uname']."</h5></li>";
    }

  }
  ?>
</ul>
</ul>
<ul class="nav navbar-nav mx-auto">

  <?php
  if(isset($_SESSION["uname"]))
  {
   echo"<li class='nav-item dropdown'>
   <a class='nav-link dropdown-toggle' style='color:white' href='#' id='navbardrop' data-toggle='dropdown'><i class='fa fa-cog fa-spin fa-2x fa-fw'></i>
   </a>
   <div class='dropdown-menu' style='color: blue'>
    <a class='dropdown-item' href='profupuser.php' style='color: orange'><i class='fa fa-user' aria-hidden='true'></i> સુધારો કરો</a>
    <a class='dropdown-item' href='changepass_user.php' style='color: orange'><i class='fa fa-key' aria-hidden='true'></i> પાસવર્ડ બદલો</a>
    <a class='dropdown-item' href='logout.php' style='color: orange'><i class='fas fa-log-out'></i>લોગઆઉટ</a>
  </div>
</li>";
}
if(isset($_SESSION["auname"]))
{
   echo"<li class='nav-item dropdown'>
   <a class='nav-link dropdown-toggle' style='color:white' href='#' id='navbardrop' data-toggle='dropdown'><i class='fa fa-cog fa-spin fa-2x fa-fw'></i>
   </a>
   <div class='dropdown-menu' style='color: blue'>
    <a class='dropdown-item' href='changepass_admin.php' style='color: orange'><i class='fa fa-key' aria-hidden='true'></i> પાસવર્ડ બદલો</a>
    <a class='dropdown-item' href='logout.php' style='color: orange'>લોગઆઉટ</a>
  </div>
</li>";
}
?>
</ul>

</div>  
</nav>

<div class="jumbotron" style="background-color:#FFF">


