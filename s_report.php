<?php
include 'connect.php';
include 'head.php';
?>

<style>
	table.table-bordered{
		border:1px solid #1aa3ff;
		margin-top:20px;
		margin-left:20px;
		margin-right:20px;
	}
	table.table-bordered > thead > tr > th{
		border:1px solid #1aa3ff;
	}
	table.table-bordered > tbody > tr > td{
		border:1px solid #1aa3ff;
	}

</style>
<!-- <script>
	window.onload= function () { 
		window.print();
		window.close();  
	}  
</script> -->

<!-- <script language="javascript" type="text/javascript">
	function printDiv(divID) {
		
		var divToPrint = document.getElementById('printablediv');
		var htmlToPrint = '' +
		'<style type="text/css">' +
		'table th, table td {' +
		'border:1px solid #000;' +
		'padding:0 em;' +
		'}' +
		'</style>';
		htmlToPrint += divToPrint.outerHTML;
		newWin = window.open("");
		newWin.document.write(htmlToPrint);
		newWin.print();
		newWin.close();

	}
</script> -->

<script language="javascript" type="text/javascript">
	function printDiv(divID) {
		var printContents = document.getElementById(divID).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>

<div class="container-fluid"> 

	<div id="printablediv">	
		<div class="jumbotron" style="background-color:#ffffff" align="center">
			<h4 class="text-center text-dark"><b>આણંદ કૃષિ યુનિવર્સિટી,ડી.ઈ.ઈ,આણંદ.</b></h4>
			<h4 class="text-center text-info"><b>ગ્રાહક રિપોર્ટ</b></h4>

			<div class="from-group">
				<?php
				$date= date("d/m/Y");
				if(isset($_POST['s1'])){
					$date11=$_POST['date1'];
					$date22=$_POST['date2'];


					$qry1="select * FROM `subscriber` INNER JOIN district on district.d_id=subscriber.sub_district INNER JOIN taluka on taluka.t_id=subscriber.sub_taluka where subscriber.sdatee  BETWEEN '$date11' AND '$date22'";

					$rs1=mysqli_query($con,$qry1);
					echo "<div style='text-align:right;width:73%'><b>તારીખ : ".$date."</b></div>";
					echo "<table class='table table-bordered table-responsive'>";
					echo "<thead style='background-color:orange;color:#000000;'><tr><th>ગ્રાહક નંબર</th><th>ગ્રાહકનું નામ</th><th>લવાજમનો પ્રકાર</th><th>લવાજમ ભર્યાની તારીખ</th><th>લવાજમ પૂરું થવાની તારીખ</th><th>ગ્રાહકનું સરનામું</th><th>ગ્રાહકનો મોબાઈલ નંબર</th><th>જિલ્લો</th><th>તાલુકો</th><th>ગામનું નામ</th><th>પિનકોડ</th></tr></thead>";

					while($arr1=mysqli_fetch_assoc($rs1))
					{
						echo "<tbody><tr>";

						echo "<td>".$arr1["sub_no"]."</td>";
						echo "<td>".$arr1["sub_name"]."</td>";
						echo "<td>".$arr1["sub_type"]."</td>";
						echo "<td>".$arr1["sub_start"]."</td>";
						echo "<td>".$arr1["sub_end"]."</td>";
						echo "<td>".$arr1["sub_addr"]."</td>";
						echo "<td>".$arr1["sub_mob"]."</td>";
						echo "<td>".$arr1["district_name"]."</td>";
						echo "<td>".$arr1["t_name"]."</td>";
						echo "<td>".$arr1["sub_village"]."</td>";
						echo "<td>".$arr1["sub_pincode"]."</td>";

						echo "</tr></tbody>";
					}
					echo "</table>";
				}

				?>
			</div>
		</div>
	</div>	
	<div class="col-sm-12" align="center" style="margin-bottom:5px">
		<button type="submit" class="btn btn-success" id="printpagebutton" onclick="javascript:printDiv('printablediv')"><i class="fas fa-print"></i> પ્રિન્ટ</button>
	</div>

</div>
<?php
include"footer.php";
?>