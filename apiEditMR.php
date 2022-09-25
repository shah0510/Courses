<?php

	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$name=$_POST["mr_name"];
	$mobileno=$_POST["mobileno"];
	$email=$_POST["email"];
    $id=$_POST["id"];


	// $qry="Select count(*) as cnt from pt_company_details where id='".$id."'";
  $qry="update pt_mr_details set MR_name='".$name."',mobileno='".$mobileno."',email='".$email."' where id='".$id."'";   
 //	$result=mysqli_query($con,$qry);
 //	$row=mysqli_fetch_array($result);
	
	       
			if(mysqli_query($con,$qry))
			{
				echo "Success";
			}
			else{
				echo "Error";
			}
		
	

?>
