<?php
include 'koneksi.php';
session_start();
?>
<?php include 'Header.php'?>
<?php include 'sidebar.php'?>
<?php 
$query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM karyawan");
 $data = mysqli_fetch_assoc($query);
 $sequence_number = $data['total'] + 1;
 $kode_staff = "KR -" . sprintf("%04d", $sequence_number);

 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah"])) {
$kode_karyawan = $_POST['kode_karyawan'];
$username_karyawan = $_POST['username_karyawan'];
$password_karyawan = md5($_POST['password_karyawan']);
$nama_karyawan = $_POST['nama_karyawan'];
$email_karyawan = $_POST['email_karyawan'];

 }
 ?>
<html>

<head>
 
    <title>Input karyawan </title>
</head>
<style>
   .letak {
      display: flex;
      justify-content: center;
   }
</style>
<body >
<div  class="main-panel" >
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card" >
              <div class="card">
                <div class="card-body" >
                <p><a href="lihat-karyawan.php"><button class="btn btn-info">Lihat karyawan</button></a></p>
                  <h4 class="card-title">Penambahan karyawan</h4>
            
                  </p>
                  <form class="forms-sample" name="input_data" method="POST" action="proses-input-karyawan.php" >
                    <div class="form-group">
                      <label for="exampleInputUsername1">Kode karyawan</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Kode karyawan" name="kode_karyawan" value="<?php echo $kode_staff; ?>"readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username karyawan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username karyawan" name="username_karyawan" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Email</label>
                      <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                        placeholder="Email" name="email_karyawan" required >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Password karyawan" name="password_karyawan" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama karyawan</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama karyawan" name="nama_karyawan" required>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary me-2" name="tambah" value="SIMPAN">Submit</button>
                  
                  </form>
                </div>
              </div>
            </div>

            <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/template.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
            
</body>

</html>