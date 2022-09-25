<?php 
session_start();
if(!isset($_SESSION["adminusername"])){
		header("Location:logout.php");
}
include("db_connect.php");
$db=new DB_Connect();
$con=$db->connect();




// $company_name=$_GET['company_name'];
// $mobile_no=$_GET['mobile_no'];
// $email_id=$_GET['email_id'];

$var=$_REQUEST['var'];
// echo $var;

$qry="Select * from pt_mr_details where id='".$var."'";  //getting the values
$run=mysqli_query($con,$qry);
$row=mysqli_fetch_row($run);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Doctor Details | PharmTrades</title>
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
	<?php
		include_once("navsidebarafterlogin.php");
	?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit MR Details</h4>
                  <div class="forms-sample">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
							<div class="form-group">
								<label for="txtName">MR Name</label>
								<input type="text" name="company_name" class="form-control" value="<?php echo "$row[1]"; ?>" id="txtName" placeholder="Company Name">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12">
							<div class="form-group">
								<label for="txtMobileNumber">Mobile Number</label>
								<input type="text" name="mobile_number" class="form-control"  value="<?php echo "$row[2]"; ?>" id="txtMobileNumber" placeholder="Mobile Number">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12">
							<div class="form-group">
								<label for="txtEmail">Email ID</label>
								<input type="text" name="email_id" class="form-control" id="txtEmail"  value="<?php echo "$row[3]"; ?>"  placeholder="Email ID">
							</div>
						</div>
					</div>
					<br>
					<button type="submit" name="submit" class="btn btn-primary me-2" id="btnSubmit" onclick="save();">Update</button>
				  </div>
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
  <!-- End custom js for this page-->
<script>
  function save(){

	        var id="<?php echo $var; ?>";

			if($("#txtName").val()==""){
				alert("Enter Company Name");
				$("#txtName").focus();
			}
			else if($("#txtMobileNumber").val()==""){
				alert("Enter Mobile Number");
				$("#txtMobileNumber").focus();
			}
			else if($("#txtEmail").val()==""){
				alert("Enter Email ID");
				$("#txtEmail").focus();
			}
			else{
				$.ajax({
					type:"POST",
					url:"apiEditMR.php",
					data:{mr_name:$("#txtName").val(),mobileno:$("#txtMobileNumber").val(),email:$("#txtEmail").val(),id:id},
					success:function(response){
						//alert(response);
						if($.trim(response)=="Success"){
							alert("Record updated successfully.");
							$("#txtName").val("");
							$("#txtMobileNumber").val("");							$("#txtEmail").val("");
						}
						else if($.trim(response)=="Error")
						{
							alert("Record not saved. Please re-try.");
						}
						else if($.trim(response)=="Exist")
						{
							alert("Mobile Number already in use.");
						}
						else
						{
							alert("Something went wrong. Please try after sometime");
				 		}
				 	}
				});

			}
		 }
	
</script>	
</body>

</html>
