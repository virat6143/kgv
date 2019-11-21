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
<script language="javascript" type="text/javascript">
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
</script>
<div class="container-fluid"> 

	<div id="printablediv">	
		<div class="jumbotron" style="background-color:#ffffff" align="center">
		  <div class="row">
            <div class="col-sm-2">
             <a href="http://www.aau.in">   <img id="profile-img" class="profile-img-card" src="aau11.png" style="padding-top: 20px;" align="left" />
             </a>
            </div>
            <div class="col-sm-8">
            <h4 class="text-center text-info"><b>Triplicate Copy</b></h4>
            <h5 class="text-center"><b>વિસ્તરણ શિક્ષણ નિયામકશ્રીની કચેરી ,યુનિવર્સિટી ભવન</b></h5>
            <h5 class="text-center"><b>આણંદ કૃષિ યુનિવર્સિટી,આણંદ -૩૮૮૧૧0</b></h5>	
             </div> 
        </div>
         <br>
			<div class="from-group">
			<!-- <div class="row">
            <div class="col-sm-2">
			<h6 class="text-left"><b>નામ:__________________________________________________________________________</b></h6>
			<h6 class="text-left"><b>સરનામું:__________________________________________________________________________</b></h6>
			<h6 class="text-left"><b>જિલ્લો:__________________________________________________________________________</b></h6>
			<h6 class="text-left"><b>તાલુકો:__________________________________________________________________________</b></h6>
			<h6 class="text-left"><b>ગામ:__________________________________________________________________________</b></h6>
			</div> -->
			<!--  <div class="col-sm-10">
		    <h6 class="text-right"><b>કેશ મેમો નં:___________________</b></h6>
		    </div>  -->
		    </div>
				<?php
				/*if(isset($_POST['virat'])){*/
					
				/*	$qry="select * FROM `receipt_details `INNER JOIN book on receipt_details.b_id=book.b_id INNER JOIN receipt on receipt_details.r_id=receipt.r_id where receipt.r_id='".$_POST["rid"]."'";*/


					/*$rs=mysqli_query($con,$qry);*/


					echo "<table class='table table-bordered'>";
					echo "<thead style='background-color:;color:#000000;'><tr><th>અ.નં.</th><th>નામ</th><th>સરનામું</th><th>જિલ્લો</th><th>તાલુકો</th><th>ગામ</th><th>પુસ્તકનું નામ</th><th>એક નકલની કિંમત</th><th>ખરીદેલ નકલ</th><th>રૂપિયા</th></tr></thead>";
					/*echo $bname;
					while($arr=mysqli_fetch_assoc($rs))
					{
						echo "<tbody><tr>";

						echo "<td>".$arr["bname"]."</td>";
						/*echo "<td>".$arr["sub_name"]."</td>";*/
					/*	echo "<td>".$arr["sub_type"]."</td>";
						echo "<td>".$arr["sub_start"]."</td>";
						echo "<td>".$arr["sub_end"]."</td>";
						echo "<td>".$arr["sub_addr"]."</td>";
						echo "<td>".$arr["sub_mob"]."</td>";
						echo "<td>".$arr["sub_district"]."</td>";
						echo "<td>".$arr["sub_taluka"]."</td>";
						echo "<td>".$arr["sub_village"]."</td>";
						echo "<td>".$arr["sub_pincode"]."</td>";

						echo "</tr></tbody>";
					}*/
                     
					echo "</table>";
				?>
				
			</div>
		</div>
	<div class="col-sm-12" align="center" style="margin-bottom:5px">
		<button type="submit" class="btn btn-success" id="printpagebutton" onclick="javascript:printDiv('printablediv')"><i class="fas fa-print"></i> પ્રિન્ટ</button>
	</div>
</div>
<?php
include"footer.php";
?>