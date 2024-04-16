<?php
include 'koneksi.php';

if (isset($_POST['ubah'])) {
	//tangkap data dari form edit barang

	$ambilid = $_POST['id_barang'];
	$ambilkode = $_POST['kode_barang'];
	$ambilnama = $_POST['nama_barang'];
	$ambilmodal = $_POST['modal_barang'];
	$ambilharga = $_POST['harga_barang'];
	$ambiljumlah = $_POST['jumlah_barang'];
	$ambilkategori = $_POST['kategori_barang'];

	//mengupdate data pada tabel barang
	$query = mysqli_query($koneksi, "UPDATE barang
								 SET 
									kode_barang 		= '$ambilkode',
									nama_barang 		= '$ambilnama',
									modal_barang 		= '$ambilmodal',
									harga_barang 	= '$ambilharga',
									jumlah_barang 	= '$ambiljumlah',
									kategori_barang = '$ambilkategori'
								WHERE 
									id_barang 		= '$ambilid'");

	header("location:lihat-barang.php");
}
?>