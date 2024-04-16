<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>

  
       <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./Home.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category"><i ></i>Barang</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i data-feather="archive"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="menu-title">Barang</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./lihat-barang.php">Data Barang</a></li>
                <li class="nav-item"> <a class="nav-link" href="./input-barang.php">Tambah Barang</a></li>
              
              </ul>
            </div>
          </li>
        
          <li class="nav-item nav-category"><i ></i>Karyawan</li>
      <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
      <i data-feather="user"></i>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="menu-title">karyawan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="./lihat-karyawan.php">Data karyawan</a></li>
                <li class="nav-item"> <a class="nav-link" href="./input-karyawan.php">Tambah Karyawan</a></li>
              
        </ul>
      </div>
    </li>

   

          <li class="nav-item nav-category">Pembelian</li>
          <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
      <i data-feather="plus-square">></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="menu-title">Pembelian</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="./data-pembelian.php">Data Pembelian</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pembelian.php">Pembelian</a></li>
                
        </ul>
      </div>
    </li>
         
          <li class="nav-item nav-category">Profile</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User Profile</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="login.php"> Logout </a></li>
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/proBanner.js"></script>
<!-- <script src="../../assets/js/Chart.roundedBarCharts.js"></script> -->
<!-- End custom js for this page-->
</body>
</html>
      
</body>