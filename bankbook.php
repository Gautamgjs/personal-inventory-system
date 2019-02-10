<?php
	session_start();
	if (isset($_SESSION['uid']))
	{
		$id=$_SESSION['uid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>BANK_BOOK</title>

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
			<li><a href="updateprofile.php">Update Profile</a></li>
			<li><a href="logout.php">Log Out</a></li>
			
			</ul>
		</div>

	</div>

	<!-- content-wrap starts here -->
	<div id="content-wrap">
            
		<div id="main">
            
			<a name="Profile"></a>
			<div class="box">

				<h1>Bank <span class="gray">Book</span></h1>

                <p>
				  <table>
						<tr>
							<th></th>
							<th>Date From</th>
							<th>To</th>
							<th></th>
						</tr>
						<tr>
							<th>BANK_BOOK</th>
							<th><input type="date" name="from"></th>
							<th><input type="date" name="to"></th>
							<th><input type="submit" value="Show"></th>
						</tr>
						
				  <tr bgcolor="black">
					<th>S.No.</th>
					<th>Date</th>
					<th>Amount</th>
					<th>Pay/Recieve</th>
				  </tr>				  
				   <?php
					$db_host="localhost";
					$db_name="root";
					$db_pass="";
					$db_dbname="pis_gjs";
					
					
					$con=mysqli_connect($db_host,$db_name,$db_pass,$db_dbname);
					
				#	$db=mysql_select_db($db_dbname,$con);
					
					$sql="SELECT * FROM bank_book WHERE userid='$id' ";
					
					$data=mysqli_query($con,$sql);
					$d1=mysqli_num_rows($data);
					$counter=0;
					if($d1>0)
					{					
						$counter=0;
						while($row=mysqli_fetch_array($data))
							{$counter++;
						
						
					?>
					
					<tr>
					<td><?php echo"$counter";?></td>
					<td><?php echo $row['transaction_date'];?></td>
					<td><?php echo $row['amount'];?></td>
					<td><?php echo $row['operation'];?></td>
				  </tr>	 
				  <?php
						}
	}}
	
				?>
					<tr bgcolor="black">
						<th>Closing Balance</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>				  
				  
				  </table>
                </p>
      
			</div>

			

		</div>

        <div id="sidebar" >

			<h2 class="clear"><?php echo$_SESSION['uname'];?></h2>
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
		&copy; 2018 Worldsoft Technologies Pvt. Ltd. |
		<a href="#" >Developed </a> by <a href="#">Gautam</a>
       	</p>
	</div>


	<div class="footer-right">
		
	</div>

</div>
<!-- footer ends here -->

</body>
</html>