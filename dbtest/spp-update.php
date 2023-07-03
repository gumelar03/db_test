<?php
include "koneksi.php";
$id_spp = $_POST['id_spp'];
$tahun	= $_POST['tahun'];
$nominal= $_POST['nominal'];


$sql = "UPDATE tbl_spp SET tahun='$tahun', nominal='$nominal' WHERE idspp = '$id_spp'";
mysqli_query($koneksi, $sql);
header("location:spp.php");
?>
