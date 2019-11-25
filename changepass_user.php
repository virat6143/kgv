
<?php
include 'head.php';
include 'connect.php';
?>
<script>
	function check()
	{
		if(document.getElementById('txtpass').value === document.getElementById('conformpass').value)
		{

		} 
		else 
		{
			document.getElementById('txtpass').value="";
			document.getElementById('conformpass').value="";
			document.getElementById('txtpass').focus();
			alert("તમારો પાસવર્ડ સરખો નથી");
		}
	}

	function viewPassword22()
	{
		var passwordInput1 = document.getElementById('txtpass');
		var passStatus1 = document.getElementById('pass-status1');

		if (passwordInput1.type == 'password'){
			passwordInput1.type='text';
			passStatus1.className='fa fa-eye-slash';

		}
		else{
			passwordInput1.type='password';
			passStatus1.className='fa fa-eye';
		}
	}
	function viewPassword223()
	{
		var passwordInput2 = document.getElementById('conformpass');
		var passStatus2 = document.getElementById('pass-status2');

		if (passwordInput2.type == 'password'){
			passwordInput2.type='text';
			passStatus2.className='fa fa-eye-slash';

		}
		else{
			passwordInput2.type='password';
			passStatus2.className='fa fa-eye';
		}
	}
	function checkForm(form)
	{

		if(form.txtemail.value == "") {
			alert("તમારું ઈ-મેલ નાખો!");
			form.txtemail.focus();
			return false;
		}

		if(form.txtpass.value == "") {
			alert("તમારો નવો પાસવર્ડ નાખો!");
			form.txtpass.focus();
			return false;
		}

		if(form.conformpass.value == "") {
			alert("તમારો પાસવર્ડ પુષ્ટિ કરો!");
			form.conformpass.focus();
			return false;
		}

		return true;
	}
	function emaailuser(){

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

function validpass111() {
    var isValid = false;
    var regex = /^(?=.{6,})/;
    isValid = regex.test(document.getElementById("txtpass").value);
    document.getElementById("passvalllid11").style.display = !isValid ? "block" : "none";
    return isValid;
  }
</script>
<div class="container" >
	<div class="jumbotron">
		<h4 class="text-center"><span class="badge badge-primary" style="height: 30px;">પાસવર્ડ બદલાવો</span></h4>
		<div class="col-sm-2"></div>
		<center>
			<div class="col-lf-8">
				<form action="change1.php" class="form-horizontal" id="changepasssuser" method="post"  onsubmit="return checkForm(this);">

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
								<strong>અભિનંદન !!! </strong> &nbsp;તમારો નવો પાસવર્ડ સફરતાપૂર્વક સેવ થઇ ગયો છે.";
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
										<input type="text" name="txtemail" id="txtemail" class="form-control" placeholder="abc@gmail.com" onchange="emaailuser()">
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
											<i id="pass-status1" class="fa fa-eye" aria-hidden="true" onClick="viewPassword22()"></i>
										</div>
										<input type="password" name="txtpass" class="form-control"
										id="txtpass" placeholder="નવો પાસવર્ડ ******" maxlength="30" minlength="4" onkeyup="isalphanum(this)" onchange="return validpass111(this)" >
									</div>
									<div class="form-row">
										<span id="passvalllid11" style="color: red; display: none">
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
											<i id="pass-status2" class="fa fa-eye" aria-hidden="true" onClick="viewPassword223()"></i>
										</div>
										<input type="password" name="conformpass" class="form-control"
										id="conformpass" placeholder="પાસવર્ડ પુષ્ટિ કરો ******" maxlength="30" minlength="4" onkeyup="isalphanum(this)" onchange="check()">
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