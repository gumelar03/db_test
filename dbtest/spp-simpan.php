<?php
include "koneksi.php";
$tahun		= $_POST['tahun'];
$nominal 	= $_POST['nominal'];

$sql = "INSERT INTO tbl_spp(tahun, nominal) VALUES('$tahun', '$nominal')";
mysqli_query($koneksi, $sql);
header("location:spp.php");
?>
