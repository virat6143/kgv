<?php
include 'connect.php';
include 'head.php';
?>

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
		<div class="jumbotron" style="background-color:#ffffff" >
			
			<h4 class="text-center text"><b>આણંદ કૃષિ યુનિવર્સિટી,ડી.ઈ.ઈ,આણંદ.</b></h4>
			<h6 class="text-center text"><b>વિસ્તરણ શિષણ નિયામકશ્રીની કચેરી યુનિવર્સિટી ભવન</b></h6>
			<br>

			<?php

			$numOfCols = 3;
			$rowCount = 0;
			$bootstrapColWidth = 12 / $numOfCols;
			if(isset($_POST['s1'])){
				$date111=$_POST['date1'];
				/*$date2=$_POST['date2'];*/
				$qry = "SELECT * FROM subscriber INNER JOIN district ON district.d_id=subscriber.sub_district where sub_start='$date111'";
				//echo $qry;
				$rs=mysqli_query($con,$qry);
                
				?>
				<div class="row">
					<?php
				
					while ($rows=mysqli_fetch_assoc($rs)){

						?>  

						<div class="col-md-<?php echo $bootstrapColWidth; ?>">
							<div class="thumbnail" style="margin-bottom: 25px;">
								<?php echo $rows["sub_no"]; ?>/<?php echo $rows["sub_start"]; ?>/<?php echo $rows["sub_type"]; ?>/<?php echo $rows["sub_end"]; ?><br>
								<?php echo $rows["sub_name"]; ?><br>
								<b>મુ.પો.</b> <?php echo $rows["sub_village"]; ?><br>
								<b>જી.</b> <?php echo $rows["district_name"]; ?>-<?php echo $rows["sub_pincode"]; ?><br>
								
								<b>મો.</b> <?php echo $rows["sub_mob"]; ?><br>


							</div>
						</div>
						<?php
						$rowCount++;
						if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
					}
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