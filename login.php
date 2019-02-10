<?php

 if(isset($_POST['login_btn']))
	{
		$php_email=$_POST['username'];
		$php_pass=$_POST['userpass'];
		
		echo $php_email,$php_pass;
		
		$db_host="localhost";
		$db_name="root";
		$db_pass="";
		$db_dbname="pis_gjs";
		
		
		$con=mysqli_connect($db_host,$db_name,$db_pass,$db_dbname);
		
		#$db=mysql_select_db($db_dbname,$con);
		
		$sql="SELECT * FROM users WHERE email='$php_email' AND password='$php_pass'";
		
		$data=mysqli_query($con,$sql);
		
		$rowcount=mysqli_num_rows($data);
		if($rowcount>0)
			{
				$row=mysqli_fetch_array($data);
				echo"<pre>";
			#var_dump($row);
			echo"Login Success";
			session_start();
			$_SESSION['uid']=$row['userid'];
			$_SESSION['uname']=$row['name'];
			
			  header('location:welcome.php');
			
			}
		else
			{
				echo "login fail";
			}
	}
		
		else
			{
		      header('location:login.html?error=invalid request');
				
			}
	

?>