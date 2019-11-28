<?php
include 'connect.php';
include 'head.php';

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">


	function change_district()
	{
		var id =$('#districtID').val();


		var request = $.ajax({
			url: "disajax.php",
			type: "GET",
			data: {district : id},
			dataType: "html"
		});

		request.done(function(msg) {
			$("#talukaID").html("");
			$("#talukaID").html(msg);        
		});

		request.fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		});
	}



	function change_village()
	{
		var tid =$('#talukaID').val();
		var did =$('#districtID').val();


		var request = $.ajax({
			url: "talukaajax.php",
			type: "GET",
			data: {taluka : tid,district:did},
			dataType: "html"
		});

		request.done(function(msg) {
			$("#villageID").html("");
			$("#villageID").html(msg);        
		});

		request.fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		});
	}


	function change_bname()
	{
		var bid =$('#b_id').val();
		$.ajax({
			type: "GET",
			url: 'BookPriceAjax.php',
			data: {bookid : bid},
			success: function(data){
				var result=data.split('|');
				$("#price").val(result[0]);
				$("#stock").val(result[1]);	
			}
		});
	}
	$(document).on('change', '.bname', function(){
		var bid1 =$(this).val();
		var dataId =$(this).attr("data-id");
		$.ajax({
			type: "GET",
			url: 'b1.php',
			data: {bookid1 : bid1},
			success: function(data){
				var result=data.split('|');
				$("#price"+dataId).val(result[0]);	
				$("#stock"+dataId).val(result[1]);	
			}
		});
	});
	function change_bname1()
	{
		var bid1 =$('#b_id').val();

	}
	function block(x)

	{

		if(x==1)
		{

			document.getElementById('vk').style.display='block';
			document.getElementById('vkc').style.display='block';
			document.getElementById('vkcc').style.display='block';
			document.getElementById('vkcv').style.display='block';
			//document.getElementById('price').style.display='block';
			document.getElementById('postal_charge').style.display='block';
			document.getElementById('total_amount').style.display='block';
			//document.getElementById('addrow').style.display='block';

		}
		if(x==2)
		{

			document.getElementById('vk').style.display='block';
			document.getElementById('vkc').style.display='block';
			document.getElementById('vkcc').style.display='block';
			document.getElementById('vkcv').style.display='block';
			document.getElementById('postal_charge').style.display='block';
			document.getElementById('total_amount').style.display='block';
			//document.getElementById('price').style.display='block';

		}
		if(x==3)
		{

			document.getElementById('vk').style.display='none';
			document.getElementById('vkc').style.display='none';
			document.getElementById('vkcc').style.display='none';
			document.getElementById('vkcv').style.display='none';
			document.getElementById('postal_charge').style.display='none';
			document.getElementById('total_amount').style.display='none';
			//document.getElementById('price').style.display='none';
			

		}


	}
</script>
<?php

function fill_book($con)
{
	$output = '';
	$sql = "SELECT * FROM book";
	$rs=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($rs)) 
	{
		$output .= '<option value="'.$row["b_id"].'">'.$row["bname"].'</option>';
	}
	return $output;

}



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


		if($("#cust_name").length){
			control.makeTransliteratable(['cust_name']);
		}
		if($("#cust_addr").length){
			control.makeTransliteratable(['cust_addr']);
		}
		if($("#cust_village").length){
			control.makeTransliteratable(['cust_village']);
		}
	}
	google.setOnLoadCallback(onLoad);
</script>
<div class="order-form">
	<form action="order1.php" method="POST" id="placeorderreg" onsubmit="return checkForm(this);"> 
		<h4 class="text-center"><span class="badge badge-success">બુકના વેચાણ માટેનું પત્રક</span></h4>		
		<?php  
		if (isset($_GET["success"]))
			echo "<div class='alert alert-success alert-dismissible fade show'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>સફ્રતાપૂર્વક માહિતી સેવ થઇ ગઈ છે.</strong> 
	</div>";
	?>
	<div class="form-group">
		<b><label for="odate" style="color:orange" class="col-sm-2 control-label">ઓર્ડરની તારીખ</label></b>
		<div class="col-sm-12">
			<body >
				<input type="date" class="form-control"  name="r_date" max='<?=date("Y-m-d")?>'  value="<?php echo date("d/m/Y") ?>" />
			</body>
		</div>
	</div>
	<div class="form-group">
		<b><label for="mtype" style="color:orange" class="col-sm-2 control-label">મેમો ટાઇપ</label>
		</b>
		<div class="col-sm-12">

			<input type="radio" name="memo_type" id="memo_type" onclick="block(1)" value="Cash" style="width: 15px;height: 15px;"> Cash &nbsp;
			<input type="radio" name="memo_type" id="memo_type" onclick="block(2)" value="Credit" style="width: 15px;height: 15px;"> Credit &nbsp;
			<input type="radio" name="memo_type" id="memo_type" onclick="block(3)" value="Gift" style="width: 15px;height: 15px;"> Gift &nbsp;
			
		</div>
	</div>
	<div class="form-group" id="vk" style="display: block;">
		<b><label for="mno"  style="color:orange" class="col-sm-3">મેમો નંબર</label></b>
		<div class="col-sm-12">
			<input type="text" class="form-control"  id="memo_no" name="memo_no" placeholder="મેમો નંબર" autocomplete="off" />
		</div>
	</div>
	<div class="form-group">
		<b> <label for="Name"  style="color:orange" class="col-sm-2 control-label">લેનારનું નામ</label></b>
		<div class="col-sm-12">
			<input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="લેનારનું નામ" onkeypress="return onKeyValidate(event,alpha);"  autocomplete="off" />
		</div>
	</div>
	<div class="form-group" id="vkc" style="display: block;">
		<b> <label for="district"  style="color:orange" class="col-sm-2 control-label">જિલ્લો</label></b>
		<div class="col-sm-12">
			<select class="form-control" id="districtID" name="cust_dist" onchange="change_district()">
				<option value="">જિલ્લો પસંદ કરો</option>
				<?php
				include("connect.php");
				$qry="select * from district;";
				$rc=mysqli_query($con,$qry);
				while($data=mysqli_fetch_assoc($rc))
				{

					echo "<option value='".$data["d_id"]."'>".$data["district_name"]."</option>";

				}

				?>
			</select>
		</div>
	</div>
	<div class="form-group" id="vkcc" style="display: block;">
		<b> <label for="taluka"  style="color:orange" class="col-sm-2 control-label">તાલુકો</label></b>
		<div class="col-sm-12">
			<select class="form-control" id="talukaID" name="cust_tal" onchange="change_village()">
				<option value="">તાલુકો પસંદ કરો</option>
			</select>
		</div>
	</div>
	<div class="form-group" id="vkcv" style="display: block;">
		<b> <label for="village" style="color:orange" class="col-sm-2 control-label">ગામનું નામ</label></b>
		<div class="col-sm-12">
			<input type="text" class="form-control" id="cust_village" name="cust_village" placeholder="લેનારનું ગામનું નામ" autocomplete="off"  onkeypress="return onKeyValidate(event,alpha);" />
		</div>
	</div>
	<div class="form-group">
		<b> <label for="addr" style="color:orange" class="col-sm-2 control-label">લેનારનું સરનામું</label></b>
		<div class="col-sm-12">
			<textarea class="form-control" id="cust_addr" name="cust_addr" placeholder="લેનારનું સરનામું" rows="4" autocomplete="off" /></textarea>
			
		</div>
	</div>
	<div class="form-group">
		<b> <label for="Contact" style="color:orange" class="col-sm-3 control-label">લેનારનો મોબાઈલ નંબર</label></b>
		<div class="col-sm-12">
			<input type="text" class="form-control" id="cust_mob" name="cust_mob" maxlength="10" placeholder="લેનારનો મોબાઈલ નંબર" autocomplete="off" onchange="placeordermob()" onkeypress='validateplace(event)' />
		</div>
	</div> 

	<table id="myTable" class=" table order-list">
		<thead style='color:#ffffff';>
			<tr>			  			
				<th style="width:40%;color:orange">બુક</th>
				<th style="width:10%;color:orange">ભાવ</th>
				<th style="width:15%;color:orange">હાજર બુકની સંખ્યા</th>
				<th style="width:20%;color:orange">બુકની સંખ્યા</th>	
				<th style="width:10%;color:orange">પોસ્ટલ ચાર્જ</th>			  			
				<th style="width:20%;color:orange">ટોટલ ભાવ(રૂપિયા)</th>	

			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10" style="text-align: right;">
					<input type="button" style="width:20%;height: 30%;" class="btn btn-success add" id="addrow" value="બુક લેવા માટે અહીં ક્લિક કરો" style="display: block;" />
				</td>
			</tr>
			<tr>
			</tr>
		</tfoot>
	</table>
	<div class="form-group row col-sm-12">
		<div class="col-sm-4">
			<b> <label for="addr" style="color:orange" class="col-sm-7 control-label">ટોટલ રકમ(રૂપિયા)</label></b>
			<input type="text" class="form-control" id="total_amount" style="display: block;" readonly="true" name="total_amount" />
		</div>
	</div>
	<div class="row" align="center">
		<div class="form-group row col-sm-12">
			<button type="submit" id="submit"  class="btn btn-success col-sm-6">સેવ કરો</button>
			<button type="cancle" id="cancle" class="btn btn-danger col-sm-6">રદ્દ કરો</button>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<a href="Triplicate.php" class="btn btn-primary" role="button1" target="_blank">Triplicate Copy</a>&nbsp;
			<a href="original.php" class="btn btn-primary" role="button2" target="_blank">Original Copy</a>&nbsp;
			<a href="duplicate.php" class="btn btn-primary" role="button3" target="_blank">Duplicate Copy</a>&nbsp;
		</div>
	</div>
</form>
</div>
<script type="text/javascript">
	var counter = 2
	;
	var tot=0;

	$(document).ready(function () {
		

		$("#addrow").on("click", function (e) {
			console.log(e);
			var newRow = $("<tr>");
			var cols = "";

			cols +='<td><select class="form-control bname" data-id="' + counter + '"   id="b_id" name="bname[]" onchange="change_bname1()"><option value="">-------------પસંદ કરો બુક--------------</option><?php echo fill_book($con); ?></select> </td>';
			cols += '<td><input type="text" readonly class="form-control price" id="price'+counter +'" name="price[]"/></td>';
			cols += '<td><input type="text" readonly class="form-control stock" id="stock' +counter +'" name="stock[]"/></td>';
			cols += '<td><input type="number" min="1" class="form-control cal"'+counter+'"  id="book_qut'+counter+'"  name="book_qut[]' + counter + '" onchange="BookQt()" /></td>';
			cols += '<td><input type="text" min="1" class="form-control cal"'+counter+'"  id="postal_charge'+counter+'"  name="postal_charge[]' + counter + '" onchange="cul()"/></td>';

			cols += '<td><input type="text" readonly class="form-control" id="sub_total'+counter+'" name="sub_total[]"/></td>';

			cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="રદ્દ કરો"></td>';
			
			newRow.append(cols);
			$("table.order-list").append(newRow);
			counter++;

		});



		$("table.order-list").on("click", ".ibtnDel", function (event) {
			$(this).closest("tr").remove();       
			counter -= 1;
			calculateSum();
		});


	});

	function cul(row) 
	{
		var s=1;
		var n= counter-s; 
		var i;
		var mn =$('#book_qut'+n).val();
		var pp =$('#price'+n).val();
		var post=$('#postal_charge'+n).val();
		var k=mn*pp;
		var kk=parseFloat(k)+parseFloat(post);
		$('#sub_total'+n).val(kk);
		var d=$('#sub_total'+n).val();
		calculateSum();

	}

	function BookQt(row) 
	{
		
		var ss=1;
		var nn= counter-ss; 
		var ii;
		var mnn =$('#book_qut'+nn).val();		
		var ppp =$('#stock'+nn).val();

		if(parseInt(ppp)<parseInt(mnn) ){
			alert('હાજર બુકની સંખ્યા કરતા વધારે છે! ફરી થી નાખો...');
			$('#book_qut'+nn).val('');
			$('#postal_charge'+nn).val('');
			$('#sub_total'+nn).val('');
		}

	}

	function calculateSum()
	{
		var sum = 0;
		for(var i=2;i<counter;i++)
		{
			var ss=	$('#sub_total'+i).val();
			sum +=parseFloat(ss);
		}

		$('#total_amount').val(sum);
		tot=sum;
	}

	function calculateRow(row) {
		var price = +row.find('input[name^="price"]').val();

	}

	function calculateGrandTotal() {
		var grandTotal = 0;
		$("table.order-list").find('input[name^="price"]').each(function () {
			grandTotal += +$(this).val();
		});
		$("#grandtotal").text(grandTotal.toFixed(2));
	}
</script>
<script>

	function checkForm(form)
	{

		if(form.r_date.value == "") {
			alert("તારીખ પસંદ કરો!");
			form.r_date.focus();
			return false;
		}

		if(form.cust_name.value == "") {
			alert("લેનારનું નામ નાખો!");
			form.cust_name.focus();
			return false;
		}
		
		if(form.cust_addr.value == "") {
			alert("સરનામું નાખો!");
			form.cust_addr.focus();
			return false;
		}
		if(form.cust_mob.value == "") {
			alert("મોબાઈલ નંબર નાખો!");
			form.cust_mob.focus();
			return false;
		}
		return true;
	}


	function placeordermob(){

		var Number = document.getElementById('cust_mob').value;
		var IndNum = /^[0]?[6789]\d{9}$/;

		if(IndNum.test(Number)){
			return;
		}

		else{
			alert( "મોબાઇલ નંબર સરખો નાખો.");
			document.getElementById('cust_mob').value="";
			document.getElementById('cust_mob').focus();
		}
	}


	function calculatee() {
		var s=$('#total_amount').val();
		var ss=$('#postal_charge').val();

		if(ss!=null)
		{
			if($('#postal_charge').val()=='')
			{
				$('#total_amount').val(tot);
			}
			else
			{

				var my =parseFloat(s)+ parseFloat(ss);
				$('#total_amount').val(my);
			}

		}
		if(ss==null)
		{
			$('#total_amount').val(s);
		}

	}

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

	function validateplace(evt) {
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

<?php
include 'footer.php';
?>