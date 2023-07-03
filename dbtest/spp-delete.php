<?php
include "koneksi.php";
$id_spp = $_GET['id_spp'];

$sql = "DELETE FROM tbl_spp WHERE idspp ='$id_spp'";
mysqli_query($koneksi, $sql);
header("location:spp.php");


 ?>