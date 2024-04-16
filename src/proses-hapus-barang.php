<?php
include 'koneksi.php';

//tangkap data dari lihat-barang
$ambil_id_barang = $_GET['id'];

//menghapus data pada tabel barang
$query = mysqli_query($koneksi, "DELETE FROM barang
								 WHERE id_barang 	= '$ambil_id_barang'");


header("location:lihat-barang.php");

?>