<?php
	session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();

	$qry="delete from pt_company_details where id='".$_POST["id"]."'";	
	if(mysqli_query($con,$qry)){
		echo "Success";
	}
	else{
		echo "Error";
	}
?>