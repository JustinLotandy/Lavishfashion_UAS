<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
	//tangkap data dari form
	$ambil_kode_karyawan = $_POST['kode_karyawan'];
	$ambil_username_karyawan = $_POST['username_karyawan'];
	$ambil_password_karyawan = md5($_POST['password_karyawan']);
	$ambil_nama_karyawan = $_POST['nama_karyawan'];
	$ambil_email_karyawan = $_POST['email_karyawan'];

	//simpan data ke database
	$query = mysqli_query($koneksi, "INSERT INTO karyawan 
							(kode_karyawan, username_karyawan, password_karyawan, nama_karyawan, email_karyawan, tanggal_bergabung)			
							VALUES
							('$ambil_kode_karyawan', '$ambil_username_karyawan', '$ambil_password_karyawan', 
							'$ambil_nama_karyawan','$ambil_email_karyawan', CURRENT_TIMESTAMP)" );

	header("location: lihat-karyawan.php");

}
?>