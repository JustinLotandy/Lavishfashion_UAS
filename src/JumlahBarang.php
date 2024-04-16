<?php
include 'koneksi.php';
?>
<?php
$sql = "SELECT COUNT(*) as total FROM barang"; // Ganti 'nama_tabel' dengan nama tabel Anda
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    // Output jumlah data
    $row = $result->fetch_assoc();
    echo  $row["total"];
} else {
    echo "Tidak ada data.";
}

// Menutup koneksi ke database
$koneksi->close();
?>

