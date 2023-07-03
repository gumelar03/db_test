<?php
include "koneksi.php";
$nisn 								= $_POST['nisn'];
$nis									= $_POST['nis'];
$nama 								= $_POST['nama'];
$jenis_kelamin 				= $_POST['jenis_kelamin'];
$id_kelas 						= $_POST['id_kelas'];
$kompetensi_keahlian 	= $_POST['kompetensi_keahlian'];
$alamat 							= $_POST['alamat'];
$no_telepon 					= $_POST['no_telepon'];

$sql = "CALL pSiswaSimpan('$nisn','$nis', '$nama', '$jenis_kelamin','$id_kelas', '$kompetensi_keahlian', '$alamat', '$no_telepon')";
//$sql = "INSERT INTO tb_siswa(nisn, nis, nama, jenis_kelamin, id_kelas, kompetensi_keahlian, alamat, no_telepon) VALUES('$nisn','$nis', '$nama', '$jenis_kelamin','$id_kelas', '$kompetensi_keahlian', '$alamat', '$no_telepon')";
mysqli_query($koneksi, $sql);
header("location:siswa.php");
?>
