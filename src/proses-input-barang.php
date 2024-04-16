<?php
include 'koneksi.php';
//panggil file koneksi.php untuk menghubung ke server dan database

if (isset($_POST['tambah'])) {
	//tangkap data dari form


	$ambil_kode = $_POST['kode_barang'];
	$ambil_nama = $_POST['nama_barang'];
	$ambil_modal = $_POST['modal_barang'];
	$ambil_harga = $_POST['harga_barang'];
	$ambil_jumlah = $_POST['jumlah_barang'];
	$ambil_kategori = $_POST['kategori_barang'];


	//simpan data ke database
	mysqli_query($koneksi, "INSERT INTO barang 
					(kode_barang, nama_barang, modal_barang, harga_barang,jumlah_barang, kategori_barang, tanggal_input)			
					VALUES
					('$ambil_kode','$ambil_nama','$ambil_modal','$ambil_harga','$ambil_jumlah','$ambil_kategori', CURRENT_TIMESTAMP)");

	header("location: lihat-barang.php");
}
?>