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

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h1 class="h3 mb-0 text-gray-800">Editing Data</h1>
                </div>
                <?php
                include 'model.php';
                //mengambil data

                $id = $_REQUEST['id'];
                $row = $objek_wa->edit($id);




                ?>
                <!-- Card Body -->
                <div class="card-body">

                  <form name='send'  method='post'>


                  <div class="row ml-5 mb-2">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                      <p><b>Friend's Name:</b></p>
                    <input class="form-control" type="text" name='name' placeholder="Name..." value="<?php echo $row['name']; ?>" required>
                    </div>

                    <div class="col-md-5 col-sm-12 col-xs-12">
                      <p><b>Address:</b></p>
                      <input class="form-control" type="text" name='address' placeholder="Address..." value="<?php echo $row['address']; ?>" required>
                    </div>
                  </div>

                  <div class="row ml-5 mb-4">

                    <div class="col-md-5 col-sm-12 col-xs-12">
                      <p><b>Mobile Phone Number:</b></p>
                    <input class="form-control" type="number" name='number' placeholder="Mobile Phone Number..." value="<?php echo $row['number']; ?>" required>
                    </div>

                  <div class="col-md-5 col-sm-12 col-xs-12 mt-4">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" name='change'>Send</button>


                  </div>


                  </div>




                  </form>

      <?php

      if(isset($_POST['change'])){
      $data['id'] = $_GET['id'];
      $data['name'] = $_POST['name'];
      $data['address'] = $_POST['address'];
      $data['number'] = $_POST['number'];

      $update = $objek_wa->update($data);


      if($update){

                                    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                                       echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                                      echo "<p><center>Update Successfully</center></p>";
                                       echo   "</div>";
                                       echo "</div>";
      }else{

                                    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                                       echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                                      echo "<p><center>Failed to Update</center></p>";
                                       echo   "</div>";
                                       echo "</div>";
      }

      }

      ?>



                </div>

            </div>


          </div>



      </div>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->



  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span><p class="mb-1">Copyright &copy; <a style="text-decoration: none;"><b>Agung, Noel, Yuyun</b></a></p></span><br>
      </div>
    </div>
  </footer>

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