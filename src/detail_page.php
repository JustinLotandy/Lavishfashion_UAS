<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id_barang = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = $id_barang");

    if(mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $modal_barang = $data['modal_barang'];
        $harga_barang = $data['harga_barang'];

        // Hitung profit
        $profit = $harga_barang - $modal_barang;

        echo '<div style="background-color: #f7f7f7; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif; line-height: 1.8; text-align: justify;">';
        echo '<h2 style="margin-bottom: 20px; font-size: 24px; text-align: center;">Detail Barang</h2>';
        echo '<div style="margin-bottom: 10px;">';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Kode Barang:</strong> ' . $data['kode_barang'] . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Nama Barang:</strong> ' . $data['nama_barang'] . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Modal Barang:</strong> Rp ' . number_format($modal_barang, 0, ',', '.') . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Harga Barang:</strong> Rp ' . number_format($harga_barang, 0, ',', '.') . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Profit:</strong> Rp ' . number_format($profit, 0, ',', '.') . '<br>'; // Tampilkan profit
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Jumlah Barang:</strong> ' . $data['jumlah_barang'] . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Kategori Barang:</strong> ' . $data['kategori_barang'] . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Tanggal Input:</strong> ' . $data['tanggal_input'] . '<br>';
        
        echo '</div>';
        echo '</div>';
    } else {
        echo "Data barang tidak ditemukan.";
    }
} else {
    echo "Parameter ID barang tidak diterima.";
}
?>
