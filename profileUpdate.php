<?php
#profileUpdate.php
session_start();
	if(!isset($_SESSION['uid']))
	{
		header('Location:login.php?sessionnotset');
	}
		
		$id=$_SESSION['uid'];

$php_name=$_GET['htmlname'];
$php_phone=$_GET['htmlphone'];
$php_address=$_GET['htmladdress'];
echo $php_name,$php_phone,$php_address."<hr>";


#-------------------------------DataBase vairiable

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_dbname="pis_gjs";



#Connect to dbserver

$con=mysqli_connect($db_host,$db_user,$db_pass,$db_dbname);


#Connect to database
if($con)
{
	#$db=mysql_select_db($db_dbname,$con);
}


#Creating a Query
 $sql_update="UPDATE users SET name='$php_name', phone='$php_phone', address='$php_address' WHERE userid=$id";
 
 echo"<hr>".$sql_update."<hr>";
$data=mysqli_query($con,$sql_update);
mysqli_close($con);


if($data)
	{
		header('Location:userprofile.php');
	}
//	else
	//{
	//		header('location:userprofile.php');
		//}

?>