<?php 
session_start();
include "koneksi.php";
// mysqli_escape_string = mencegah sql injection
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $_POST['password']);

$sql = "CALL pLogin('$username', '$password');";
 //$sql = "SELECT * FROM tbl_petugas WHERE username = '$username' AND password = '$password'";
$query = mysqli_query($koneksi, $sql);
// mysqli_num_rows($query)>0 = ditemukan
if (mysqli_num_rows($query)>0){
	$data 	= mysqli_fetch_array($query);
	$_SESSION['id_petugas'] = $data['id_petugas'];
	$_SESSION['nama'] = $data['nama_petugas'];
	$_SESSION['level']= $data['level'];
	$_SESSION['nisn'] = $data['id_petugas'];
	header("location:dashboard.php");
}else{
	include "koneksi.php";
	//$sql1 = "CALL pLogin('$username', '$password');";
	$sql1 = "SELECT * FROM tb_siswa WHERE nisn = '$username' AND nis = '$password'";
	$query1 = mysqli_query($koneksi, $sql1);
	if (mysqli_num_rows($query1)>0){
		$data1 	= mysqli_fetch_array($query1);
		$_SESSION['nisn'] 	= $username;
		$_SESSION['nama'] 	= $data1['nama'];
		$_SESSION['nisn'] 	= $data1['nisn'];
		$_SESSION['level'] 	= 'siswa'; 
		header("location:dashboard.php");
	}else{
		 echo "<script>alert('Maaf, username atau password salah..')</script>";
		header("refresh:0;url=index.php");
	}
}?>
