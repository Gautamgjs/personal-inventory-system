<?php
#incomedb.php

session_start();
if(isset($_SESSION['uid']));
       {
			$id=$_SESSION['uid'];
	   
$name=$_GET['income'];
$category=$_GET['categoryid'];
$amount=$_GET['amount'];
$recieve=$_GET['type_payment'];
$date=$_GET['date'];
$remark=$_GET['remark'];


# $name,$category,$amount,$recieve,$date,$remark."<hr>";

$host="localhost";
$user="root";
$pass="";
$db_name="pis_gjs";

$con=mysqli_connect($host,$user,$pass,$db_name);

 $sql_insert="INSERT INTO income(userid,income,inc_catid,amount,transaction_date,recieve_by,remarks) VALUES ($id,'$name','$category',$amount,'$recieve','$date','$remark')";

#echo"<hr>".$sql_insert."<hr>";

$data=mysqli_query($con,$sql_insert);

if($recieve=="cash")
{
	 $sql_cash="INSERT INTO cash_book( account, transation_date, amount, userid, opertion) VALUES ('$name','$date',$amount,$id,'Recieve')";
	
	$data=mysqli_query($con,$sql_cash);
}
else
	{	echo "else"; 
echo$sql_cash="INSERT INTO bank_book(account, transaction_date, amount, userid, operation
) VALUES ('$name','$date',$amount,$id,'Recieve')";
	$data=mysqli_query($con,$sql_cash);
	}
mysqli_close($con);
header('Location:income.php?success');
	   
	  // else{
		//   echo"Invalid Request";
	   }
?>