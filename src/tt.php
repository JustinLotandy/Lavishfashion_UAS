<?php
include 'koneksi.php';
session_start();

// Query untuk mendapatkan daftar kategori
$kategori_query = mysqli_query($koneksi, "SELECT DISTINCT kategori_barang FROM barang");
$kategoris = [];
while ($row = mysqli_fetch_assoc($kategori_query)) {
    $kategoris[] = $row['kategori_barang'];
}

// Inisialisasi variabel pencarian
$keyword = '';
$kategori = '';

// Cek apakah form pencarian telah disubmit
if (isset($_GET['btnSearch'])) {
    // Tangkap nilai keyword dari form pencarian
    $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($koneksi, $_GET['keyword']) : '';

    // Tangkap nilai kategori dari form pencarian
    $kategori = isset($_GET['kategori']) ? mysqli_real_escape_string($koneksi, $_GET['kategori']) : '';

    // Query pencarian berdasarkan keyword dan kategori
    $sql = "SELECT * FROM barang WHERE 1=1";
    if (!empty($keyword)) {
        $sql .= " AND nama_barang LIKE '%$keyword%'";
    }
    if (!empty($kategori)) {
        $sql .= " AND kategori_barang = '$kategori'";
    }

    // Eksekusi query pencarian
    $query = mysqli_query($koneksi, $sql);
} else {
    // Jika form pencarian belum disubmit, tampilkan semua barang
    $query = mysqli_query($koneksi, "SELECT * FROM barang");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Barang</title>
</head>
<body>
    <form class="search-form" action="#" method="GET">
        <input type="search" class="form-control" placeholder="Search Here" title="Search here" name="keyword">
        <select name="kategori">
            <option value="">Semua Kategori</option>
            <?php foreach($kategoris as $kategori_item) { ?>
                <option value="<?php echo $kategori_item; ?>" <?php if ($kategori == $kategori_item) echo 'selected'; ?>>
                    <?php echo $kategori_item; ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit" name="btnSearch">Cari</button>
    </form>

    <div class="container">
        <?php
        if(mysqli_num_rows($query) > 0) {
            while($data = mysqli_fetch_assoc($query)) {
                echo '<div class="barang">';
                echo '<h3>' . $data['nama_barang'] . '</h3>';
                echo '<p>Kode Barang: ' . $data['kode_barang'] . '</p>';
                echo '<p>Harga Barang: ' . number_format($data['harga_barang']) . '</p>';
                echo '<p>Jumlah Barang: ' . $data['jumlah_barang'] . '</p>';
                echo '<button onclick="showDetail(' . $data['id_barang'] . ')">Jual</button>';
                echo '</div>';
            }
        } else {
            echo "Barang tidak ditemukan.";
        }
        ?>
    </div>

    <script>
        function showDetail(id_barang) {
            // Tambahkan logika untuk menampilkan detail barang sesuai id_barang
        }
    </script>
</body>
</html>
