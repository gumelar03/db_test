<?php
include "koneksi.php";
$nisn 								= $_POST['nisn'];
$nama 								= $_POST['nama'];
$id_kelas 						= $_POST['id_kelas'];
$kompetensi_keahlian 	= $_POST['kompetensi_keahlian'];
$alamat 							= $_POST['alamat'];
$no_telepon 					= $_POST['no_telepon'];
$jenis_kelamin 						= $_POST['jenis_kelamin'];

$sql = "CALL pSiswaUpdate('$nama','$id_kelas','$kompetensi_keahlian','$alamat', '$no_telepon','$nisn','$jenis_kelamin')";
//$sql = "UPDATE tb_siswa SET nama = '$nama', id_kelas = '$id_kelas', kompetensi_keahlian = '$kompetensi_keahlian', alamat = '$alamat', no_telepon = '$no_telepon' , jenis_kelamin = '$jenis_kelamin' WHERE nisn = '$nisn'";
mysqli_query($koneksi, $sql);
header("location:siswa.php");
?>
