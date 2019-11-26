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

			<div class="row">
				<div class="col-sm-12">
					<h5 class=""><b>આણંદ કૃષિ યુનિવર્સિટી,ડી.ઈ.ઈ,આણંદ.</b><br>
					<b>કચેરીમાં નાણાં ભરવાનું પત્રક</b></h5>
				</div>
			</div>
			
			<div class="from-group">
				<?php
				$date= date("d/m/Y");
				if(isset($_POST['submit'])){
					$date1=$_POST['date1'];
					$date2=$_POST['date2'];

					$qry="select * FROM `receipt_details` INNER JOIN book on receipt_details.b_id=book.b_id INNER JOIN receipt on receipt_details.r_id=receipt.r_id where receipt.r_date  BETWEEN '$date1' AND '$date2'";

					$rs=mysqli_query($con,$qry);
					$count=1;
					echo "<div style='text-align:right;width:73%'><b>તારીખ : ".$date."</b></div>";
					echo "<table class='table table-bordered' >";
					echo "<thead style='background-color:orange;color:#000000;'><tr><th>અ.નં.</th><th>માલની વિગત</th><th>બુકનો ભાવ(રૂપિયા)</th><th>જથ્થો/નંગ</th><th>પોસ્ટલ ચાર્જ</th><th>ટોટલ ભાવ(રૂપિયા)</th></tr></thead>";
					$data=0;
					$qty=0;
					$pt=0;
					while($arr=mysqli_fetch_assoc($rs))
					{
						echo "<tbody><tr>";

						echo "<td>".$count."</td>";
						echo "<td>".$arr["bname"]."</td>";
						echo "<td>".$arr["price"]."</td>";
						echo "<td>".$arr["book_qut"]."</td>";
						echo "<td>".$arr["postal_charge"]."</td>";
						echo "<td>".$arr["sub_to"]."</td>";
						echo "</tr></tbody>";

						$count++;
						$qty +=$arr["book_qut"];
						$pt +=$arr["postal_charge"];
						$data +=$arr["sub_to"];

					}
					echo "<tbody style='background-color:orange'><tr>";
					echo "<td style='color:black'><b>કુલ ટોટલ</b></td>";
					echo "<td style='color:black'>----</td>";
					echo "<td style='color:black'>----</td>";
					echo "<td style='color:black'><b>".$qty."</b></td>";
					echo "<td style='color:black'><b>".$pt."</b></td>";
					echo "<td style='color:black'><b>".$data."</b></td>";
					echo "</tr></tbody>";

					echo "</table>";

				}

				?>
			</div>
		</div>
	</div>	
	<div class="col-sm-12" align="center" style="margin-bottom:5px">
		<button type="submit" target="_blank" class="btn btn-success" id="printpagebutton" onclick="javascript:printDiv('printablediv')"><i class="fas fa-print"></i> પ્રિન્ટ</button>
	</div>
</div>
<?php
include"footer.php";
?>

