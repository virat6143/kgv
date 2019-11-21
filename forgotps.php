
<!DOCTYPE html>
<html>
<head>
  <title>DEE.AAU</title>
 <link rel="icon" type="image/gif" href="aau.gif"></link>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="BS4/bootstrap.min.css">
  <script src="BS4/popper.min.js"></script>
  <script src="BS4/jquery.min.js"></script>
  <script src="BS4/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<style type="text/css">
 .form-gap {
  padding-top: 70%;
}

</style>
<div class="container" style="padding-top: 5%">
  <div class="row">
    <div class="col-md-5 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="text-center">
            <img id="profile-img" class="profile-img-card" src="aau.gif" />
            <b><h4 style="color: orange">પબ્લિકેશન સ્ટોક મેનેજમેન્ટ સિસ્ટમ,ડી.ઈ.ઈ,એ.એ.યુ.</h4></b>
            <h3 class="text-center">પાસવર્ડ મેળવવા?</h3>
            <div class="panel-body">

             <form action="fp2.php" method="POST">
              <div>
                <?php 
                if (isset($_GET["error"]))
                {

                  if($_GET["error"]==0)
                  {
                    echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>તમે  વપરાશકર્તા  નથી.</strong> 
                  </div>";
                }
                else if($_GET["error"]==1)
                {
                  echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
               <strong> અભિનંદન !!!</strong> <b>ઈમેલ મોકલાય ગયો છે.</b> 
                </div>";
              }
            }
            ?>
          </div>
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
              <input type="text"  name="email" placeholder="ઈમેલ" class="form-control" id="email" oninvalid="setCustomValidity('ઈમેલ નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" >
            </div>
          </div>
          <div class="form-group">
            <input name="recover-submit" class="btn btn-lg btn-success btn-block" value="મોકલો" type="submit">
          </div>
        </form>
        <div align="right">
          <a href="index.php" class="btn btn-info">
            <i class="glyphicon glyphicon-arrow-left"></i> પાછા જવા
          </a>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</body>
</html>