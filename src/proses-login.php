<?php
include 'koneksi.php';
session_start();

if(isset($_POST['login'])) {
    $email_karyawan = $_POST['email_karyawan'];
    $password_karyawan = md5($_POST['password_karyawan']);

    $query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE email_karyawan = '$email_karyawan'");
    $data = mysqli_fetch_assoc($query);

    if($data) {
        if($data['password_karyawan'] == $password_karyawan) {
            $_SESSION['id_karyawan'] = $data['id_karyawan'];
            $_SESSION['nama_karyawan'] = $data['nama_karyawan'];
            header("location: Home.php");
        } else {
            $_SESSION['notification'] = array(
                'message' => 'Password salah!',
                'type' => 'error'
            );
            header("location: login.php");
        }
    } else {
        $_SESSION['notification'] = array(
            'message' => 'Email tidak ditemukan!',
            'type' => 'error'
        );
        header("location: login.php");
    }
}
?>
