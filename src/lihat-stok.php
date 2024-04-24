<?php
include 'koneksi.php'; // Koneksi ke database

// Query SQL untuk mengambil data barang dengan jumlah kurang dari 10
$query = "SELECT * FROM barang WHERE jumlah_barang < 10";
$result = mysqli_query($koneksi, $query);

// Include file header dan sidebar jika diperlukan
include 'Header.php';
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang dengan Jumlah Kurang dari 10</title>
    <!-- Link ke file CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Link ke library Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <!-- Konten halaman -->
    <div class="container">
        <h1 class="my-4">Data Barang dengan Jumlah Kurang dari 10</h1>
        <!-- Tabel untuk menampilkan data barang -->
        <a href="input-barang.php"><button type="button" class="btn btn-info">Tambah Item</button></a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Kategori Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop untuk menampilkan data barang dari hasil query
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <!-- Kolom-kolom data barang -->
                        <td><?php echo $data['kode_barang']; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td>Rp <?php echo number_format($data['harga_barang']); ?></td>
                        <td><?php echo $data['jumlah_barang']; ?></td>
                        <td><?php echo $data['kategori_barang']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Script untuk mengganti ikon Feather Icons -->
    <script>
        feather.replace();
    </script>
</body>
</html>
