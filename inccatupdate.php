<?php
if(isset($_REQUEST['update_btn']))
{ 
$id=$_REQUEST['category_id'];
$name=$_REQUEST['category_name'];
$details=$_REQUEST['category_detail'];
	$db_host="localhost";
					$db_name="root";
					$db_pass="";
					$db_dbname="pis_gjs";
					 
					$con=mysqli_connect($db_host,$db_name,$db_pass,$db_dbname);
					 
					$sql="UPDATE incomecategory SET inc_catname='$name', inc_catdetail='$details' WHERE inc_catid='$id' ";
					
					$data=mysqli_query($con,$sql);
					 header('Location:inc_cat.php?success=101');
}
else{
	 header('Location:inc_cat.php?error=101');
}
	?>