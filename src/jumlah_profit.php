<?php
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM barang");

if(mysqli_num_rows($query) > 0) {
    $total_profit = 0;

    while($data = mysqli_fetch_assoc($query)) {
        $modal_barang = $data['modal_barang'];
        $harga_barang = $data['harga_barang'];

        // Hitung profit untuk setiap data barang
        $profit = $harga_barang - $modal_barang;
        
        // Tambahkan profit ke total profit
        $total_profit += $profit;
    }

    // Tampilkan total profit setelah mengakses semua data barang
    echo '<div style="font-weight: bold; color: white; font-size: 30px"> ' . number_format($total_profit, 0, ',', '.') . '</div>';
} else {
    echo "Tidak ada data barang.";
}
?>
