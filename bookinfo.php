<?php
include 'connect.php';
include 'head.php';
?>


<link rel="stylesheet" href="clander/jquery.dataTables.min.css">
<script src="clander/jquery.dataTables.min.js"></script>

<style type="text/css">
	.my-custom-scrollbar {
		position: relative;
		height: 350px;
		overflow: auto;
	}
	.table-wrapper-scroll-y {
		display: block;
	}
</style>

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
		if($("#bnam1").length){
			control.makeTransliteratable(['bnam1']);
		}
		if($("#pri11").length){
			control.makeTransliteratable(['pri11']);
		}
		if($("#printing11").length){
			control.makeTransliteratable(['printing11']);
		}


		
		
		if($("#myInputTextField").length){
			control.makeTransliteratable(['myInputTextField']);
		}

	}
	google.setOnLoadCallback(onLoad);

</script>
<script type="text/javascript">

	$(document).ready(function() {
		oTable=$('#example').DataTable({

			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Gujarati.json",

			}
		});
		$('#myInputTextField').keyup(function(){
			oTable.search($(this).val()).draw() ;
		});
	} );
</script>

<style>
	.dataTables_filter { display: none; }
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<?php  
					if (isset($_GET["success"]))
						echo "<div class='alert alert-success alert-dismissible fade show'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>અભિનંદન!!! સફ્રતાપૂર્વક બુકની માહિતી નંખાઈ ગઈ છે.</strong> 
				</div>";
				if (isset($_GET["arr"]))
					echo "<div class='alert alert-success alert-dismissible fade show'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>અભિનંદન!!! સુધારો સફળતાપૂર્વક થઇ ગયો છે.</strong> 
			</div>";
				if (isset($_GET["delete"]))
					echo "<div class='alert alert-danger alert-dismissible fade show'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>સફ્રતાપૂર્વક બુકની માહિતી રદ્દ થઇ ગઈ છે.</strong> 
			</div>";
			?>

			<div class="div-action pull pull-left" style="padding-bottom:20px;">
				<h5 style="color: orange;"><B>બુકની માહિતી નાખવા</B></h5>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
					<i class="fa fa-plus"></i>  અહીં ક્લિક કરો
				</button>
			</div>
			<center>
				<a href="bookinfo.php">
					<h3><span class="badge badge-info">બુકની માહિતી જુઓ</h3>	
					<span class="glyphicon glyphicon-grain" aria-hidden="true"></span>
				</a>
			</center>
			<div class="a" style="text-align: right;">
				<b><label>શોધો:</label></b>
				<input type="text" id="myInputTextField">
			</div> 	
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-striped table-bordered" id="example">
					<thead style='background-color:#ff8000;color:#ffffff';>
						<tr>
							<th>ક્રમ</th>	
							<th>બુક સ્ટોક જમા લીધેલ તારીખ</th>						
							<th>બુકનું નામ</th>
							<th>પ્રકાશનનો સીરીયલ નંબર</th>
							<th>બુકની સંખ્યા</th>
							<th>એક બુકનો ભાવ</th>
							<th>પ્રિન્ટિંગ કરાવેલ પાર્ટીનું નામ</th>
							<th>પ્રિન્ટિંગ તારીખ</th>
							<th>પ્રિન્ટિંગમાં મુકેલ બુકની સંખ્યા</th>
							<th>પ્રિન્ટિંગમાં  લાગેલ ખર્ચ</th>							
							<th>બુકનું સ્ટેટ્સ</th> 
							<th>સુધારો કરો</th>
							<th>રદ્દ કરો</th>

						</tr>
					</thead>

					<?php
					$qry="select * from book where status=0";
					$rs=mysqli_query($con,$qry);
					$count=1;
					while($data=mysqli_fetch_assoc($rs))
					{
						echo "<tr>";
						echo "<td><label>";
						echo $count;
						echo "</label></td>";
						echo "<td><label id='dtt".$data["b_id"]."'>";
						echo $data["date"];
						echo "</label></td>";
						echo "<td><label id='bnam".$data["b_id"]."'>";
						echo $data["bname"];
						echo "</label></td>";
						echo "<td><label id='bsrr".$data["b_id"]."'>";
						echo $data["bsr"];
						echo "</label></td>";
						echo "<td><label id='bnoo".$data["b_id"]."'>";
						echo $data["bno"];
						echo "</label></td>";
						echo "<td><label id='bbhh".$data["b_id"]."'>";
						echo $data["bbh"];
						echo "</label></td>";
						echo "<td><label id='pri1".$data["b_id"]."'>";
						echo $data["printing"];
						echo "</label></td>";
						echo "<td><label id='pdtt".$data["b_id"]."'>";
						echo $data["p_date"];
						echo "</label></td>";
						echo "<td><label id='tbkno".$data["b_id"]."'>";
						echo $data["total_bookno"];
						echo "</label></td>";
						echo "<td><label id='tottkh".$data["b_id"]."'>";
						echo $data["total_kharch"];
						echo "</label></td>";
						echo "<td><label id='bstt".$data["b_id"]."'>";
						if($data["bstatus"]==1)
						{
							echo "હાજર"	;
						}
						else
						{
							echo "હાજર નથી";
						}
						echo "</label></td>";
						echo "<input type='hidden' value='".$data["bstatus"]."'  id='stat".$data["b_id"]."' >";
						
						echo "<td><a class='virat' href='#' title='View' data-target='#myModal2' data-toggle='modal' data11='".$data["b_id"]."' id='".$data["b_id"]."'><i class='fas fa-edit' style='font-size:40px;'></i></a></td>";

						echo "<td><a href='deletbook.php?id=".$data["b_id"]."' onclick='return check();' style='font-size:40px;color:red'><i class='fa fa-trash'></i></a></td>";

						echo "</tr>";		
						$count++;
					}
					?>
				</table>
			</div>
		</div> 
	</div> 		
</div> 
</div>

<div class="modal fade" id="myModal2">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="POST" action="updatebook1.php" >
				<div class="modal-header">
					<h4 class="modal-title"><span class="badge badge-primary">બુકની માહિતીમાં સુધારો કરો</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group" style="color: #ff8000">

						<input id="vcc" type="hidden" name="vcc"  class="form-control"/>
						<b><label for="dt" style="color: #ff8000">બુક સ્ટોક જમા લીધેલ તારીખ:</label></b>
						<input type="text" id="dtt1" name="date" readonly="true" class="form-control" placeholder="તારીખ પસંદ કરો"   oninvalid="this.setCustomValidity('તારીખ પસંદ કરો')"  value="<?php echo date("d/m/Y") ?>"  required onchange="try{setCustomValidity('')}catch(e){}" />
					</div>
					<div class="form-group">
						<b><label for="bname1" style="color: #ff8000">બુકનું નામ નાખો:</label></b>
						<input type="text" id="bnam1" name="bname" id="bname" class="form-control" placeholder="બુકનું નામ નાખો" oninvalid="this.setCustomValidity('બુકનું નામ આપો')" required onchange="try{setCustomValidity('')}catch(e){}" onkeypress="return onKeyValidate(event,alpha);" />
					</div>
					<div class="form-group">
						<b><label for="bpsr" style="color: #ff8000">પ્રકાશનનો સીરીયલ નંબર:</label></b>
						<input type="text" id="bsrr1" name="bsr" class="form-control" placeholder="પ્રકાશનનો સીરીયલ નંબર નાખો"  oninvalid="this.setCustomValidity('પ્રકાશનનો સીરીયલ નંબર આપો')" required onchange="try{setCustomValidity('')}catch(e){}"  />
					</div>
					<div class="form-group">
						<b><label for="bno1" style="color: #ff8000">બુક ની સંખ્યા:</label></b>
						<input type="text" id="bnoo1" name="bno"  class="form-control" placeholder="બુક ની સંખ્યા નાખો" oninvalid="setCustomValidity('બુક ની સંખ્યા નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress='validate(event)' />
					</div>
					<div class="form-group">
						<b><label for="bb" style="color: #ff8000">એક બુકનો ભાવ નાખો:</label></b>
						<input type="text" id="bbhh1" name="bbh" class="form-control" placeholder="બુકનો ભાવ નાખો"  oninvalid="this.setCustomValidity('એક બુકનો ભાવ નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}"onkeypress='validate(event)' />
					</div>
					
					<div class="form-group">
						<b><label for="print" style="color: #ff8000">પ્રિન્ટિંગ કામગીરી કરાવેલ પાર્ટીનું નામ:</label></b>
						<input type="text" id="pri11" name="printing" class="form-control" placeholder="પ્રિન્ટિંગ કામગીરી કરાવેલ પાર્ટીનું નામ નાખો"  oninvalid="this.setCustomValidity('પ્રિન્ટિંગ કામગીરી કરાવેલ પાર્ટીનું નામ નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress="return onKeyValidate(event,alpha);" />
					</div>
					<div class="form-group">
						<b><label for="bb"  style="color: #ff8000">પ્રિન્ટિંગ તારીખ:</label></b>
						<input type="date" id="pdtt1" name="p_date" class="form-control" placeholder="પ્રિન્ટિંગ ની તારીખ"  oninvalid="this.setCustomValidity('પ્રિન્ટિંગ ની તારીખ ')" max='<?=date("Y-m-d")?>'  required  onchange="try{setCustomValidity('')}catch(e){}" />
					</div>
					<div class="form-group">
						<b><label for="bb" style="color: #ff8000">પ્રિન્ટિંગમાં મુકેલ બુકની સંખ્યા:</label></b>
						<input type="text" id="tbkno1" name="total_bookno" class="form-control" placeholder="પ્રિન્ટિંગ માં મુકેલ બુક ની સંખ્યા"  oninvalid="this.setCustomValidity('પ્રિન્ટિંગ માં મુકેલ બુક ની સંખ્યા')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress='validate(event)'/>
					</div>
					<div class="form-group">
						<b><label for="bb" style="color: #ff8000">પ્રિન્ટિંગમાં  લાગેલ ખર્ચ:</label></b>
						<input type="text" id="tottkh1" name="total_kharch" class="form-control" placeholder="પ્રિન્ટિંગમાં  લાગેલ ખર્ચ"  oninvalid="this.setCustomValidity('પ્રિન્ટિંગમાં  લાગેલ ખર્ચ')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress='validate(event)' />
					</div>
					<div class="form-group">
						<b><label for="stt"  style="color: #ff8000">બુક નું સ્ટેટ્સ:</label></b>
						<select class="form-control" id="bstt1" name="bstatus" style="color: red"   oninvalid="this.setCustomValidity('પસંદ કરો')" required  onchange="try{setCustomValidity('')}catch(e){}"  />
						<option selected>----પસંદ કરો----</option>
						<option value="1">હાજર</option>
						<option value="0">હાજર નથી</option>
					</select>
				</div>
				<div class="modal-footer">
					<input type="submit"  name="સેવ કરો" value="સેવ કરો" class="btn btn-success" />
				</div>
			</form>
		</div>
	</div>
</div>
</div>


<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="POST" action="bookinfo1.php" id="bookinfo">
				<div class="modal-header">
					<h4 class="modal-title"><span class="badge badge-primary">બુકની માહિતી નાખો</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group" style="color: #ff8000">
						<b><label for="dt" style="color: #ff8000">બુક સ્ટોક જમા લીધેલ તારીખ:</label></b>
						<input type="text" name="date" readonly="true" class="form-control" placeholder="તારીખ પસંદ કરો"   oninvalid="this.setCustomValidity('તારીખ પસંદ કરો')"  value="<?php echo date("d/m/Y") ?>"  required onchange="try{setCustomValidity('')}catch(e){}" />
					</div>
					<div class="form-group">
						<b><label for="bname1" style="color: #ff8000">બુકનું નામ નાખો:</label></b>
						<input type="text" name="bname" id="bname" class="form-control" placeholder="બુકનું નામ નાખો" oninvalid="this.setCustomValidity('બુકનું નામ આપો')" required onchange="try{setCustomValidity('')}catch(e){}" onkeypress="return onKeyValidate(event,alpha);" />
					</div>
					<div class="form-group">
						<b><label for="bpsr" style="color: #ff8000">પ્રકાશનનો સીરીયલ નંબર:</label></b>
						<input type="text" name="bsr" class="form-control" placeholder="પ્રકાશનનો સીરીયલ નંબર નાખો"  oninvalid="this.setCustomValidity('પ્રકાશનનો સીરીયલ નંબર આપો')" required onchange="try{setCustomValidity('')}catch(e){}"  />
					</div>
					<div class="form-group">
						<b><label for="bno1" style="color: #ff8000">બુક ની સંખ્યા:</label></b>
						<input type="text" name="bno"  class="form-control" placeholder="બુક ની સંખ્યા નાખો" oninvalid="setCustomValidity('બુક ની સંખ્યા નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress='validate(event)'  />
					</div>
					<div class="form-group">
						<b><label for="bb" style="color: #ff8000">એક બુકનો ભાવ નાખો:</label></b>
						<input type="text" name="bbh" class="form-control" placeholder="બુકનો ભાવ નાખો"  oninvalid="this.setCustomValidity('એક બુકનો ભાવ નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress='validate(event)'/>
					</div>
					
					<div class="form-group">
						<b><label for="stt" style="color: #ff8000">બુક નું સ્ટેટ્સ:</label></b>
						<select class="form-control"  name="bstatus" style="color: red"   oninvalid="this.setCustomValidity('પસંદ કરો')" required  onchange="try{setCustomValidity('')}catch(e){}"  />
						<option value="">----પસંદ કરો----</option>
						<option value="1">હાજર</option>
						<option value="0">હાજર નથી</option>
					</select>
				</div>
				<div class="form-group">
					<b><label for="print" style="color: #ff8000">પ્રિન્ટિંગ કામગીરી કરાવેલ પાર્ટીનું નામ:</label></b>
					<input type="text" name="printing" id="printing11" class="form-control" placeholder="પ્રિન્ટિંગ કામગીરી કરાવેલ પાર્ટીનું નામ નાખો"  oninvalid="this.setCustomValidity('પ્રિન્ટિંગ કામગીરી કરાવેલ પાર્ટીનું નામ નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress="return onKeyValidate(event,alpha);" />
				</div>
				<div class="form-group">
					<b><label for="bb" style="color: #ff8000">પ્રિન્ટિંગ તારીખ:</label></b>
					<input type="date" name="p_date" class="form-control" placeholder="પ્રિન્ટિંગ ની તારીખ"  oninvalid="this.setCustomValidity('પ્રિન્ટિંગ ની તારીખ ')" max='<?=date("Y-m-d")?>'  required  onchange="try{setCustomValidity('')}catch(e){}" />
				</div>
				<div class="form-group">
					<b><label for="bb" style="color: #ff8000">પ્રિન્ટિંગમાં મુકેલ બુકની સંખ્યા:</label></b>
					<input type="text" name="total_bookno" class="form-control" placeholder="પ્રિન્ટિંગ માં મુકેલ બુક ની સંખ્યા"  oninvalid="this.setCustomValidity('પ્રિન્ટિંગ માં મુકેલ બુક ની સંખ્યા')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress='validate(event)' />
				</div>
				<div class="form-group">
					<b><label for="bb" style="color: #ff8000">પ્રિન્ટિંગમાં  લાગેલ ખર્ચ:</label></b>
					<input type="text" name="total_kharch" class="form-control" placeholder="પ્રિન્ટિંગમાં  લાગેલ ખર્ચ"  oninvalid="this.setCustomValidity('પ્રિન્ટિંગમાં  લાગેલ ખર્ચ')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress='validate(event)'/>
				</div>
				<div class="modal-footer">
					<input type="submit"  name="સેવ કરો" value="સેવ કરો" class="btn btn-success" />
					<button type="button" class="btn btn-danger" id="cancle">રદ્દ કરો</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.virat').click(function(){

			var id=$(this).attr("data11");

			var dtt=$('#dtt'+id).text();
			var bnam=$('#bnam'+id).text();
			var bsrr=$('#bsrr'+id).text();
			var bnoo=$('#bnoo'+id).text();
			var bbhh=$('#bbhh'+id).text();
			var pri1=$('#pri1'+id).text();
			var pdtt=$('#pdtt'+id).text();
			var tbkno=$('#tbkno'+id).text();
			var tottkh=$('#tottkh'+id).text();
			var bstt=$('#stat'+id).val();
			$('#bstt1').val(bstt).attr('selected','selected');
			
			$('#dtt1').val(dtt);
			$('#bnam1').val(bnam);
			$('#bsrr1').val(bsrr);
			$('#bnoo1').val(bnoo);
			$('#bbhh1').val(bbhh);
			$('#pri11').val(pri1);
			$('#pdtt1').val(pdtt);
			$('#tbkno1').val(tbkno);
			$('#tottkh1').val(tottkh);
			
			$('#vcc').val(id);
		});
	});

	$(document).ready(function(){
		$("#cancle").click(function(){
			$("#bookinfo")[0].reset();
		});});

	</script>
	<script type="text/JavaScript">
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
		function validate(evt) {
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
		function check()
		{
			return confirm("શું તમને ખાતરી છે?");
		}
	</script>

	<?php
	include 'footer.php';
	?>