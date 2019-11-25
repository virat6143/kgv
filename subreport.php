<?php
include 'head.php';
?>
<html>
<head>
</head>
<body>
  <center>
   <div class="Container" style="width: 70%;">
     <center><b><h2 class="btn btn-success">ગ્રાહક રિપોર્ટ</h2></b></center>
     <div>
      <form method="POST" action= "s_report.php">
        <div class="modal-content">
          <div class="modal-header">   
            <h6 class="modal-title" style="font-size: 20px;"><i class="fa fa-calendar"  style="color: orange" aria-hidden="true"></i>  <b>તારીખ પસંદ કરો</b></h6>
          </div>
          <div class="modal-body">
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: black">
                <div class="input-group-addon" style="width: 5.9rem"><label for="attribute2" class="control-label"><b>શરૂઆત ની તારીખ</b></label></div>
                <input type="date" class="form-control" name="date1" id="date1" oninvalid="this.setCustomValidity('તારીખ પસંદ કરો')" max='<?=date("Y-m-d")?>'  required  onchange="try{setCustomValidity('')}catch(e){}" />
              </div>
            </div>
          </div> 

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: black">
                <div class="input-group-addon" style="width: 5.9rem"><label for="attribute2" class="control-label"><b>છેલ્લી તારીખ</b></label></div>
                <input type="date" class="form-control" name="date2" id="date2" oninvalid="this.setCustomValidity('તારીખ પસંદ કરો')" max='<?=date("Y-m-d")?>'  required  onchange="try{setCustomValidity('')}catch(e){}" /> 
              </div>
            </div>
          </div>              
       </div>

       <div class="modal-footer">
        <div class="row col-sm-12" align="center">
          <button  class="btn btn-info" name="s1" role="button">સેવ કરો</button>&nbsp;&nbsp;
          <a href="subreport.php" class="btn btn-danger"  role="button" >રદ કરો</a>
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