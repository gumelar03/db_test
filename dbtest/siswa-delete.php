<?php
include "koneksi.php";
$nisn = $_GET['nisn'];

$sql = "CALL pSiswaDelete('$nisn')";
//$sql = "DELETE FROM tb_siswa WHERE nisn ='$nisn'";
mysqli_query($koneksi, $sql);
header("location:siswa.php");
?>