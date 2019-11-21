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

	function mobileNumber11(){

		var Number = document.getElementById('sub_mob').value;
		var IndNum = /^[0]?[6789]\d{9}$/;

		if(IndNum.test(Number)){
			return;
		}

		else{
			alert( "મોબાઇલ નંબર સરખો નાખો.");
			document.getElementById('sub_mob').value="";
			document.getElementById('sub_mob').focus();
		}
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


		if($("#sub_name").length){
			control.makeTransliteratable(['sub_name']);
		}

		if($("#sub_name1").length){
			control.makeTransliteratable(['sub_name1']);
		}

         if($("#sub_addr1").length){
			control.makeTransliteratable(['sub_addr1']);
		}

       if($("#sub_village1").length){
			control.makeTransliteratable(['sub_village1']);
		}


		if($("#sub_addr").length){
			control.makeTransliteratable(['sub_addr']);
		}

		if($("#sub_village").length){
			control.makeTransliteratable(['sub_village']);
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
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<style>
	.dataTables_filter { display: none; }

</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">    
			<div class="panel panel-default">
				<?php  
				if (isset($_GET["success"]))
					echo "<div class='alert alert-success alert-dismissible fade show'>
				        <button type='button' class='close' data-dismiss='alert'>&times;</button>
				        <strong>અભિનંદન!!! સફ્રતાપૂર્વક માહિતી નંખાઈ ગઈ છે</strong> 
			   </div>";
			   if (isset($_GET["arr"]))
					echo "<div class='alert alert-success alert-dismissible fade show'>
				        <button type='button' class='close' data-dismiss='alert'>&times;</button>
				        <strong>અભિનંદન!!! સફ્રતાપૂર્વક સુધારો થઇ ગયો છે</strong> 
			   </div>";
			?>

			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-left" style="padding-bottom:20px;">
					<h5 style="color: orange;"><B>ગ્રાહક માહિતી નાખવા</B></h5>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
						<i class="fa fa-plus"></i> અહીં ક્લિક કરો
					</button>
				</div>
				<div class="alert">
					<body>
						<center><h3><span class="badge badge-success">ગ્રાહકની માહિતી જુઓ</span></h3></center>
						<center><b style="color: black"></b></center>
					</body>
					
					<div class="a" style="text-align: right;">
						<b><label>શોધો:</label></b>
						<input type="text" id="myInputTextField">
					</div> 	
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
								<th>માહિતી જોવા</th> 
								<th>સુધારો કરો</th> 
								<th>રદ્દ કરો</th> 
							</tr>
						</thead>

						<?php
						$qry="SELECT * FROM subscriber INNER JOIN district ON district.d_id=subscriber.sub_district INNER JOIN taluka ON taluka.t_id=subscriber.sub_taluka";
						$rs=mysqli_query($con,$qry);
						$count=1;
						while($data=mysqli_fetch_assoc($rs))
						{
							echo "<tr>";
							echo "<td><label>";
							echo $count;
							echo "</label></td>";
							echo "<td><label id='sid".$data["sub_id"]."'>";
							echo $data["sub_rec"];
							echo "</label></td>";
							echo "<td><label id='subno".$data["sub_id"]."'>";
							echo $data["sub_no"];
							echo "</lable></td>";
							echo "<td><label id='subname".$data["sub_id"]."'>";
							echo $data["sub_name"];
							echo "</lable></td>";
							echo "<td><label id='subty".$data["sub_id"]."'>";
							echo $data["sub_type"];
							echo "</lable></td>";
							echo "<td><label id='substart".$data["sub_id"]."'>";
							echo $data["sub_start"];
							echo "</lable></td>";
							echo "<td><label id='subend".$data["sub_id"]."'>";
							echo $data["sub_end"];
							echo "</lable></td>";
							echo "<td><label id='subaddr".$data["sub_id"]."'>";
							echo $data["sub_addr"];
							echo "</lable></td>";
							echo "<td><label id='submob".$data["sub_id"]."'>";
							echo $data["sub_mob"];
							echo "</lable></td>";
							echo "<td><label id='diname".$data["sub_id"]."'>";
							echo $data["district_name"];
							echo "</lable></td>";
							echo "<td><label id='tname".$data["sub_id"]."'>";
							echo $data["t_name"];
							echo "</lable></td>";
							echo "<td><label id='subvill".$data["sub_id"]."'>";
							echo $data["sub_village"];
							echo "</lable></td>";
							echo "<td><label id='subpin".$data["sub_id"]."'>";
							echo $data["sub_pincode"];
							echo "</lable></td>";

							echo "<td><a class='bcc' href='#' title='View' data-target='#myModal22' data-toggle='modal' data1='".$data["sub_id"]."' id='".$data["sub_id"]."'><i class='fas fa-eye' style='font-size:30px;'></i></a></td>";

							echo "<td><a class='viratch' href='#' title='View' data-target='#myModalvv' data-toggle='modal' datavirat='".$data["sub_id"]."' id='".$data["sub_id"]."'><i class='fas fa-edit' style='font-size:40px;'></i></a></td>";


							echo"<td><a href='deletesub.php?id=".$data['sub_id']."' onclick='return check();' style='font-size:30px;color:red'><i class='fa fa-trash'></i></a></td>";  


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
<body>

	<script>
		$(document).ready(function(){
			$('.bcc').click(function(){

				var id=$(this).attr("data1");

				var sid=$('#sid'+id).text();
				var subno=$('#subno'+id).text();
				var subname=$('#subname'+id).text();
				var subty=$('#subty'+id).text();
				var substart=$('#substart'+id).text();
				var subend=$('#subend'+id).text();
				var subaddr=$('#subaddr'+id).text();
				var submob=$('#submob'+id).text();
				var subvill=$('#subvill'+id).text();
				var diname=$('#diname'+id).text();
				var tname=$('#tname'+id).text();
				var subpin=$('#subpin'+id).text();

				$('#subrec').text(sid);
				$('#sub_no').text(subno);
				$('#subname1111').text(subname);
				$('#styyy').text(subty);
				$('#sdt1').text(substart);
				$('#edt11').text(subend);
				$('#addr1').text(subaddr);
				$('#mobi').text(submob);
				$('#dist').text(diname);
				$('#talukaa').text(tname);
				$('#vill').text(subvill);
				$('#pin').text(subpin);
				$('#editid').text(id);
			});
		});
	</script>

	<div class="modal fade" id="myModal22">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form method="POST" action="subscriber1.php" id="subreg" onsubmit="return checkForm(this);">
					<div class="modal-header">
						<h4 class="modal-title"><span class="badge badge-primary">ગ્રાહકની માહિતી જુઓ</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row"> 
							<div class="col-md-12"> 
								<div class="table-responsive">

									<table class="table table-striped table-bordered">
										<div class="form-group">
											<input id="editid" type="hidden" name="cashaaad"  class="form-control"/>	
										</div>
										<tr>
											<div class="form-group">
												<th>રસીદ નંબર</th>
												<td><b><label for="subrec" id="subrec" name="subrec" style="color: #ff8000"></label></b>
												</td>
											</div>
										</tr>

										<tr>
											<div class="form-group">
												<th>ગ્રાહક નંબર</th>
												<td><b><label for="sub_no" id="sub_no" name="sub_no" style="color: #ff8000"></label></b>
												</td>
											</div>
										</tr>
										<tr>
											<div class="form-group">
												<th>ગ્રાહકનું નામ</th>
												<td><b><label id="subname1111" style="color: #ff8000"></label></b>
												</td>

											</div>
										</tr>
										<tr>
											<div class="form-group">
												<th>લવાજમનો પ્રકાર</th>
												<td><b><label id="styyy" style="color: #ff8000"></td></label></b>
											</div>
										</tr>
										<tr>
											<div class="form-group" style="color: #ff8000">
												<th>લવાજમ ભર્યાની તારીખ</th>
												<td><b><label id="sdt1" style="color: #ff8000"></td></label></b>
											</div>
										</tr>
										<tr>
											<div class="form-group" style="color: #ff8000">
												<th style="width: 40%;">લવાજમ પૂરું થવાની તારીખ</th>
												<td><b><label id="edt11" style="color: #ff8000"></td></label></b>
											</div>
										</tr>
										<tr>
											<div class="form-group" style="color: #ff8000">
												<th>ગ્રાહકનું સરનામું</th>
												<td><b><label id="addr1" style="color: #ff8000"></td></label></b>
											</div>
										</tr>
										<tr>
											<div class="form-group" style="color: #ff8000">
												<th>ગ્રાહકનો મોબાઈલ નંબર</th>
												<td><b><label id="mobi" style="color: #ff8000"></td></label></b>
											</div>
										</tr>
										<tr>
											<div class="form-group" style="color: #ff8000">
												<th>જિલ્લો</th>
												<td><b><label id="dist" style="color: #ff8000"></td></label></b>
											</div>
										</tr>
										<tr>
											<div class="form-group" style="color: #ff8000">
												<th>તાલુકો</th>
												<td><b><label id="talukaa" style="color: #ff8000"></td></label></b>
											</div>
										</tr>
										<tr>
											<div class="form-group" style="color: #ff8000">
												<th>ગામનું નામ</th>
												<td><b><label id="vill" style="color: #ff8000"></td></label></b>
											</div>
										</tr>
										<tr>
											<div class="form-group" style="color: #ff8000">
												<th>પિનકોડ</th>	
												<td><b><label id="pin" style="color: #ff8000"></td></label></b>
											</div>
										</tr>
									</table>
								</div>
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>

	 <div class="modal fade" id="myModalvv">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form method="POST" action="updatesub.php">
					<div class="modal-header">	
						<h4 class="modal-title"><span class="badge badge-primary">ગ્રાહકની માહિતીમાં સુધારો કરો</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">

					<div class="form-group">
					<input id="vccc" type="hidden" name="vccc"  class="form-control"/>
					</div>
						
						<div class="form-group">
							<b><label for="recno" style="color: #ff8000">રસીદ નંબર નાખો:</label></b>
							<input type="text" name="sub_rec" id="sub_rec1" class="form-control" placeholder="રસીદ નંબર નાખો" autocomplete="off"  onkeypress='validatesub(event)' />
							
						</div>
						<div class="form-group">
							<b><label for="subno11" style="color: #ff8000">ગ્રાહક નંબર:</label></b>
							<input type="text" name="sub_no" id="sub_no1" class="form-control" placeholder="ગ્રાહક નંબર નાખો" autocomplete="off"  />
							
						</div>
						<div class="form-group">
							<b><label for="subname" style="color: #ff8000">ગ્રાહકનું નામ:</label></b>
							<input type="text" name="sub_name" id="sub_name1" class="form-control" placeholder="ગ્રાહકનું નામ" onkeypress="return onKeyValidate(event,alpha);" autocomplete="off" />
						

						</div>
						<div class="form-group">
							<b><label for="stt" style="color: #ff8000">લવાજમનો પ્રકાર:</label></b>
							<br>
							<input type="radio"  id="sub_type1" name="sub_type1" value="૧ વર્ષ" onclick="subcclick(5)" autocomplete="off"> ૧ વર્ષ &nbsp;
							<input type="radio" id="sub_type1" name="sub_type1" value="૫ વર્ષ" onclick="subcclick(6)" autocomplete="off"> ૫ વર્ષ
							<script type="text/javascript">

								function subcclick(aa)
								{
									if(aa==5)
									{

										var today = new Date();
										//var dd = today.getDate();
										var mm = today.getMonth() + 1;
										var y = today.getFullYear();
										var today = y + '/'+ mm;
										var today1 = new Date();
										//var dd = today1.getDate();
										var mm = today1.getMonth() +0;
										var y = today1.getFullYear() +1;
										var today1 = y + '/'+ mm;
										document.getElementById("sub_start1").value=today;
										document.getElementById("sub_end1").value=today1;

									}

									if(aa==6)
									{
										var today = new Date();
										//var dd = today.getDate();
										var mm = today.getMonth() + 1;
										var y = today.getFullYear();
										var today = y + '/'+ mm;
										var today1 = new Date();
										//var dd = today1.getDate();
										var mm = today1.getMonth() +0;
										var y = today1.getFullYear() +5;
										var today1 = y + '/'+ mm;
										document.getElementById("sub_start1").value=today;
										document.getElementById("sub_end1").value=today1;
									}

								}

							</script>
						</div> 

						<div class="form-group" style="color: #ff8000">
							<b><label for="sdt" style="color: #ff8000">લવાજમ ભર્યાની તારીખ:</label></b>
							<input type="text" name="sub_start" id="sub_start1" readonly="true" class="form-control" placeholder="ગ્રાહક ચાલુ થયાની તારીખ" autocomplete="off" />

						</div>
						<div class="form-group" style="color: #ff8000">
							<b><label for="edt" style="color: #ff8000">લવાજમ પૂરું થવાની તારીખ:</label></b>
							<input type="text" name="sub_end" id="sub_end1" readonly="true"  class="form-control" placeholder="લવાજમ પૂરું થવાની તારીખ" autocomplete="off" />
						</div> 
						<div class="form-group" style="color: #ff8000">
							<b><label for="address" style="color: #ff8000">ગ્રાહકનું સરનામું:</label></b>
							<textarea class="form-control" name="sub_addr" id="sub_addr1" rows="4" autocomplete="off" /></textarea>
						
						</div>
						<div class="form-group" style="color: #ff8000">
							<b><label for="address" style="color: #ff8000">ગ્રાહકનો મોબાઈલ નંબર:</label></b>
							<input type="text" name="sub_mob" id="sub_mob1" maxlength="10" class="form-control" placeholder="ગ્રાહકનો મોબાઈલ નંબર" onchange="mobileNumber11(this)" autocomplete="off"  onkeypress='validatesub(event)' />

						</div>

				<div class="form-group" style="color: #ff8000">
					<b><label for="village" style="color: #ff8000">ગામનું નામ:</label></b>
					<input type="text" name="sub_village" id="sub_village1" class="form-control" placeholder="ગામનું નામ નાખો" oninvalid="setCustomValidity('ગામનું નામ નાખો')" onkeypress="return onKeyValidate(event,alpha);" autocomplete="off" />
					
				</div>
				<div class="form-group" style="color: #ff8000">
					<b><label for="pincode" style="color: #ff8000">પિનકોડ:</label></b>
					<input type="text" name="sub_pincode" id="sub_pincode1" maxlength="6" class="form-control" placeholder="પિનકોડ નાખો" onchange="pincodesub(this)" autocomplete="off"  onkeypress='validatesub(event)'/>
				
				</div>
				<div class="modal-footer">
					<input type="submit"  name="સેવ કરો" value="સેવ કરો" class="btn btn-success" />
				</div>
			</form>
		  </div>
	   </div>
    </div>
</div>
<script>
	$(document).ready(function(){
		$('.viratch').click(function(){

			var id1=$(this).attr("datavirat");

			var sid=$('#sid'+id1).text();
			var subno=$('#subno'+id1).text();
			var subname=$('#subname'+id1).text();
			var subaddr=$('#subaddr'+id1).text();
			var submob=$('#submob'+id1).text();
			var subvill=$('#subvill'+id1).text();
			var subpin=$('#subpin'+id1).text();
			//var subty=$('#subty'+id1).text();
            var substart=$('#substart'+id1).text();
            var subend=$('#subend'+id1).text();
          

            $('input:radio[name=sub_type1]')[0].checked = true;

			$('#sub_rec1').val(sid);
			$('#sub_no1').val(subno);
			$('#sub_name1').val(subname);
			$('#sub_addr1').val(subaddr);
			$('#sub_mob1').val(submob);
			$('#sub_village1').val(subvill);
			$('#sub_pincode1').val(subpin);
			//$('#sub_type1').val(subty);
			$('#sub_start1').val(substart);
			$('#sub_end1').val(subend);
			$('#vccc').val(id1);
		});
	});
</script> 


<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="POST" action="subscriber1.php" id="subreg" onsubmit="return checkForm(this);">
				<div class="modal-header">	
					<h4 class="modal-title"><span class="badge badge-primary">ગ્રાહકની  માહિતી ભરવાનું પત્રક</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<b><label for="dt" style="color: #ff8000">તારીખ:</label></b>
						<input type="date" id="sdatee" name="sdatee"  class="form-control" placeholder="તારીખ પસંદ કરો" value="<?php echo date("d/m/Y") ?>" />
					</div>

					<div class="form-group">
						<b><label for="recno" style="color: #ff8000">રસીદ નંબર નાખો:</label></b>
						<input type="text" name="sub_rec" id="sub_rec" class="form-control" placeholder="રસીદ નંબર નાખો" autocomplete="off"  onkeypress='validatesub(event)' />
						<span id="subno" class="text-danger"></span>
					</div>
					<div class="form-group">
						<b><label for="subno11" style="color: #ff8000">ગ્રાહક નંબર:</label></b>
						<input type="text" name="sub_no" id="sub_no" class="form-control" placeholder="ગ્રાહક નંબર નાખો" autocomplete="off"  />
						<span id="subnovirat" class="text-danger"></span>
					</div>
					<div class="form-group">
						<b><label for="subname" style="color: #ff8000">ગ્રાહકનું નામ:</label></b>
						<input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="ગ્રાહકનું નામ" onkeypress="return onKeyValidate(event,alpha);" autocomplete="off" />
						<span id="subtupe1" class="text-danger"></span>

					</div>
					<div class="form-group">
						<b><label for="stt" style="color: #ff8000">લવાજમનો પ્રકાર:</label></b>
						<br>
						<input type="radio" id="sub_type" name="sub_type" value="૧ વર્ષ" onclick="subclick(0)" autocomplete="off"> ૧ વર્ષ &nbsp;
						<input type="radio" id="sub_type" name="sub_type" value="૫ વર્ષ" onclick="subclick(1)" autocomplete="off"> ૫ વર્ષ
						<script type="text/javascript">

							function subclick(aa)
							{
								if(aa==0)
								{

									var today = new Date();
										//var dd = today.getDate();
										var mm = today.getMonth() + 1;
										var y = today.getFullYear();
										var today = y + '/'+ mm;
										var today1 = new Date();
										//var dd = today1.getDate();
										var mm = today1.getMonth() +0;
										var y = today1.getFullYear() +1;
										var today1 = y + '/'+ mm;
										document.getElementById("sub_start").value=today;
										document.getElementById("sub_end").value=today1;

									}

									if(aa==1)
									{
										var today = new Date();
										//var dd = today.getDate();
										var mm = today.getMonth() + 1;
										var y = today.getFullYear();
										var today = y + '/'+ mm;
										var today1 = new Date();
										//var dd = today1.getDate();
										var mm = today1.getMonth() +0;
										var y = today1.getFullYear() +5;
										var today1 = y + '/'+ mm;
										document.getElementById("sub_start").value=today;
										document.getElementById("sub_end").value=today1;
									}

								}

							</script>
							<span id="pasand1" class="text-danger"></span>
						</div>
						<div class="form-group" style="color: #ff8000">
							<b><label for="sdt" style="color: #ff8000">લવાજમ ભર્યાની તારીખ:</label></b>
							<input type="text" name="sub_start" id="sub_start" readonly="true" class="form-control" placeholder="ગ્રાહક ચાલુ થયાની તારીખ" autocomplete="off" />

						</div>
						<div class="form-group" style="color: #ff8000">
							<b><label for="edt" style="color: #ff8000">લવાજમ પૂરું થવાની તારીખ:</label></b>
							<input type="text" name="sub_end" id="sub_end" readonly="true"  class="form-control" placeholder="લવાજમ પૂરું થવાની તારીખ" autocomplete="off" />
						</div>
						<div class="form-group" style="color: #ff8000">
							<b><label for="address" style="color: #ff8000">ગ્રાહકનું સરનામું:</label></b>
							<textarea class="form-control" name="sub_addr" id="sub_addr" rows="4" autocomplete="off" /></textarea>
							<span id="addressvk" class="text-danger"></span>
						</div>
						<div class="form-group" style="color: #ff8000">
							<b><label for="address" style="color: #ff8000">ગ્રાહકનો મોબાઈલ નંબર:</label></b>
							<input type="text" name="sub_mob" id="sub_mob" maxlength="10" class="form-control" placeholder="ગ્રાહકનો મોબાઈલ નંબર" onchange="mobileNumber11(this)" autocomplete="off"  onkeypress='validatesub(event)' />

							<span id="availability"></span>
							<span id="submob11" class="text-danger"></span>

						</div>
						<div class="form-group">
							<b><label for="stt" style="color: #ff8000">જિલ્લો:</label></b>
							<select class="form-control" id="districtID" name="sub_district" onchange="change_district()" autocomplete="off" />
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
						<span id="districtvk" class="text-danger"></span>
					</div>
					<div class="form-group">
						<b><label for="stt" style="color: #ff8000">તાલુકો:</label></b>
						<select class="form-control" id="talukaID" name="sub_taluka" onchange="change_village()" autocomplete="off"  />
						<option value="">તાલુકો પસંદ કરો</option>
					</select>
					<span id="takukavk" class="text-danger"></span>
				</div>

				<div class="form-group" style="color: #ff8000">
					<b><label for="village" style="color: #ff8000">ગામનું નામ:</label></b>
					<input type="text" name="sub_village" id="sub_village" class="form-control" placeholder="ગામનું નામ નાખો" oninvalid="setCustomValidity('ગામનું નામ નાખો')" onkeypress="return onKeyValidate(event,alpha);" autocomplete="off" />
					<span id="villagevk" class="text-danger"></span>
				</div>
				<div class="form-group" style="color: #ff8000">
					<b><label for="pincode" style="color: #ff8000">પિનકોડ:</label></b>
					<input type="text" name="sub_pincode" id="sub_pincode" maxlength="6" class="form-control" placeholder="પિનકોડ નાખો" onchange="pincodesub(this)" autocomplete="off"  onkeypress='validatesub(event)'/>
					<span id="pincodevk" class="text-danger"></span>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submit1" class="btn btn-success" >સેવ કરો</button>
					<button type="button" class="btn btn-danger" id="can">રદ્દ કરો</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#can").click(function(){
			$("#subreg")[0].reset();
		});});

	function checkForm(form)
	{

		if(form.sub_rec.value == "") {
			alert("રસીદ નંબર નાખો!");
			form.sub_rec.focus();
			return false;
		}

		if(form.sub_no.value == "") {
			alert("ગ્રાહક નંબર નાખો!");
			form.sub_no.focus();
			return false;
		}

		if(form.sub_name.value == "") {
			alert("ગ્રાહકનું નામ નાખો!");
			form.sub_name.focus();
			return false;
		}

		var option=document.getElementsByName('sub_type');

		if (!(option[0].checked || option[1].checked)) {
			alert("લવાજમનો પ્રકાર પસંદ કરો!");
			return false;
		}

		if(form.sub_addr.value == "") {
			alert("ગ્રાહકનું સરનામું નાખો!");
			form.sub_addr.focus();
			return false;
		}

		if(form.sub_mob.value == "") {
			alert("ગ્રાહકનો મોબાઈલ નંબર નાખો!");
			form.sub_mob.focus();
			return false;
		}
		if(form.sub_district.value == "") {
			alert("જિલ્લો પસંદ કરો!");
			form.sub_district.focus();
			return false;
		}
		if(form.sub_taluka.value == "") {
			alert("તાલુકો પસંદ કરો!");
			form.sub_taluka.focus();
			return false;
		}
		if(form.sub_village.value == "") {
			alert("ગામનું નામ નાખો!");
			form.sub_village.focus();
			return false;
		}
		if(form.sub_pincode.value == "") {
			alert("પિનકોડ નાખો!");
			form.sub_pincode.focus();
			return false;
		}
		return true;
	}

</script>

</body>

<script type="text/JavaScript">
	function check()
	{
		return confirm("શું તમને ખાતરી છે?");
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

	function validatesub(evt) {
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

	$(document).ready(function(){ 
		$('#sub_mob').blur(function(){

			var sub_mob = $(this).val();
			$.ajax({

				url:'abc.php',
				method:"POST",
				data:{user_name:sub_mob},
				success:function(data)
				{
					if(data != '0')
					{
						$('#availability').html('<span class="text-danger">મોબાઈલ નંબર રજીસ્ટર થઇ ચુક્યો છે</span>');
						$('#submit1').attr("disabled", true);
					}
					else
					{
						$('#availability').html('<span class="text-success"></span>');
						$('#submit1').attr("disabled", false);
					}
				}
			});

		});
	});
	function pincodesub(){

		var Number = document.getElementById('sub_pincode').value;
		var IndNum = /^[3-9][0-9]{5}$/;

		if(IndNum.test(Number)){
			return;
		}

		else{
			alert( "પીનકોડ સરખો નાખો.");
			document.getElementById('sub_pincode').value="";
			document.getElementById('sub_pincode').focus();
		}

	}
</script>

<?php
include 'footer.php';
?>