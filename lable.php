<?php
include 'head.php';
?>
<html>
<head>
</head>
<body>

 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

 <script type="text/javascript">

  $(function() {
   $("#date1").datepicker({ dateFormat: "yy/mm" }).val()
 });

</script>
<center>
<div class="Container" style="width: 70%;">
 <center><b><h2 class="btn btn-success">ગ્રાહક સ્ટીકર મેળવવા</h2></b></center>
 <div>
  <form method="POST" action= "lable1.php">
    <div class="modal-content">
      <div class="modal-header">   
        <h6 class="modal-title" style="font-size: 20px;"><b>મહિનો પસંદ કરો</b></h6>
      </div>
      <div class="modal-body">
       <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color:orange">
            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-calendar" aria-hidden="true"></i></div>
           <input type="text" class="form-control" name="date1" id="date1" oninvalid="this.setCustomValidity('તારીખ પસંદ કરો')" max='<?=date("Y-m-d")?>'  required  onchange="try{setCustomValidity('')}catch(e){}"/>
          </div>
        </div>
      </div>     
    </div>

    <div class="modal-footer">
      <div class="row col-sm-12" align="center">
        <button  class="btn btn-info" name="s1" role="button">સેવ કરો</button>&nbsp;&nbsp;
        <a href="" class="btn btn-danger"  role="button" >રદ કરો</a>
      </div>
    </div>
  </div>
</form>
</div>
</div>
</center>
</body>
</html>
<?php
include 'footer.php';
?>