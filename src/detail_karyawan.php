<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id_karyawan = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_karyawan = $id_karyawan");

    if(mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        echo '<div style="background-color: #f7f7f7; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif; line-height: 1.8; text-align: justify;">';
        echo '<h2 style="margin-bottom: 20px; font-size: 24px; text-align: center;">Detail Karyawan</h2>';
        echo '<div style="margin-bottom: 10px;">';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Kode Karyawan:</strong> ' . $data['kode_karyawan'] . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Username Karyawan:</strong> ' . $data['username_karyawan'] . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Nama Karyawan:</strong> ' . $data['nama_karyawan'] . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Email Karyawan:</strong> ' . $data['email_karyawan'] . '<br>';
        echo '<strong style="font-weight: bold; display: inline-block; width: 150px;">Tanggal Bergabung:</strong> ' . $data['tanggal_bergabung'] . '<br>';
        
        echo '</div>';
        echo '</div>';
    } else {
        echo "Data karyawan tidak ditemukan.";
    }
} else {
    echo "Parameter ID karyawan tidak diterima.";
}
?>
