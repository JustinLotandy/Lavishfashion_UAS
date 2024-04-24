<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    // Query SQL untuk mengambil modal_barang dan harga_barang dari tabel barang
    $query_barang = mysqli_query($koneksi, "SELECT modal_barang, harga_barang FROM barang WHERE id_barang = $id_barang");

    // Penanganan kesalahan jika query gagal dieksekusi
    if (!$query_barang) {
        die("Query barang failed: " . mysqli_error($koneksi));
    }

    if(mysqli_num_rows($query_barang) > 0) {
        $data_barang = mysqli_fetch_assoc($query_barang);
        $modal_barang = $data_barang['modal_barang'];
        $harga_barang = $data_barang['harga_barang'];

        // Query SQL untuk mengambil data pembelian
        $query_pembelian = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_barang = $id_barang");

        // Penanganan kesalahan jika query pembelian gagal dieksekusi
        if (!$query_pembelian) {
            die("Query pembelian failed: " . mysqli_error($koneksi));
        }

        if(mysqli_num_rows($query_pembelian) > 0) {
            $data_pembelian = mysqli_fetch_assoc($query_pembelian);
            $profit = $harga_barang - $modal_barang;

            // Tampilkan detail barang beserta profit
            echo '<div style="background-color: #f7f7f7; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif; line-height: 1.8; text-align: justify;">';
            echo '<h2 style="margin-bottom: 20px; font-size: 24px; text-align: center;">Detail Barang</h2>';
            echo '<div style="margin-bottom: 10px;">';
            echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">ID Pembelian:</strong> ' . $data_pembelian['id_pembelian'] . '<br>';
            echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Nama Barang:</strong> ' . $data_pembelian['nama_barang'] . '<br>';
            echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Modal Barang:</strong> Rp ' . number_format($modal_barang, 0, ',', '.') . '<br>';
            echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Harga Barang:</strong> Rp ' . number_format($harga_barang, 0, ',', '.') . '<br>';
            echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Profit:</strong> Rp ' . number_format($profit, 0, ',', '.') . '<br>'; // Tampilkan profit
            echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Jumlah Pembelian:</strong> ' . $data_pembelian['jumlah_pembelian'] . '<br>';
            echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Waktu Pembelian:</strong> ' . $data_pembelian['waktu_pembelian'] . '<br>';
            
            echo '</div>';
            echo '</div>';
        } else {
            echo "Data pembelian barang tidak ditemukan.";
        }
    } else {
        echo "Data barang tidak ditemukan.";
    }
} else {
    echo "Parameter ID barang tidak diterima.";
}
?>
