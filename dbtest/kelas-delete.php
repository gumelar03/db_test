<?php
include "koneksi.php";
$id_kelas = $_GET['id_kelas'];

$sql = "DELETE FROM tbl_kelas WHERE id_kelas ='$id_kelas'";
mysqli_query($koneksi, $sql);
header("location:kelas.php");
?>