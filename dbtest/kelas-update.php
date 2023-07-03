<?php
include "koneksi.php";
$id_kelas 	= $_POST['id_kelas'];
$nama_kelas	= $_POST['nama_kelas'];
$wali_kelas = $_POST['wali_kelas'];

$sql = "UPDATE tbl_kelas SET nama_kelas ='$nama_kelas', wali_kelas='$wali_kelas' WHERE id_kelas = '$id_kelas'";
mysqli_query($koneksi, $sql);
header("location:kelas.php");
?>
