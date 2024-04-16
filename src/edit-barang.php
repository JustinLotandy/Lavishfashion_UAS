<?php
include 'koneksi.php'?>
<?php include 'Header.php'?>
<?php include 'sidebar.php'?>

<html>

<head>
    <title>Barang</title>
</head>

<style>
    
  </style>
<body>


    <?php
    $ambilid = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$ambilid'");
    $data = mysqli_fetch_array($query);
    ?>

        <div class="main-panel" >
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <p><a href="lihat-barang.php"><button class="btn btn-warning">Lihat Barang</button></a> </p>
                  <h4 style = "" class="card-title">Edit Barang</h4>
            
                  </p>
    <form class="forms-sample" method="POST" action="proses-edit-barang.php" > <br>
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID barang</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="id_barang" required value="<?php echo $data['id_barang']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Kode Barang</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="kode_barang" required value="<?php echo $data['kode_barang']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_barang" required value="<?php echo $data['nama_barang']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Modal Barang</label>
                      <input type="text" class="form-control" id="exampleInputPassword1"  name="modal_barang" required value="<?php echo $data['harga_barang']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Harga Barang</label>
                      <input type="text" class="form-control" id="exampleInputPassword1"  name="harga_barang" required value="<?php echo $data['harga_barang']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Jumlah Barang</label>
                      <input type="text" class="form-control" id="exampleInputConfirmPassword1" name="jumlah_barang" required value="<?php echo $data['jumlah_barang']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Kategori Barang</label>
                      <select class="form-control "  name="kategori_barang" aria-labelledby="dropdownMenuButton2">
                        <option> Baju Pria </option>
                        <option> Baju Wanita </option>
                        <option> Baju anak-anak </option>
                    </select>
                    </div>
                    <input class="btn btn-primary me-2" type="submit" name="ubah" value="UPDATE DATA"
                        onclick="return confirm('Apakah Anda yakin akan mengubah data?')">
    </form>
</body>

</html>