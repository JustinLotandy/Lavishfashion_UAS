<?php
// Include koneksi ke database
include 'koneksi.php';

// Query untuk mengambil semua data barang
$query = "SELECT id_barang, modal_barang, harga_barang FROM barang";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Cek apakah ada baris data yang dihasilkan
    if (mysqli_num_rows($result) > 0) {
        // Loop untuk setiap baris data
        while ($row = mysqli_fetch_assoc($result)) {
            $id_barang = $row['id_barang'];
            $modal_barang = $row['modal_barang'];
            $harga_barang = $row['harga_barang'];

            // Hitung profit
            $profit = $harga_barang - $modal_barang;

            // Tampilkan hasil
            echo "ID Barang: $id_barang <br>";
            echo "Modal Barang: $modal_barang <br>";
            echo "Harga Jual: $harga_barang <br>";
            echo "Profit: $profit <br>";
            echo "--------------------- <br>";
        }
    } else {
        echo "Tidak ada data barang";
    }
} else {
    echo "Gagal mengambil data dari database";
}
?>
