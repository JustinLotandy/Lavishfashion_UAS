<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset'])) {
    $kode_karyawan = $_POST['kode_karyawan'];
    $password_baru = $_POST['password_baru'];

    // Lakukan proses update password karyawan berdasarkan kode karyawan
    $query_update = mysqli_query($koneksi, "UPDATE karyawan SET password_karyawan = '$password_baru' WHERE kode_karyawan = '$kode_karyawan'");

    if ($query_update) {
        echo '<script>alert("Password berhasil direset.");</script>';
    } else {
        echo '<script>alert("Gagal mereset password.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Karyawan</title>
</head>
<body>
    <h1>Reset Password Karyawan</h1>
    <form method="POST" action="reset-password.php">
        <label for="kode_karyawan">Kode Karyawan:</label>
        <input type="text" id="kode_karyawan" name="kode_karyawan" required><br><br>
        
        <label for="password_baru">Password Baru:</label>
        <input type="password" id="password_baru" name="password_baru" required><br><br>

        <input type="submit" name="reset" value="Reset Password">
    </form>
</body>
</html>
