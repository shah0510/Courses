<?php 
session_start();
if(!isset($_SESSION["adminusername"])){
		header("Location:logout.php");
}
include("db_connect.php");
$db=new DB_Connect();
$con=$db->connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Company Details | PharmTrades</title>
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
                  <h4 class="card-title">Company Details</h4>
                  <p class="card-description" style="text-align:right;"><a href="pgAddCompany.php"> + Add new record </a></p>
                  <table id="tableData" class="table table-bordered">
            
                  </table>
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
	$(document).ready(function(){
		showData();
	});
	function showData(){
		$.ajax({
			type:"POST",
			url:"apiViewCompany.php",
			data:{},
			success:function(response){
				$("#tableData").html(response);
			}
		});
	}
	
	function deleteRecord(id){
		//alert(id);
		var ans= confirm("Are you sure to delete this record?");
		if(ans==true){
			$.ajax({
				type:"POST",
				url:"deleteCompany.php",
				data:{id:id},
				success:function(response){
					if($.trim(response)=="Success"){
						alert("Record deleted successfully");
						showData();
					}
					else
					{
						alert("Unable to delete the record, please re-try");
					}
				}
			});
		} 
	}


   function editRecord(id){
     window.location.href="pgEditCompany.php?var="+id;		
	}

	
</script>	
</body>

</html>
