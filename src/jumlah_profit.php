<?php
include 'koneksi.php';

// Query SQL untuk menghitung total profit per bulan (harga barang dikurangi modal)
$query = "SELECT MONTH(p.waktu_pembelian) AS bulan_angka, SUM(p.harga_barang - b.modal_barang) AS total_profit FROM pembelian p JOIN barang b ON p.id_barang = b.id_barang GROUP BY MONTH(p.waktu_pembelian)";
$result = mysqli_query($koneksi, $query);

// Penanganan kesalahan jika query gagal dieksekusi
if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}

// Array untuk konversi angka bulan menjadi huruf
$bulan_huruf = array(
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
);

// Loop untuk menampilkan hasil perhitungan profit per bulan
while ($data = mysqli_fetch_array($result)) {
    $bulan_angka = $data['bulan_angka']; // Ambil angka bulan dari hasil query
    $bulan_huruf_index = $bulan_angka - 1; // Indeks array dimulai dari 0
    $bulan_huruf_nama = $bulan_huruf[$bulan_huruf_index]; // Ambil nama bulan dari array

    echo "<p>" . $bulan_huruf_nama . ": " . number_format($data['total_profit']) . "</p>";
}
?>
