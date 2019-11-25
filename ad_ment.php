<?php
include 'connect.php';
include 'head.php';

?>

<style>
	.ui-datepicker-calendar {
		display: none;
	}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

	/*$(function () {
		$('#txtFDt').datepicker({
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			dateFormat: 'MM yy',
			onClose: function(dateText, inst) { 
				$(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
			}
		});
	});

	$(function () {
		$('#fdt').datepicker({
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			dateFormat: 'MM yy',
			onClose: function(dateText, inst) { 
				$(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
			}
		});
	});*/

	
	function validate1(evt) {
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
</script>
<link rel="stylesheet" href="clander/jquery.dataTables.min.css">
<script src="clander/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
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


		if($("#pname").length){
			control.makeTransliteratable(['pname']);
		}
		if($("#adinfo").length){
			control.makeTransliteratable(['adinfo']);
		}
		
		if($("#pnm").length){
			control.makeTransliteratable(['pnm']);
		}
		if($("#inf").length){
			control.makeTransliteratable(['inf']);
		}
		
		if($("#myInputTextField").length){
			control.makeTransliteratable(['myInputTextField']);
		}

	}
	google.setOnLoadCallback(onLoad);

</script>
<script type="text/javascript">

	$(document).ready(function() {
		oTable1=$('#example1').DataTable({

			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Gujarati.json",

			}
		});
		$('#myInputTextField').keyup(function(){
			oTable1.search($(this).val()).draw() ;
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
					<strong>અભિનંદન!!! સફ્રતાપૂર્વક માહિતી નંખાઈ ગઈ છે</strong> 
				</div>";
				if (isset($_GET["arr"]))
					echo "<div class='alert alert-success alert-dismissible fade show'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>અભિનંદન!!! સુધારો સફળતાપૂર્વક થઇ ગયો છે</strong> 
			</div>";
			if (isset($_GET["delete"]))
				echo "<div class='alert alert-danger alert-dismissible fade show'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<strong>સફ્રતાપૂર્વક માહિતી રદ્દ થઇ ગઈ છે.</strong> 
		</div>";

		?>

		<div class="div-action pull pull-left" style="padding-bottom:20px;">
			<h5 style="color: orange;"><b>જાહેરાત આપનાર અંગેની માહિતી નાખવા</b></h5>
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
				<i class="fa fa-plus"></i>	અહીં ક્લિક કરો
			</button>
		</div>
		<div class="alert">
			<body>
				<center><h3><span class="badge badge-success">જાહેરાત અંગેની માહિતી જુઓ</span></h3></center>
			</body>
			
			<div class="float-right" >
				<b><label >શોધો : </label></b>
				<input type="text" id="myInputTextField" class="form-control float-right">
			</div> 	
		</div>
		<table class="table table-striped table-bordered" id="example1">
			<thead style='background-color:#00bfff;color:#ffffff';>
				<tr>
					<th>ક્રમ</th>	
					<th>પ્રકાશિત થયેલ લેખની તારીખ</th>						
					<th>કેશ મેમો પાવતી નંબર</th>
					<th>જાહેરાત આપનાર પાર્ટીનું નામ</th>
					<th>જાહેરાત ની વિગત</th>
					<th>જાહેરાત અંગેનો કુલ ખર્ચ</th>
					<th>સુધારો કરો</th>
					<th>રદ્દ કરો</th>

				</tr>
			</thead>

			<?php
			$qry="select * from adversitment";
			$rs=mysqli_query($con,$qry);
			$count=1;
			while($data111=mysqli_fetch_assoc($rs))
			{
				echo "<tr>";
				echo "<td><label>";
				echo $count;
				echo "</label></td>";
				echo "<td><label id='FDT".$data111["a_id"]."'>";
				echo $data111["txtFDt"];
				echo "</label></td>";
				echo "<td><label id='cash".$data111["a_id"]."'>";
				echo $data111["cashad"];
				echo "</label></td>";
				echo "<td><label id='pname".$data111["a_id"]."'>";
				echo $data111["pname"];
				echo "</label></td>";
				echo "<td><label id='adinfo".$data111["a_id"]."'>";
				echo $data111["adinfo"];
				echo "</label></td>";
				echo "<td><label id='adprice".$data111["a_id"]."'>";
				echo $data111["adprice"];
				echo "</label></td>";

				echo "<td><a class='bc' href='#' title='View' data-target='#myModal1' data-toggle='modal' data1='".$data111["a_id"]."' id='".$data111["a_id"]."'><i class='fas fa-edit' style='font-size:40px;'></i></a></td>";

				echo "<td><a href='ad_delet.php?id=".$data111["a_id"]."' onclick='return check();' style='font-size:40px;color:red'><i class='fa fa-trash'></i></a></td>";


				echo "</tr>";	
				$count++;
			}
			?>
		</table>
	</div>
</div> 
</div> 		
</div> 

<div class="container">
	<div class="modal fade" id="myModal1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form method="POST"  action="ad_ment1.php" >
					<div class="modal-header">
						<h4 class="modal-title"><span class="badge badge-primary">જાહેરાત અંગેની માહિતીમાં સુધારો કરો</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<body>

								<input id="editid" type="hidden" name="cashaaad"  class="form-control" value='<?=$ttv["cashaaad"] ?>' placeholder="કેશ મેમો પાવતી નંબર" oninvalid="this.setCustomValidity('કેશ મેમો પાવતી નંબર નાખો')" required onchange="try{setCustomValidity('')}catch(e){}" />


								<b><label for="dttt" style="color: #ff8000">પ્રકાશિત થયેલ લેખની તારીખ:</label></b>
								<input type="date" id="fdt" name="txtFDt" class="form-control date-picker"  placeholder="પ્રકાશિત થયેલ લેખનો મહિનો અને વર્ષ પસંદ કરો" max='<?=date("Y-m-d")?>' oninvalid="setCustomValidity('પ્રકાશિત થયેલ લેખની તારીખ પસંદ કરો')"  onchange="try{setCustomValidity('')}catch(e){}"/>
							</body>
						</div>
						<div class="form-group">
							<b><label for="cashad1" style="color: #ff8000">કેશ મેમો પાવતી નંબર:</label></b>
							<input id="cash3" type="text" name="cashad"  class="form-control"  placeholder="કેશ મેમો પાવતી નંબર" oninvalid="this.setCustomValidity('કેશ મેમો પાવતી નંબર નાખો')" required onchange="try{setCustomValidity('')}catch(e){}" />
						</div>
						<div class="form-group">
							<b><label for="pnm1" style="color: #ff8000">જાહેરાત આપનાર પાર્ટીનું નામ:</label></b>
							<input type="text" id="pnm" name="pname" id="pname"  class="form-control" placeholder="જાહેરાત આપનાર પાર્ટીનું નામ" oninvalid="this.setCustomValidity('જાહેરાત આપનાર પાર્ટીનું નામ નાખો')" required onchange="try{setCustomValidity('')}catch(e){}" onkeypress="return onKeyValidate(event,alpha);" />
						</div>
						<div class="form-group">
							<b><label for="advigat1"  style="color: #ff8000">જાહેરાત ની વિગત:</label></b>
							<textarea id="inf" class="form-control" name="adinfo" id="adinfo"  placeholder="જાહેરાત ની વિગત"  rows="4" oninvalid="setCustomValidity('જાહેરાત ની વિગત નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" /></textarea>
						</div>

						<div class="form-group">
							<b><label for="adprice1" style="color: #ff8000">જાહેરાત અંગેનો કુલ ખર્ચ:</label></b>
							<input type="text" id="prc"  name="adprice"  class="form-control" placeholder="જાહેરાત અંગે નો કુલ ખર્ચ" oninvalid="setCustomValidity('જાહેરાત અંગે નો કુલ ખર્ચ નાખો')" required  onchange="try{setCustomValidity('')}catch(e){}" onkeypress='validate1(event)' />
						</div>


						<div class="modal-footer">
							<input type="submit"  name="સેવ કરો" value="સેવ કરો" class="btn btn-success" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="POST" action="ad1_ment.php" id="adment" onsubmit="return checkForm(this);">
				<div class="modal-header">
					<h4 class="modal-title"><span class="badge badge-primary">જાહેરાત અંગેની માહિતીનું પત્રક</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<body>
							<b><label for="dttt" style="color: #ff8000">પ્રકાશિત થયેલ લેખની તારીખ:</label></b>
							<input type="DATE" id="txtFDt" name="txtFDt" class="form-control date-picker" placeholder="પ્રકાશિત થયેલ લેખનો મહિનો અને વર્ષ પસંદ કરો" max='<?=date("Y-m-d")?>'/>
						</body>
					</div>
					<div class="form-group">
						<b><label for="cashad1" style="color: #ff8000">કેશ મેમો પાવતી નંબર:</label></b>
						<input type="text" name="cashad"  class="form-control" placeholder="કેશ મેમો પાવતી નંબર"/>
					</div>
					<div class="form-group">
						<b><label for="pnm1" style="color: #ff8000">જાહેરાત આપનાર પાર્ટીનું નામ:</label></b>
						<input type="text" name="pname" id="pname"  class="form-control" placeholder="જાહેરાત આપનાર પાર્ટીનું નામ" onkeypress="return onKeyValidate(event,alpha);"/>
					</div>
					<div class="form-group">
						<b><label for="advigat1" style="color: #ff8000">જાહેરાત ની વિગત:</label></b>
						<textarea class="form-control" name="adinfo" id="adinfo" placeholder="જાહેરાત ની વિગત"  rows="4"/></textarea>
					</div>
					
					<div class="form-group">
						<b><label for="adprice1" style="color: #ff8000">જાહેરાત અંગેનો કુલ ખર્ચ:</label></b>
						<input type="text" name="adprice"  class="form-control" placeholder="જાહેરાત અંગે નો કુલ ખર્ચ" onkeypress='validate1(event)' />
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
		$('.bc').click(function(){

			var id=$(this).attr("data1");

			var FDT=$('#FDT'+id).text();
			var cash=$('#cash'+id).text();
			var pname=$('#pname'+id).text();
			var adinfo=$('#adinfo'+id).text();
			var adprice=$('#adprice'+id).text();
			$('#fdt').val(FDT);
			$('#cash3').val(cash);
			$('#pnm').val(pname);
			$('#inf').val(adinfo);
			$('#prc').val(adprice);
			$('#editid').val(id);
		});
	});

	$(document).ready(function(){
		$("#cancle").click(function(){
			$("#adment")[0].reset();
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

		function check()
		{
			return confirm("શું તમને ખાતરી છે?");
		}



		function checkForm(form)
		{

			if(form.txtFDt.value == "") {
				alert("પ્રકાશિત થયેલ લેખની તારીખ પસંદ કરો!");
				form.txtFDt.focus();
				return false;
			}

			if(form.cashad.value == "") {
				alert("કેશ મેમો પાવતી નંબર નાખો!");
				form.cashad.focus();
				return false;
			}
			if(form.pname.value == "") {
				alert("જાહેરાત આપનાર પાર્ટીનું નામ નાખો!");
				form.pname.focus();
				return false;
			}
			if(form.adinfo.value == "") {
				alert("જાહેરાત ની વિગત નાખો!");
				form.adinfo.focus();
				return false;
			}
			if(form.adprice.value == "") {
				alert("જાહેરાત અંગેનો કુલ ખર્ચ નાખો!");
				form.adprice.focus();
				return false;
			}

			return true;
		}

	</script>

	<?php
	include 'footer.php';
	?>