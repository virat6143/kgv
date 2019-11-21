
   <style type="text/css">
        .img{
            padding: 8px 7px 7px 7px; border-radius:4px; 
            height:200px;
            width:175px;
        }
		</style>
<?php
			include "connect.php";
			$qr="select * from  gellary";
			$qry=mysqli_query($con,$qr);
			$data2=mysqli_num_rows($qry); 
			echo"<div class='container'>";
			
			 echo"<table class='table table-bordered'>";
			 //echo"<thead><tr><th></th><tr></thead>";
			 //echo"<div class='row'>";
			 $i=0;
			  while($ar=mysqli_fetch_assoc($qry))
			  {
			    if($i%5==0)
				{
				  echo "<thead><tbody><tr>";
				}
				$a=$ar["Imag"];
				$im='<img src="'.$a.'"class="img img-thumbnail img-responsive"/>';
				//echo"<td><div class='col-sm-2'>".$im."</div></td>";
				echo"<td>".$im."<br></br>";
			    echo"<a href='delete_gellary.php?no=".$ar["id"]."' onclick='return check();'><p style='text-align:center'>Delete</p></a></td>";
				if($i%5==4)
				{
					echo "</tr></tbody></thead>";
				}
				$i++;
			  }

			  //echo"</div>";
			  echo"</table>";
			echo"</div>";
			
				
?>
<script type="text/JavaScript">
	function check()
	{
		return confirm("Are You Sure delete record?");
	}
</script>
