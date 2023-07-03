<?php
include "koneksi.php";
$username 		= $_POST['username'];
$password 		= $_POST['password'];
$nama_petugas	= $_POST['nama_petugas'];
$level 				= $_POST['level'];

$sql = "CALL pPetugasSimpan ('$username', '$password', '$nama_petugas','$level')";
 //$sql = "INSERT INTO tbl_petugas(username, password, nama_petugas, level) VALUES('$username', '$password', '$nama_petugas','$level')";
mysqli_query($koneksi, $sql);
header("location:petugas.php");
?>
