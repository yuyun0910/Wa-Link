<?php
session_start();
if(!empty($_SESSION['login']) && !empty($_SESSION['password'])) {
  if($_SESSION['login'] == 'yuyun' && $_SESSION['password'] == 'yuyun0910') {
    ?>
	
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon"  a href="icon.png" type="image/gif" sizes="12x12">
  <title>Wa-Link</title>

  <!-- Custom fonts for this template-->
  <link href="all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WA-LINK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-bookmark"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="add.php">
          <i class="fas fa-fw fa-phone"></i>
          <span>Add Friend</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="list.php">
          <i class="fas fa-fw fa-list"></i>
          <span>Friend List</span></a>
      </li>
	  
	  	  <hr class="sidebar-divider">
	        <li class="nav-item active">
        <a class="nav-link" href="logout.php">
		<i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
   <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Friendlist:</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <?php
             include 'model.php';
             $read = new wa;
             $page = $read->page1();
             $rows = $read->show();
             $capacity = $read->max_friend();
             if(!empty($rows)){
            foreach ($rows as $row ) {
             ?>
            <div class="table-responsive service">
            <table class="table table-bordered table-hover  mt-3 text-nowrap css-serial">
            <thead>
            <th>Number</th>
            <th>Friend's Name</th>
            <th>Address</th>
            <th>Mobile Phone Number</th>
            <th>Action</th>
            </thead>

            <tbody id="table-data">

                <tr>
                  <th scope="row"><?php echo $row['id'] ?></th>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['address'] ?></td>
                  <td><?php echo $row['number'] ?></td>
                  <td>&nbsp;<a href="edit.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-info">Edit
				  </button></a> &nbsp; <a href="hapus.php?id=<?php echo $row['id']; ?>">
				  <button type="button" class="btn btn-danger">Delete</button></a> &nbsp; 
				  <a href="chat.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success"> Chat 
				  </button></a></td>

                </tr>



            </tbody>
          </tbody>
<?php
}
}else{

echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
echo "<p><center>Blank Data</center></p>";
echo   "</div>";
echo "</div>";

}
?>
            </table>

             <nav aria-label="Page navigation example">
             <ul class="pagination">

               <?php
               //nav pagnation agar tidak menumpuk(Membatasi).


               for($x=1; $x<=$page ;$x++){
                 ?>
                 <li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
                 <?php
               }

               ?>



             </ul>
             </nav>
          </div>


          </div>
        </div>
        </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="jquery.min.js"></script>
  <script src="bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="chart-area-demo.js"></script>
  <script src="chart-pie-demo.js"></script>

</body>

</html>
<?php
} else {
  header("location:login.php?error=2");
}
} else {
  header("location:login.php?error=3");
}?>