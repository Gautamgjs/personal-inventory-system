<?php
session_start();
$host="localhost";
$user="root";
$pass="";
$db_name="pis_gjs";
	$id=$_SESSION['uid'];
$con=mysqli_connect($host,$user,$pass,$db_name);

$sql="select * from expensescategory WHERE userid=$id";
$data=mysqli_query($con,$sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>expenses</title>

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
			<li ><a href="home.html">Home</a></li>
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

				<h1>EX <span class="gray">PENSES</span></h1>
				<form action="expensesdb.php" method="GET">
                <p>
				  <table>
					<tr><td></td>
					<th>Expenses :</th><td> <input type="text" name="expenses" ></td>
				  
				  
				  </tr>
				  
				  <tr><td></td>
					<th>Category :</th><td>
					<select name="categoryid">
					<option value="0">Select Category</option>
					<?php if(mysqli_num_rows($data)>0)
					{
						while($row=mysqli_fetch_array($data))
					
					{
					?>
					<option value="<?php echo $row['exp_catid'];?>">
					<?php echo $row['exp_catname'];?></option>
					<?php
					}
					}
					?>
					</select> 
				  </td>
				  </tr>
				  
				  <tr><td></td>
					<th>Amount :</th><td> <input type="text" name="amount">
				  </td>
				  </tr>
				  
				  <tr><td></td>
					<th>Recieve :</th><td><select name="type_payment">
									<option value="cash">Cash</option>
									<option value="credit">credit/debit</option>
									<option value="paytm">paytm</option>
									<option value="tez">tez</option>
					</td>
				  
				  </tr>
				  <tr><td></td>
					<th>Date : </th><td><input type="date" name="date"></td>
				  <td></td>
				  </tr>
				  <tr><td></td>
					<th>
						Remark :</th><td><input type="text" name="remark">
					
					</td>
				  </tr>
				<tr><th></th>
				<td><input type="submit" name="add_exp" value="ADD Expenses">
				<input type="reset" name="cancle_btn" value="Cancle"></td>
				</tr>
				  
				  
				  </table>
                </p>

                </form>
				
			</div>

			

		</div>

        <div id="sidebar" >

			<h2 class="clear">Master</h2>
			<ul class="sidemenu">
				<li><a href="expensescategory.html">Expenses Category</a></li>
				<li id="current"><a href="incomecategory.html">Income Category</a></li>
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
