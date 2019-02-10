<?php
	session_start();
	if(!isset($_SESSION['uid']))
	{
		header('Location:login.php');
	}
		
		$id=$_SESSION['uid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>PIS</title>

<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="author" content="Erwin Aligam - styleshout.com" />
<meta name="description" content="Site Description Here" />
<meta name="keywords" content="keywords, here" />
<meta name="robots" content="index, follow, noarchive" />
<meta name="googlebot" content="noarchive" />

<link rel="stylesheet" type="text/css" media="screen" href="images/Azulmedia.css" />

</head>

<body>
<!-- wrap starts here -->
<div id="wrap">

	<div id="header">
                
		<h1 id="logo">Inventory<span class="gray">System</span></h1>
		<h2 id="slogan">Personal</h2>

		<!-- Menu Tabs -->
		<div id="menu">
			<ul>
			<li ><a href="welcome.php">Home</a></li>
			<li><a href="userprofile.php">Profile</a></li>
			<li  id="current"><a href="updateprofile.php">Update Profile</a></li>
			<li><a href="logout.php">Log Out</a></li>
			
			</ul>
		</div>

	</div>

	<!-- content-wrap starts here -->
	<div id="content-wrap">
            				  <?php
					$db_host="localhost";
					$db_name="root";
					$db_pass="";
					$db_dbname="pis_gjs";
					
					
					$con=mysqli_connect($db_host,$db_name,$db_pass,$db_dbname);
					
					#$db=mysql_select_db($db_dbname,$con);
					
					$sql="SELECT * FROM users WHERE userid='$id' ";
					
					$data=mysqli_query($con,$sql);
					$d1=mysqli_num_rows($data);
					if($d1>0)
					{
						$row=mysqli_fetch_array($data)
						
					?>
		<div id="main">
            
			<a name="Profile"></a>
			<div class="box">

				<h1>User <span class="gray">Profile</span></h1>

                <p><form action="profileUpdate.php" method="GET">
                <table cellpadding=5px cellspacing=10px>
					<tr>
						<th>Name</th>
						<td>
							<input type="text" name="htmlname" value="<?php echo$row['name'];?>" placeholder="Enter Your Name ">
						</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>
							<input type="email" name="htmlemail" value="<?php echo$row['email'];?>" placeholder="Enter Your Login Email ">
						</td>
					</tr>
					
					<tr>
						<th>Phone No.</th>
						<td>
						<input type="number" name="htmlphone" value="<?php echo$row['phone'];?>" placeholder="Enter Phone Number ">
						</td>
					</tr>
					<tr>
						<th>Address </th>
						<td>
						 <textarea name="htmladdress"><?php echo$row['address'];?></textarea>
						</td>
					</tr>
					
					<tr>
						
						<td>
							<input type="submit" name="btn" value="Update Profile">
						</td>
						
					</tr>
                </table>
				</form>
				   
                </p>

                
					<?php  } ?>
				

			</div>

			

		</div>

        <div id="sidebar" >

			<h2 class="clear">Master</h2>
			<ul class="sidemenu">
				<li><a href="exp_cat.php">Expenses Category</a></li>
				<li><a href="inc_cat.php">Income Category</a></li>
				<li><a href="expenses.php">Expenses</a></li>
				<li><a href="income.php">Income</a></li>
				<li><a href="cashbook.php">Cash Book</a></li>
				<li><a href="bankbook.php">Bank Book</a></li>
				<li><a href="daybook.php">Day Book</a></li>
				<li><a href="balancesheet.php">Balance Sheet</a></li>
			</ul>

			

			
			

		</div>

	<br />
    <div class="clear"></div>
	<!-- content-wrap ends here -->
	</div>

<!-- wrap ends here -->
</div>

<!-- footer starts here -->
<div id="footer-wrap">

	<div class="footer-left">
		<p class="align-left">
		&copy; 2010 Company Name |
		<a href="http://www.bluewebtemplates.com/" title="Website Templates">website templates</a> by <a href="http://www.styleshout.com/">styleshout</a>
       	</p>
	</div>

	<div class="footer-right">
		
	</div>

</div>
<!-- footer ends here -->

</body>
</html>
