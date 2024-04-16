<?php
$user = "root";
$server = "localhost";
$password = "";
$db = "lavish_fashion";
$koneksi = mysqli_connect($server, $user, $password, $db);

if ($koneksi == false) {
	echo "Tidak Terkoneksi";
}
?>