<?php
include 'koneksi.php'?>
<?php include 'Header.php'?>
<?php include 'sidebar.php'?>

<html>

<head>
    <title>karyawan</title>
</head>

<style>
    
  </style>
<body>


    <?php
    $ambilid = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_karyawan = '$ambilid'");
    $data = mysqli_fetch_array($query);
    ?>

        <div class="main-panel" >
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <p><a href="lihat-karyawan.php"><button class="btn btn-warning">Lihat karyawan</button></a> </p>
                  <h4 style = "" class="card-title">Edit karyawan</h4>
            
                  </p>
    <form class="forms-sample" method="POST" action="proses-edit-karyawan.php" > <br>
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID karyawan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="id_karyawan" required value="<?php echo $data['id_karyawan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Kode karyawan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="kode_karyawan" required value="<?php echo $data['kode_karyawan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username karyawan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="username_karyawan" required value="<?php echo $data['username_karyawan']; ?>">
                    </div>
                   <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="password_karyawan" required value="<?php echo $data['password_karyawan']; ?>">
                    </div>-->
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama karyawan</label>
                      <input type="text" class="form-control" id="exampleInputPassword1"  name="nama_karyawan" required value="<?php echo $data['nama_karyawan']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Email karyawan</label>
                      <input type="text" class="form-control" id="exampleInputConfirmPassword1" name="email_karyawan" required value="<?php echo $data['email_karyawan']; ?>">
                    </div>
                    
                    <input class="btn btn-primary me-2" type="submit" name="ubah" value="UPDATE DATA"
                        onclick="return confirm('Apakah Anda yakin akan mengubah data?')">
    </form>
</body>

</html>