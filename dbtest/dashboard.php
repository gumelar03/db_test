<?php 
$judul = "PT ISAM";
include "header.php";
include "koneksi.php";
?>

<div class="col-8">
	<div class="container">
		<?php 
		if ($level!="siswa"){?>
			<div class="row mb-3">
				<div class="col">
					<div class="jumbotron p-3 m-0 shadow">
						<h1 class="display-5">SELAMAT DATANG DI WESITE GW DEK</h1>
						<p class="lead">Di PT ISAM (Industri Susu Alam Murni)</p>
						<hr class="my-4">
						<p class="text-right text-success">TES WEB DOANG DI <?= date('Y'); ?></p>
					</div>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-6 bg-info">
					<div class="card my-2">
						<div class="row">
							<div class="col-md-5 d-flex align-items-center pr-0">
								<img src="img/money.jpg" alt="money" class="img-thumbnail ml-1">
							</div>
							<div class="col-md-7">
								<div class="card-body p-0 mr-1">
									<h5 class="card-title pt-2 text-center">PENERIMAAN</h5>
									<?php 
									$sql 	= "SELECT sum(jumlah_bayar) as jml FROM tbl_pembayaran";
									$query 	= mysqli_query($koneksi, $sql);
									$data 	= mysqli_fetch_array($query);
									$jml 		= $data['jml']/1000000;
									?>

									<p class="card-text display-4 text-center text-danger"><?= number_format($jml,2);  ?></p>
									<p class="card-text text-center"><small class="text-muted">anjayyy</small></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-6 bg-warning">
					<div class="card my-2">
						<div class="row">
							<div class="col-md-5 d-flex align-items-center pr-0">
								<img src="img/user.png" alt="user" class="img-thumbnail ml-1">
							</div>
							<div class="col-md-7">
								<div class="card-body p-0 mr-1">
									<h5 class="card-title pt-2 text-center">JUMLAH SISWA</h5>
									<?php 
									$sql 	= "SELECT count(*) as jml FROM tb_siswa";
									$query 	= mysqli_query($koneksi, $sql);
									$data 	= mysqli_fetch_array($query);?>

									<p class="card-text display-4 text-center text-danger"><?= $data['jml'] ?></p>

									<?php
									$sql1 	= "SELECT count(jenis_kelamin) as jk1 FROM tb_siswa WHERE jenis_kelamin='Laki-laki'";
									$query1 = mysqli_query($koneksi, $sql1);
									$data1 	= mysqli_fetch_array($query1);

									$sql2 	= "SELECT count(jenis_kelamin) as jk2 FROM tb_siswa WHERE jenis_kelamin='Perempuan'";
									$query2 = mysqli_query($koneksi, $sql2);
									$data2 	= mysqli_fetch_array($query2);?>

									<p class="card-text text-center"><small class="text-muted">Laki-laki : <span style="font-size: 20px"><?= $data1['jk1']; ?></span> - Perempuan: <span style="font-size: 20px"><?= $data2['jk2']; ?></span></small></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col p-0 m-0">
					<?php
					$sql 	= "SELECT * FROM tbl_pembayaran a INNER JOIN tb_siswa b ON a.nisn=b.nisn INNER JOIN tbl_kelas c ON b.id_kelas=c.id_kelas ORDER BY a.id_pembayaran";
					$query 	= mysqli_query($koneksi, $sql);
					if(mysqli_num_rows($query)>0){
						$data 	= mysqli_fetch_array($query);
						$tgl 		= $data['tgl_bayar'];
						$nama 	= $data['nama'];
						$nama_kelas = $data['nama_kelas'];
						$jumlah_bayar = number_format($data['jumlah_bayar']);
						$ket 	 	= "Tanggal : ". $tgl." - Nama : ".$nama ." - Kelas : " . $nama_kelas . ' - Jumlah bayar Rp. '. $jumlah_bayar;
					}else{$ket='';}
					?>
					<div class="alert alert-danger">
						<marquee behavior="" direction="left"><?= "Peneriman terbaru : ". $ket; ?></marquee>
					</div>	
				</div>
			</div>
			<?php 
		}else{?>
			<div class="row mb-3">
				<div class="col">
					<div class="jumbotron p-3 m-0 shadow">
						<h1 class="display-5">Selamat Datang <?= $nama; ?></h1>
						<p class="lead">di Aplikasi Pembayaran SPP</p>

						<div class="card my-4 d-flex align-items-center border-0 bg-transparent">
							<div class="row">
								<div class="col-md-5 d-flex align-items-center pr-0">
									<img src="img/money.jpg" alt="money" class="img-thumbnail ml-1">
								</div>
								<div class="col-md-7">
									<div class="card-body p-0 mr-1">
										<h5 class="card-title pt-2 text-center">TOTAL PEMBAYARAN</h5>
										<?php 
										$sql 	= "SELECT sum(jumlah_bayar) as jml FROM tbl_pembayaran WHERE nisn = '$nisnSession'";
										$query 	= mysqli_query($koneksi, $sql);
										$data 	= mysqli_fetch_array($query);
										$jml 		= $data['jml'];
										?>
										<p class="card-text display-4 text-center text-danger"><?= number_format($jml);  ?></p>
									</div>
								</div>
							</div>
						</div>
						<hr class="my-2">
						<p class="text-right text-success">UJIKOM RPL SMK MEDIKACOM <?= date('Y'); ?></p>
					</div>
				</div>
			</div>
			<?php 
		}?>
	</div>
</div>

</div>
</div>
