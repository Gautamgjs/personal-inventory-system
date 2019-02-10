<?php
#expcatupdate.php
	if(isset($_REQUEST['update_btn']))
	{
		$id=$_REQUEST['category_id'];
		$name=$_REQUEST['category_name'];
		$details=$_REQUEST['category_detail'];

		$db_host="localhost";
		$db_user="root";
		$db_pass="";
		$db_name="pis_gjs";
		
		$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		
		
		echo$sql="UPDATE expensescategory SET exp_catname='$name',exp_catdetail='$details' WHERE exp_catid='$id'";
		
		$data=mysqli_query($con,$sql);
		
			header('Location:exp_cat.php?success=111');
	}
	else 
	{
		header('Location:exp_cat.php?error=111');
	}

?>