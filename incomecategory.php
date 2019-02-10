<?php
#incomecategory.php
if(isset($_POST['add_btn']))

	session_start();
	$php_catname=$_POST['category_name'];
	$php_catdetail=$_POST['category_detail'];
	$uid=$_SESSION['uid'];
	echo $php_catname,$php_catdetail,$uid;
	
	$db_host="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="pis_gjs";
	
	$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	
	$sql_insert="INSERT INTO incomecategory(inc_catname, inc_catdetail,userid) VALUES ('$php_catname','$php_catdetail',$uid)";
	
	echo"<hr>".$sql_insert."<hr>";
	
	$data=mysqli_query($con,$sql_insert);
	mysqli_close($con);
	
	if($data)
		{
			header('location:inc_cat.php');
		}
	else
		{
			header('location:incomecategory.html');
		}
?>