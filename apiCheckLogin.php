<?php
	session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	
	$qry="select count(*) as cnt from pt_admin_login where username='".$username."' and password='".$password."'" ;
	$count=0;
	$run=mysqli_query($con,$qry);
	$result=mysqli_fetch_array($run);
	if($result["cnt"]>0)
	{
		$qry1="select id,status from pt_admin_login where username='".$username."' and password='".$password."'" ;
		$run1=mysqli_query($con,$qry1);
		$result1=mysqli_fetch_array($run1);
		if ($result1["status"]=="on")
		{
			$_SESSION["adminusername"]=$result1["id"];
			echo "success";
		}
		else
		{
			echo "blocked";
		}
	}
	else{
		echo "error".$qry;
	}
?>