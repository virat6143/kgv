<?php
	include("head.php");
	include("connect.php");
	
		echo"<div class='container-fluid'>";
		echo "<center><b><h2 class='btn btn-primary'>કલાર્કની માહિતી</h2></b></center>";

			$qr="select * from  userreg where status=0";
			$qry=mysqli_query($con,$qr);
			$count=0;
			
			echo"<table class='table table-bordered'>";		
			echo"<thead style='background-color:#ff8000;color:#ffffff;'><tr><th>ક્રમ</th><th>યુઝરનું નામ</th><th>મોબઈલ નંબર</th><th>ઈમૈલ </th><th>યુઝરનું સરનામું</th><th>સ્વીકાર કરો</th><th>રદ્દ કરો</th></tr></thead>";
		   while($ar=mysqli_fetch_assoc($qry))
			  {
			  	$count++;
				echo"<tbody><tr>";
				echo"<td>".$count."</td>";
				echo"<td>".$ar["uname"]."</td>";
				echo"<td>".$ar["umob"]."</td>";
				echo"<td>".$ar["uem"]."</td>";
				echo"<td>".$ar["uadd"]."</td>";
				echo "<td><a href='approveuser.php?no=".$ar["u_id"]."' onclick='return check();'
				><i class='fa fa-check' style='font-size:40px;color:green'></i></a></td>";
				echo"<td><a href='deletuser.php?id=".$ar["u_id"]."' onclick='return check();' ><i class='fa fa-times' style='font-size:40px;color:red'></i></a></td>";
				echo"</tr></tbody>";
			  }
			  echo"</table>";
			  
			  echo"</div>";

?>
<script type="text/JavaScript">
	function check()
	{
		return confirm("શું તમને ખાતરી છે?");
	}
</script>
<?php
	include("footer.php");
?>