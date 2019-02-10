<?php
#registration.php


$php_name=$_GET['htmlname'];
$php_email=$_GET['htmlemail'];
$php_pass=$_GET['htmlpass'];

$php_phone=$_GET['htmlphone'];
$php_address=$_GET['htmladdress'];
echo $php_name,$php_email,$php_pass,$php_phone,$php_address."<hr>";


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
	#$db=mysqli_select_db($db_dbname,$con);



#Creating a Query
 $sql_insert="INSERT INTO users(name,email,password,phone,address)VALUES('$php_name','$php_email','$php_pass','$php_phone','$php_address')";
 
 echo"<hr>".$sql_insert."<hr>";

 
 $data=mysqli_query($con,$sql_insert);
mysqli_close($con);


if($data)
	{
		header('Location:login.html');
	}
	else
		{
			header('location:registration.html');
		}
}
?>