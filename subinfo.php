<?php
include 'connect.php';
include 'head.php';
?>


<style type="text/css">
	.my-custom-scrollbar {
		position: relative;
		height: 400px;
		overflow: auto;
	}
	.table-wrapper-scroll-y {
		display: block;
	}
</style>


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
</script>
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


		if($("#sub_rec").length){
			control.makeTransliteratable(['sub_rec']);
		}
		if($("#sub_no").length){
			control.makeTransliteratable(['sub_no']);
		}

		if($("#sub_name").length){
			control.makeTransliteratable(['sub_name']);
		}
		if($("#sub_addr").length){
			control.makeTransliteratable(['sub_addr']);
		}
		if($("#sub_mob").length){
			control.makeTransliteratable(['sub_mob']);
		}
		if($("#sub_village").length){
			control.makeTransliteratable(['sub_village']);
		}
		if($("#sub_pincode").length){
			control.makeTransliteratable(['sub_pincode']);
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
			
			"language": 
			{
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Gujarati.json",
				
			}
			
		});

		$('#myInputTextField').keyup(function(){
			oTable.search($(this).val()).draw() ;
		});
	} );

</script>
<link rel="stylesheet" href="clander/jquery.dataTables.min.css">
<script src="clander/jquery.dataTables.min.js"></script>

	<style>
		.dataTables_filter { display: none; }

	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<center>	
			<a href="subinfo.php">
				<h3><span class="badge badge-info">કૃષિ ગોવિદ્યા ગ્રાહકની માહિતી</h3>	
				<span class="glyphicon glyphicon-grain" aria-hidden="true"></span>
			</a>
			</center>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="remove-messages"></div>
					<div class="a" style="text-align: right;">
						<b><label>શોધો:</label></b>
						<input type="text" id="myInputTextField">
					</div> 	
					<div class="table-wrapper-scroll-y my-custom-scrollbar">
						<table class="table table-striped table-bordered"  id="example">
							<thead style='background-color:#00bfff;color:#ffffff';>
								<tr>
									<th>ક્રમ</th>							
									<th>રસીદ નંબર</th>				
									<th>ગ્રાહક નંબર</th>
									<th>ગ્રાહકનું નામ</th>
									<th>લવાજમનો પ્રકાર</th>
									<th>લવાજમ ભર્યાની તારીખ</th>							
									<th>લવાજમ પૂરું થવાની તારીખ</th>
									<th>ગ્રાહકનું સરનામું</th> 
									<th>ગ્રાહકનો મોબાઈલ નંબર</th> 
									<th>જિલ્લો</th> 
									<th>તાલુકો</th> 
									<th>ગામનું નામ</th> 
									<th>પિનકોડ</th> 
								</tr>
							</thead>

							<?php
							$qry="SELECT * FROM subscriber INNER JOIN district ON district.d_id=subscriber.sub_district INNER JOIN taluka ON taluka.t_id=subscriber.sub_taluka";
							$rs=mysqli_query($con,$qry);
							$count=1;
							while($data=mysqli_fetch_assoc($rs))
							{
								echo "<tr>";
								echo "<td>";
								echo $count;
								echo "</td>";
								echo "<td>";
								echo $data["sub_rec"];
								echo "</td>";
								echo "<td>";
								echo $data["sub_no"];
								echo "</td>";
								echo "<td>";
								echo $data["sub_name"];
								echo "</td>";
								echo "<td>";
								echo $data["sub_type"];
								echo "</td>";
								echo "<td>";
								echo $data["sub_start"];
								echo "</td>";
								echo "<td>";
								echo $data["sub_end"];
								echo "</td>";
								echo "<td>";
								echo $data["sub_addr"];
								echo "</td>";
								echo "<td>";
								echo $data["sub_mob"];
								echo "</td>";
								echo "<td>";
								echo $data["district_name"];
								echo "</td>";
								echo "<td>";
								echo $data["t_name"];
								echo "</td>";
								echo "<td>";
								echo $data["sub_village"];
								echo "</td>";
								echo "<td>";
								echo $data["sub_pincode"];
								echo "</td>";
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
</div>
<?php  
include 'footer.php';
?>