<?php 
session_start();
	if(!isset($_SESSION["adminusername"])){
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Change Password | PharmTrades</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
		include_once("navafterlogin.php");
	?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     
	  <?php
		include_once("navsidebarafterlogin.php");
	?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Change Password</h4>
                
                    <div class="form-group">
                      <label for="txtOldPassword">Old Password</label>
                      <input type="password" class="form-control" id="txtOldPassword" placeholder="Old Password">
                    </div>
					<div class="form-group">
                      <label for="txtNewPassword">New Password</label>
                      <input type="password" class="form-control" id="txtNewPassword" placeholder="New Password">
                    </div>
                    <div class="form-group">
                      <label for="txtConfirmPassword">Confirm Password</label>
                      <input type="password" class="form-control" id="txtConfirmPassword" placeholder="Confirm Password">
                    </div>
                    <button type="submit" onclick="chgpswd();" class="btn btn-success me-2">Change Password</button>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       <?php
		include_once("footerafterlogin.php");
	?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
      <script>
$(document).ready(function(){
	
});
  function chgpswd(){
			if($("#txtOldPassword").val()==""){
				alert("Enter Old Password");
				$("#txtOldPassword").focus();
			}
			else if($("#txtNewPassword").val()==""){
				alert("Enter New Password");
				$("#txtNewPassword").focus();
			}
			else if($("#txtConfirmPassword").val()==""){
				alert("Enter Confirm Password");
				$("#txtConfirmPassword").focus();
			}
			else if($("#txtConfirmPassword").val()!=$("#txtNewPassword").val()){
				alert("Password mis-match, enter the same new password");
				$("#txtConfirmPassword").focus();
			}
			else if($("#txtOldPassword").val()==$("#txtNewPassword").val()){
				alert("New and Old password cannot be same");
				$("#txtNewPassword").val()="";
				$("#txtConfirmPassword").val()="";
				$("#txtNewPassword").focus();
			}
			else{
				$.ajax({
					type:"POST",
					url:"apiChangePassword.php",
					data:{oldpswd:$("#txtOldPassword").val(),newpswd:$("#txtNewPassword").val(),retypepswd:$("#txtConfirmPassword").val()},
					success:function(response){
						//alert(response);
						if($.trim(response)=="Success"){
							alert("Password Changed Successfully. Please Login Again With Your New Password.");
							$("#txtOldPassword").val("");
							$("#txtNewPassword").val("");
							$("#txtConfirmPassword").val("");
							
							window.location.href="logout.php";
						}
						else if($.trim(response)=="OldPassword"){
							alert("Old Password and New Password cannot be same");
							$("#txtNewPassword").focus();
						}else if($.trim(response)=="Mismatched"){
							alert("Password Mismatched");
							$("#txtConfirmPassword").focus();
						}else if($.trim(response)=="Invalid"){
							alert("Invalid old password");
							$("#txtOldPassword").focus();
						}else{
							alert("Something Went Wrong. Please Try After Sometime");
						}
					}
				});
			}
		 }
	
</script>	
</body>

</html>
