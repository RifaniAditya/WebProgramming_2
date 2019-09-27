<?php
$koneksi = mysqli_connect("localhost","root","","crud");

if (mysqli_connect_errno()) {
	echo "Gagal melakukan koneksi  " . mysqli_connect_errno();
}
?>