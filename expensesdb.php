<?php
#expensesdb.php

session_start();
if (isset($_SESSION['uid']))
	{
		$id=$_SESSION['uid'];

		$name=$_GET['expenses'];
$category=$_GET['categoryid'];
$amount=$_GET['amount'];
$recieve=$_GET['type_payment'];
$date=$_GET['date'];
$remark=$_GET['remark'];

#echo $id,$name,$category,$amount,$recieve,$date,$remark."<hr>";

$host="localhost";
$user="root";
$pass="";
$db_name="pis_gjs";

$con=mysqli_connect($host,$user,$pass,$db_name);

$sql_insert="INSERT INTO expenses(exp,userid, exp_catid, amount, transaction_date, pay_by, remark) VALUES ( '$name',$id,'$category',$amount,'$date','$recieve','$remark')";

#echo"<hr>".$sql_insert."<hr>";

$data=mysqli_query($con,$sql_insert);

if($recieve=="cash")
{
	 echo $sql_cash="INSERT INTO cash_book( account, transation_date, amount, userid, opertion) VALUES ('$name','$date',$amount,$id,'Pay')";
	
	$data=mysqli_query($con,$sql_cash);
}
else
	{	
$sql_cash="INSERT INTO bank_book(account, transaction_date, amount, userid, operation) VALUES ('$name','$date',$amount,$id,'Pay')";
	$data=mysqli_query($con,$sql_cash);
	}
mysqli_close($con);
header('Location:expenses.php?success');
	   
	  // else{
		//   echo"Invalid Request";
	   }

?>