
<?php
include 'head.php';
include 'connect.php';
?>
<script>
	function emailuseradmin(){

		var Number = document.getElementById('txtemail').value;
		var IndNum =/^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z]+\.)+([a-zA-Z]{2,3})$/;

		if(IndNum.test(Number)){
			return;
		}

		else{
			alert("ઈ મેલ સરખો નાખો");
			document.getElementById('txtemail').focus();
			document.getElementById('txtemail').value="";
		}

	}

	function check()
	{
		if(document.getElementById('txtpassv').value === document.getElementById('conformpassv').value)
		{

		} 
		else 
		{
			document.getElementById('txtpassv').value="";
			document.getElementById('conformpassv').value="";
			document.getElementById('txtpassv').focus();
			alert("તમારો પાસવર્ડ સરખો નથી");
		}
	}
	function viewPassword224()
	{
		var passwordInput11 = document.getElementById('txtpassv');
		var passStatus11 = document.getElementById('pass-status11');

		if (passwordInput11.type == 'password'){
			passwordInput11.type='text';
			passStatus11.className='fa fa-eye-slash';

		}
		else{
			passwordInput11.type='password';
			passStatus11.className='fa fa-eye';
		}
	}
	function viewPassword225()
	{
		var passwordInput24 = document.getElementById('conformpassv');
		var passStatus24 = document.getElementById('pass-status24');

		if (passwordInput24.type == 'password'){
			passwordInput24.type='text';
			passStatus24.className='fa fa-eye-slash';

		}
		else{
			passwordInput24.type='password';
			passStatus24.className='fa fa-eye';
		}
	}

	function checkForm(form)
	{

		if(form.txtemail.value == "") {
			alert("તમારું ઈ-મેલ નાખો!");
			form.txtemail.focus();
			return false;
		}

		if(form.txtpassv.value == "") {
			alert("તમારો નવો પાસવર્ડ નાખો!");
			form.txtpassv.focus();
			return false;
		}

		if(form.conformpassv.value == "") {
			alert("તમારો પાસવર્ડ પુષ્ટિ કરો!");
			form.conformpassv.focus();
			return false;
		}

		return true;
	}

 function validpass1() {
    var isValid = false;
    var regex = /^(?=.{6,})/;
    isValid = regex.test(document.getElementById("txtpassv").value);
    document.getElementById("passvalllid").style.display = !isValid ? "block" : "none";
    return isValid;
  }
</script>




<div class="container" >
	<div class="jumbotron" >
		<h4 class="text-center"><span class="badge badge-primary" style="height: 30px;">પાસવર્ડ બદલાવો</span></h4>
		<div class="col-sm-2"></div>
		<center>
			<div class="col-lf-8">
				<form action="change2.php" class="form-horizontal" id="changeadmin" method="post" onsubmit="return checkForm(this);">

					<div class="form-group">
						<?PHP 

						if (isset($_GET["errr"]))
						{

							echo"<div class='alert alert-danger alert-dismissible'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong>તમારું ઈ-મેલ ખોટા છે.</div>";
							}
							if (isset($_GET["erro"]))
							{

								echo"<div class='alert alert-success'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>તમારો નવો પાસવર્ડ સફરતાપૂર્વક સેવ થઇ ગયો છે.</strong></div>";
							}
							?>
						</div>

						<div class="row">
							<div class="col-md-3 field-label-responsive">
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: black">
										<div class="input-group-addon" style="width: 2.6rem;color: #ff8000">
											<i class="fa fa-envelope"></i>
										</div>
										<input type="text" name="txtemail" id="txtemail" class="form-control" placeholder="abc@gmail.com" onchange="emailuseradmin()">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3 field-label-responsive">
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: black">
										<div class="input-group-addon" style="width: 2.6rem;color: #ff8000">
											<i id="pass-status11" class="fa fa-eye" aria-hidden="true" onClick="viewPassword224()"></i>
										</div>
										<input type="password" name="txtpassv" id="txtpassv" class="form-control" placeholder="નવો પાસવર્ડ ******"  onchange="return validpass1(this)">
									</div>
									<div class="form-row">
										<span id="passvalllid" style="color: red; display: none">
											<b>*ઓછા માં ઓછા છ મૂળાક્ષર નાખો</b>
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3 field-label-responsive">
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group mb-2 mr-sm-2 mb-sm-0" style="color: black">
										<div class="input-group-addon" style="width: 2.6rem;color: #ff8000">
											<i id="pass-status24" class="fa fa-eye" aria-hidden="true" onClick="viewPassword225()"></i>
										</div>
										<input type="password" name="conformpassv" class="form-control"
										id="conformpassv" placeholder="પાસવર્ડ પુષ્ટિ કરો ******" onkeyup="isalphanum(this)" onchange="check()">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-5"> 
								<button type="submit" class="btn btn-success ">સેવ કરો</button>
							</div>
						</div>
					</form>
				</div>
			</center>
		</div>
	</div>
	<?php 
	include 'footer.php';
	?>