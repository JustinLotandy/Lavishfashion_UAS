<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM karyawan 
                                WHERE id_karyawan = '$id' ");


header('location:lihat-karyawan.php');


?>