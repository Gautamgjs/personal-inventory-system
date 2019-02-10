<?php
	session_start();
	$flagFA=false;
	
	$row="";
	if(isset($_GET['act']) && $_GET['act']=="edit")
	{
		$flagFA=true;
		
		
		
	 
					$db_host="localhost";
					$db_name="root";
					$db_pass="";
					$db_dbname="pis_gjs";
					 
					$con=mysqli_connect($db_host,$db_name,$db_pass,$db_dbname);
					$id=$_GET['id']; 
					$sql="SELECT * FROM incomecategory WHERE inc_catid='$id' ";
					
					$data=mysqli_query($con,$sql);
					$d1=mysqli_num_rows($data);
					
					if($d1>0)
					{
						$row=mysqli_fetch_array($data);
					}
				  
	}
	
	if(isset($_GET['act']) && $_GET['act']=="del")
	{
					$db_host="localhost";
					$db_name="root";
					$db_pass="";
					$db_dbname="pis_gjs";
					 
					$con=mysqli_connect($db_host,$db_name,$db_pass,$db_dbname);
					$id=$_GET['id'];
	$sqldel="DELETE  FROM incomecategory WHERE inc_catid='$id' ";
	$data=mysqli_query($con,$sqldel);
	header('Location:inc_cat.php?success=recordDelete');
	}
	
	
	
	
	
	
	
	
	if (isset($_SESSION['uid']))
	{
		$id=$_SESSION['uid'];
		
		
		
		
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>incomecategory</title>

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

				<h1>Income <span class="gray">Category</span></h1>
				<form action="incomecategory.php" method="POST">
                <p>
				   
				   
				  <table>
				  <table>
					<tr>
					<th>Category Name : <input type="text" value="<?php if($flagFA){ echo $row['inc_catname']; }?>" name="category_name" ></th>
				  
				  <td></td>
				  </tr>
				  
				  <tr>
					<th>Category Detail: <input type="text" value="<?php if($flagFA){ echo $row['inc_catdetail']; }?>" name="category_detail"></th>
				  <td></td>
				  </tr>
				  
				<tr>
				<td align="right">
				<?php 
				if($flagFA){					
				?>	
				<input type="hidden" value="<?php   echo $row['inc_catid']; ?>" name="category_id" >
				<input type="submit" name="update_btn" value="UPDATE" formaction="inccatupdate.php">
				<?php }
				   else
				   {
				?>
				<input type="submit" name="add_btn" value="ADD">
				   <?php }
				   ?>
				<input type="reset" name="cancle_btn" value="Cancle"></td><td></td>
				</tr>
				  
				  
				 
               
               </form>
				</table>
				 
			   <hr>
			   <p align="left">
				<table border="1px">
				<tr>
					<th>Category Name</th>
					
					<th>Category Detail</th>
					
					<th>Edit</th>
				     
					<th>Delete</th>
					</tr>
				  <?php
					$db_host="localhost";
					$db_name="root";
					$db_pass="";
					$db_dbname="pis_gjs";
					
					
					$con=mysqli_connect($db_host,$db_name,$db_pass,$db_dbname);
					
				#	$db=mysql_select_db($db_dbname,$con);
					
					$sql="SELECT * FROM incomecategory WHERE userid=$id ";
					
					$data=mysqli_query($con,$sql);
					$d1=mysqli_num_rows($data);
					if($d1>0)
					{
						while($row=mysqli_fetch_array($data))
						{
					
					?>
					
					
					<tr>
					<td><?php echo$row['inc_catname'];?></td>
					<td><?php echo$row['inc_catdetail'];?></td>
					<td><a href="inc_cat.php?act=edit&id=<?php echo$row['inc_catid'];?>">Edit</a></td>
					<td><a href="inc_cat.php?act=del&id=<?php echo$row['inc_catid'];?>">Delete</a></td>
					</tr>
					<?php
						}
					?>
				</table></p>
				 </table>
				 </p>
			</div>
 <?php
						}
						}
	
				?>
			

		</div>

        <div id="sidebar" >

			<h2 class="clear"><?php echo$_SESSION['uname'];?></h2>
			<ul class="sidemenu">
				<li><a href="exp_cat.php">Expenses Category</a></li>
				<li id="current"><a href="inc_cat.php">Income Category</a></li>
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
