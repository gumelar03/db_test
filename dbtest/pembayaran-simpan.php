<?php
session_start();
include "koneksi.php";
$nisn						= $_POST['nisn'];
$tgl_bayar 			= $_POST['tgl_bayar'];
$bulan_bayar 		= $_POST['bulan_bayar'];
$id_spp 				= $_POST['id_spp'];
$jumlah_bayar 	= $_POST['jumlah_bayar'];
$id_petugas 		= $_SESSION['id_petugas'];

$sql = "INSERT INTO tbl_pembayaran(nisn, tgl_bayar, bulan_bayar, jumlah_bayar, id_petugas, id_spp) VALUES('$nisn', '$tgl_bayar', '$bulan_bayar', '$jumlah_bayar', '$id_petugas', '$id_spp')";
mysqli_query($koneksi, $sql);

// $sql1 = "UPDATE tbl_siswa SET total_bayar = total_bayar + $jumlah_bayar WHERE nisn = '$nisn'";
// mysqli_query($koneksi, $sql1);

header("location:pembayaran.php");
?>
