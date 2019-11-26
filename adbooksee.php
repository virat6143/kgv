<?php
include 'connect.php';
include 'head.php';
?>

<script type="text/javascript">
	google.load("elements", "1", {packages: "transliteration"});
</script> 

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

		if($("#myInputTextField").length){
			control.makeTransliteratable(['myInputTextField']);
		}

	}
	google.setOnLoadCallback(onLoad);

</script>

<link rel="stylesheet" href="clander/jquery.dataTables.min.css">
<script src="clander/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
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
         <center><h3><span class="badge badge-success">બુકની માહિતી જુઓ</span></h3></center> 
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="remove-messages"></div>
					<div class="a" style="text-align: right;">
						<b><label>શોધો:</label></b>
						<input type="text" id="myInputTextField">
					</div> 	
					<div class="table-wrapper-scroll-y my-custom-scrollbar">			
					<table class="table table-striped table-bordered" id="example" cellspacing="6">
						<thead style='background-color:#00bfff;color:#ffffff;';>
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

							</tr>
						</thead>

						<?php
						$qry="select * from book where status=0";
						$rs=mysqli_query($con,$qry);
						$count=1;
						while($data=mysqli_fetch_assoc($rs))
						{
							echo "<tr>";
							echo "<td>";
							echo $count;
							echo "</td>";
							echo "<td>";
							echo $data["date"];
							echo "</td>";
							echo "<td>";
							echo $data["bname"];
							echo "</td>";
							echo "<td>";
							echo $data["bsr"];
							echo "</td>";
							echo "<td>";
							echo $data["bno"];
							echo "</td>";
							echo "<td>";
							echo $data["bbh"];
							echo "</td>";
							echo "<td>";
							echo $data["printing"];
							echo "</td>";
							echo "<td>";
							echo $data["p_date"];
							echo "</td>";
							echo "<td>";
							echo $data["total_bookno"];
							echo "</td>";
							echo "<td>";
							echo $data["total_kharch"];
							echo "</td>";

							echo "<td>";
							if($data["bstatus"]==1)
							{
								echo "હાજર"	;
							}
							else
							{
								echo "ગૈરહાજર";
							}
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