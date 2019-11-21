<?php

include 'connect.php';
include 'head.php';
$id=$_GET['id'];
$_SESSION['id']=$id;
$qry="select * from book where b_id='".$id."'";
$rs=mysqli_query($con,$qry);
$tt=mysqli_fetch_assoc($rs);
?>

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


        if($("#bname").length){
            control.makeTransliteratable(['bname']);
        }

    }
    google.setOnLoadCallback(onLoad);
</script>
<div class="container">
    <div class="jumbotron text-center" style="margin-bottom:0;background-color:aliceblue;">
        <form class="form-horizontal" role="form" method="POST" action="updatebook1.php">
            <div>
               <h4 class="text-center"><span class="badge badge-primary">બુકની માહિતી સુધારવા</span></h4>		
           </div>
           <br>
           <div class="row">
            <div class="col-md-3 field-label-responsive">  
              <b><label for="name" style="color:#ff8c66">બુક સ્ટોક જમા લીધેલ તારીખ</label> </b> 
          </div>
          <div class="col-md-6">
            <div class="form-group">

                <input type="date" name="date"  class="form-control" id="date"
                placeholder="બુક સ્ટોક જમા લીધેલ તારીખ" value='<?=$tt["date"] ?>' required autofocus>

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
          <b>  <label for="name" style="color: #ff8c66">બુકનું નામ નાખો</label> </b>
      </div>
      <div class="col-md-6">
        <div class="form-group">
         <input type="text"  name="bname" class="form-control" id="bname"
         placeholder="બુકનું નામ નાખો" value='<?=$tt["bname"] ?>'  required autofocus>
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
     <b> <label for="name" style="color:#ff8c66">પ્રકાશનનો સીરીયલ નંબર</label> </b>
 </div>
 <div class="col-md-6">
    <div class="form-group">

        <input type="text" name="bsr" class="form-control" id="bsr"
        placeholder="પ્રકાશનનો સીરીયલ નંબર" value='<?=$tt["bsr"] ?>' required autofocus>

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
        <b> <label for="name" style="color: #ff8c66">બુક ની સંખ્યા</label> </b>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="bno" class="form-control" id="bno"
            placeholder="બુક ની સંખ્યા" value='<?=$tt["bno"] ?>' required autofocus>
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
        <b> <label for="name" style="color: #ff8c66">એક બુકનો ભાવ નાખો</label>  </b>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="bbh" class="form-control" id="bbh"
            placeholder="એક બુકનો ભાવ નાખો" value='<?=$tt["bbh"] ?>' required autofocus>
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
        <b> <label for="name" style="color: #ff8c66">પ્રિન્ટિંગ કામગીરી કરાવેલ પાર્ટીનું નામ</label>  </b>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="printing" class="form-control" id="printing"
            placeholder="પ્રિન્ટિંગ કામગીરી કરાવેલ પાર્ટીનું નામ" value='<?=$tt["printing"] ?>' required autofocus>
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
    <b> <label for="name" style="color: #ff8c66">પ્રિન્ટિંગ તારીખ</label>  </b>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="date" name="p_date" class="form-control" id="p_date"
            placeholder="પ્રિન્ટિંગ તારીખ" value='<?=$tt["p_date"] ?>' required autofocus>
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
        <b> <label for="name" style="color: #ff8c66">પ્રિન્ટિંગમાં મુકેલ બુકની સંખ્યા</label>  </b>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="total_bookno" class="form-control" id="total_bookno"
            placeholder="પ્રિન્ટિંગમાં મુકેલ બુકની સંખ્યા" value='<?=$tt["total_bookno"] ?>' required autofocus>
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
        <b> <label for="name" style="color: #ff8c66">પ્રિન્ટિંગમાં  લાગેલ ખર્ચ</label>  </b>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="total_kharch" class="form-control" id="total_kharch"
            placeholder="પ્રિન્ટિંગમાં  લાગેલ ખર્ચ" value='<?=$tt["total_kharch"] ?>' required autofocus>
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
        <b><label for="name" style="color:#ff8c66">બુકનું સ્ટેટ્સ</label> </b>
    </div>
    <div class="col-md-6">
      <div class="form-group">
         <select class="form-control" id="bstatus" name="bstatus"  value='<?=$tt["bstatus"] ?>' style="color: red" required>
            <option value="">----પસંદ કરો----</option>
            <option value="1">હાજર</option>
            <option value="2">હાજર નથી</option>
        </select>
    </div>
</div>
</div>

<div class="modal-footer">
 <button type="submit" id="submit1" class="btn btn-success" >સેવ કરો</button>
 <button type="button" class="btn btn-danger" data-dismiss="modal">રદ્દ કરો</button>
</div>
</form>
</div>
</div>

<?php

include 'footer.php';

?>