<?php
include 'head.php';
?>
<html>
<head>
</head>
<body>
  <center>
    <div class="Container" style="width: 70%;">
     <center><b><h2 class="btn btn-success">બુક વેચાણ રિપોર્ટ</h2></b></center>
     <div>
      <form method="POST" action= "sale_report.php">
        <div class="modal-content">
          <div class="modal-header">   
          <h6 class="modal-title" style="font-size: 20px;"><i class="fa fa-calendar"  style="color: #a5d6a7" aria-hidden="true"></i>  <b>તારીખ પસંદ કરો</b></h6>
          </div>
          <div class="modal-body">

            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
                  <div class="input-group-addon" style="width: 5.8rem"><label for="attribute2" class="control-label">શરૂઆત ની તારીખ</label></div>
                  <input type="date" class="form-control" name="date1" id="date1" oninvalid="this.setCustomValidity('તારીખ પસંદ કરો')" max='<?=date("Y-m-d")?>'  required  onchange="try{setCustomValidity('')}catch(e){}" />
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: orange">
                  <div class="input-group-addon" style="width: 5.8rem"><label for="attribute2" class="control-label">છેલ્લી તારીખ</label></div>
                  <input type="date" class="form-control" name="date2" id="date2" oninvalid="this.setCustomValidity('તારીખ પસંદ કરો')" max='<?=date("Y-m-d")?>'  required  onchange="try{setCustomValidity('')}catch(e){}" /> 
                </div>
              </div>
            </div>           
          </div>

          <div class="modal-footer">
            <div class="row col-sm-12" align="center">
              <button  class="btn btn-info" name="submit" role="button">સબમિટ કરો</button>&nbsp;&nbsp;
              <a href="" class="btn btn-danger" role="button" >રદ કરો</a>
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