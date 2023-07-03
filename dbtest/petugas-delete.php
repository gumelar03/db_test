<?php
include "koneksi.php";
$id_petugas = $_GET['id_petugas'];

//$sql = "CALL pPetugasDelete('$id_petugas');";

 $sql = "DELETE FROM tbl_petugas WHERE id_petugas ='$id_petugas'";
mysqli_query($koneksi, $sql);
header("location:petugas.php");


 ?>