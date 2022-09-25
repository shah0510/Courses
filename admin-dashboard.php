<?php 
session_start();
if(!isset($_SESSION["adminusername"])){
	header("Location:logout.php");
}
	date_default_timezone_set("Asia/Kolkata");
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
/*	//Count total customers
	$qry1="Select count(*) as custcnt from PRI_Customer_Info";
	$run1=mysqli_query($con,$qry1);
	$row1=mysqli_fetch_array($run1);
	$customer_count = $row1["custcnt"];
	//Count total invoices
	$qry2="SELECT count(id) as invcnt FROM PRI_Order_Info";
	$run2=mysqli_query($con,$qry2);
	$row2=mysqli_fetch_array($run2);
	$invoice_count = $row2["invcnt"];
	//Count total quotations
	$qry3="SELECT count(id) as quocnt FROM PRI_Quotation_Info";
	$run3=mysqli_query($con,$qry3);
	$row3=mysqli_fetch_array($run3);
	$quotation_count = $row3["quocnt"];
	//Count total reminders for today
	$qry4="SELECT count(id) as remcnt FROM PRI_Quotation_Info where next_followup_date='".date("Y-m-d")."'";
	$run4=mysqli_query($con,$qry4);
	$row4=mysqli_fetch_array($run4);
	$reminder_count = $row4["remcnt"];
  //Max Invoice Number
	$qry5="SELECT invoice_number FROM PRI_Order_Info where ID=(select MAX(ID) from PRI_Order_Info)";
	$run5=mysqli_query($con,$qry5);
	$row5=mysqli_fetch_array($run5);
	$last_invoice = $row5["invoice_number"];
  //Max Quotation Number
	$qry6="SELECT our_ref FROM PRI_Quotation_Info where ID=(select MAX(ID) from PRI_Quotation_Info)";
	$run6=mysqli_query($con,$qry6);
	$row6=mysqli_fetch_array($run6);
	$last_quotation = $row6["our_ref"];
  //Max Quotation Number
	$qry7="SELECT sum(final_amount) as total FROM PRI_Order_Info";
	$run7=mysqli_query($con,$qry7);
	$row7=mysqli_fetch_array($run7);
	$total_sales = $row7["total"];*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JOBS</title>
  <!-- plugins:css -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
	<style>
		.amt {
			text-align:right;
		}
		.head {
			text-align:center;
		}
	</style>
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
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Admin Dashboard</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Post a job</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php //echo $customer_count; ?></h3>
					<i class="fa fa-user-md icon-md text-muted mb-0 mb-md-3 mb-xl-0" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Jobs available</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php //echo $invoice_count; ?></h3>
                    <i class="fa fa-building icon-md text-muted mb-0 mb-md-3 mb-xl-0" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">MR</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php //echo $quotation_count; ?></h3>
					<i class="fa fa-medkit icon-md text-muted mb-0 mb-md-3 mb-xl-0" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Demo</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php //echo $reminder_count; ?></h3>
                    <i class="fa fa-building icon-md text-muted mb-0 mb-md-3 mb-xl-0" aria-hidden="true"></i>
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
  <!-- Plugin js for this page-->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <!--<script src="js/chart.js"></script>-->
  <!-- End custom js for this page-->
</body>

</html>

