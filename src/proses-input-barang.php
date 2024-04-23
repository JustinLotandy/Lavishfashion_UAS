<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah"])) {
    // Tangkap data dari form
    $ambil_kode = $_POST['kode_barang'];
    $ambil_nama = $_POST['nama_barang'];
    $ambil_modal = $_POST['modal_barang'];
    $ambil_harga = $_POST['harga_barang'];
    $ambil_jumlah = $_POST['jumlah_barang'];
    $ambil_kategori = $_POST['kategori_barang'];

    // Query SQL untuk menyimpan data ke database
    $query = "INSERT INTO barang 
                (kode_barang, nama_barang, modal_barang, harga_barang, jumlah_barang, kategori_barang, tanggal_input)			
                VALUES
                ('$ambil_kode', '$ambil_nama', '$ambil_modal', '$ambil_harga', '$ambil_jumlah', '$ambil_kategori', CURRENT_TIMESTAMP)";
    
    // Eksekusi query dan tangkap kesalahan jika ada
    if (mysqli_query($koneksi, $query)) {
        header("location: lihat-barang.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
