<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Log... History</title>
	<style>
		ul{
			position: absolute;
			top: 0;
			right: 0;
			left: 0;
			margin: auto;
			width: 90%;
			background: lightgray;
		}
		li{
			display: inline-block;
			padding: 10px;
		}
		li:hover{cursor: pointer;}
		a{
			text-decoration: none; 
			color: black;
		}
		.container{
			position: relative;
			left: 50px;
			top: 40px;
		}
		.buttonOutlet{
			font-size: 14px;
			display: inline-block;
			background: lightgrey;
			padding: 1px 10px 1px 10px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<ul>
		<li><a href="dashboard.php">Dashboard</a></li>
		<li><a href="outlet.php">Master Outlet</a></li>
		<li><a href="pengguna.php">Master Pengguna</a></li>
		<li><a href="paket.php">Master Paket</a></li>
		<li><a href="registrasi.php">Registrasi</a></li>
		<li><a href="transaksi.php">Transaksi</a></li>
		<li><a href="laporan.php">Laporan</a></li>
		<li><a href="log.php">Log..</a></li>
		<li><a href="logout.php">LogOut</a></li>
	</ul>
	<br>
	<h1>Rekapitulasi Log Outlet</h1>
	<table border="1" width="80%">
		<tr>
			<th>No.</th>
			<th>Tanggal</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Telp</th>
			<th>Keterangan</th>
		</tr>
		<?php
		include "koneksi.php";
		$no = 1;
//			$sql = "CALL pOutlet();";
		$query = mysqli_query($koneksi, "SELECT * FROM history_outlet");
		while($data = mysqli_fetch_assoc($query)){?>
			<tr>
				<td align="center" width="5%"><?= $no++;?>.</td>
				<td><?= $data['waktu'];?></td>
				<td><?= $data['nama'];?></td>
				<td><?= $data['alamat'];?></td>
				<td><?= $data['tlp'];?></td>
				<td><?= $data['keterangan'];?></td>
			</tr>
			<?php
		}?>
	</table>
</body>
</html>