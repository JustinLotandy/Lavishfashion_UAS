<?php
include 'koneksi.php';

// Query SQL untuk menghitung total profit per bulan
$query = "SELECT MONTH(waktu_pembelian) AS bulan_angka, SUM(harga_barang) AS total_profit FROM pembelian GROUP BY MONTH(waktu_pembelian)";
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

// Mulai tabel HTML dengan desain yang ditingkatkan
echo "<style>
        table {
            width: 500%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>";

echo "<table>";
echo "<tr><th>Bulan</th><th>Total Profit</th></tr>";

// Loop untuk menampilkan hasil perhitungan profit per bulan dalam bentuk tabel
while ($data = mysqli_fetch_array($result)) {
    $bulan_angka = $data['bulan_angka']; // Ambil angka bulan dari hasil query
    $bulan_huruf_index = $bulan_angka - 1; // Indeks array dimulai dari 0
    $bulan_huruf_nama = $bulan_huruf[$bulan_huruf_index]; // Ambil nama bulan dari array

    // Tambahkan baris tabel untuk setiap bulan
    echo "<tr>";
    echo "<td>" . $bulan_huruf_nama . "</td>";
    echo "<td>Rp " . number_format($data['total_profit'], 0, ',', '.') . "</td>";
    echo "</tr>";
}

// Selesai tabel HTML
echo "</table>";
?>
