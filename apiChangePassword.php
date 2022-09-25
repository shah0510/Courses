<?php
session_start();
    include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	
    $OldPassword = md5($_POST['oldpswd']);
	$NewPassword = md5($_POST['newpswd']);
	$ConfirmPassword = md5($_POST['retypepswd']);
	$ID = $_SESSION["adminusername"];
    
	$qry1="SELECT COUNT(*) as cnt from pt_admin_login WHERE password ='".$OldPassword."' and id='".$ID."' ";
    $asd=mysqli_query($con,$qry1);
    $zxc=mysqli_fetch_array($asd);
	if($zxc["cnt"]==1){
        if ($OldPassword ==  $NewPassword){
            echo "OldPassword";
        }else if($NewPassword != $ConfirmPassword){
            echo "Mismatched";
        }
        else{
            $qry1=" UPDATE pt_admin_login SET password ='".$NewPassword."' WHERE id= '".$ID."' ";
            if($runi=mysqli_query($con,$qry1)){
                echo "Success";
            }
            else{
                echo "error";
            }
        }
    }else{
                          
        echo "Invalid";
    }
?>