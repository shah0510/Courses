<?php
session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
	//$id=$_POST["ID"];
	$qry="Select * from pt_mr_details order by MR_name";
	//echo $qry;
	$run=mysqli_query($con,$qry);

	$i=0;
	$table="";
	$table.="<thead><tr><th width='5%'>#</th><th width='35%'>Name</th><th width='20%'>Mobile Number</th><th width='30%'>Email ID</th><th width='5%'>Edit</th><th width='5%'>Delete</th></tr></thead><tbody>";
	while($row=mysqli_fetch_array($run)){
		$i++;
		$table.="<tr>";
		$table.="<td>".$i."</td>"; 
		$table.="<td>".$row["MR_name"]."</td>";
		$table.="<td>".$row["mobileno"]."</td>";
		$table.="<td>".$row["email"]."</td>";
		$table.="<td style='text-align:center;'><a href='javascript:void(0)' onclick='editRecord(".$row["id"].")'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
		$table.="<td style='text-align:center;'><a href='javascript:void(0)' onclick='deleteRecord(".$row["id"].")'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
		$table.="</tr>";
	}
	if ($i==0)
	{
		$table.="<tr><td colspan='6'>No record found</td></tr>";
	}
	$table.="</tbody>";
	echo $table;
?>
