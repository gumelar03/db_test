<?php
include "koneksi.php";
$nama_kelas	= $_POST['nama_kelas'];
$wali_kelas = $_POST['wali_kelas'];

$sql = "INSERT INTO tbl_kelas(nama_kelas, wali_kelas) VALUES('$nama_kelas', '$wali_kelas')";
mysqli_query($koneksi, $sql);
header("location:kelas.php");
?>
