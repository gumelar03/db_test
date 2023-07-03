<?php 
session_start();
$nama = $_SESSION['nama'];
$level = $_SESSION['level'];
$nisnSession = $_SESSION['nisn'];
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $judul; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="img/logo.png" />
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-4_4_1.min.css"/>
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css" />
	
	<!-- JS -->
	<script src="js/jquery-3_4_1.min.js"></script>
	<script src="js/bootstrap-4_4_1.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap4.min.js"></script>
	<script src="js/fontawesome-5_7_2.js"></script>

	<style>
		a, a:hover{text-decoration: none;color: black;}
		.btn.btn-link.btn-block{color: black;}
		.btn.btn-link.btn-block:hover{text-decoration: none;}
		.menuMaster:hover{display: block;background: rgb(81, 215, 233);padding: 5px;cursor: pointer;text-decoration: none;}
		.bgMenu{background: rgba(115, 255, 216, .6);}
		.hoverMenu:hover a, .hoverMenu:hover, .hoverMenu:hover button{background: rgba(115, 255, 216, 1); font-size: 28px;}
		.input-group-text.lebar{width: 150px;}
	</style>
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-3">
				<div class="accordion shadow" id="accordionExample">
					
					<div class="card bgMenu hoverMenu">
						<div class="card-header">
							<h2 class="mb-0">
								<a href="dashboard.php" class="btn btn-link btn-block text-left">H O H E</a>
							</h2>
						</div>
					</div>

					<?php 
					if($level=="admin"){?>

						<div class="card">
							<div class="card-header hoverMenu" id="headingTwo">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
										M A S T E R
									</button>
								</h2>
							</div>

							<div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
								<div class="card-body">
									<div class="menuMaster"><i class="fas fa-check-circle text-success"></i> <a href="petugas.php">Master Petugas</a></div>
									<div class="menuMaster"><i class="fas fa-check-circle text-success"></i> <a href="spp.php">Master SPP</a></div>
									<div class="menuMaster"><i class="fas fa-check-circle text-success"></i> <a href="kelas.php">Master Kelas</a> </div>
									<div class="menuMaster"><i class="fas fa-check-circle text-success"></i> <a href="siswa.php">Master Siswa</a> </div>
								</div>
							</div>
						</div>
						<?php 
					} ?>

					<?php 
					if($level!="siswa"){?>
						<div class="card">
							<div class="card-header hoverMenu">
								<h2 class="mb-0">
									<a href="pembayaran.php" class="btn btn-link btn-block text-left">PEMBAYARAN</a>
								</h2>
							</div>
						</div>
						<?php 
					} ?>

					<div class="card">
						<div class="card-header" id="headingThree">
							<h2 class="mb-0">
								<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									LAPORAN
								</button>
							</h2>
						</div>

						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							<div class="card-body">
								<?php
								if($level=="admin"){?>
									<div class="menuMaster"><i class="fas fa-check-circle text-success"></i> <a href="laporan-laporan.php?nolap=1" target="_blank">Lap. Master Petugas</a></div>
									<div class="menuMaster"><i class="fas fa-check-circle text-success"></i> <a href="laporan-laporan.php?nolap=2" target="_blank">Lap. Master SPP</a></div>
									<div class="menuMaster"><i class="fas fa-check-circle text-success"></i> <a href="laporan-laporan.php?nolap=3" target="_blank">Lap. Master Kelas</a></div>
									<div class="menuMaster"><i class="fas fa-check-circle text-success"></i> <a href="laporan-laporan.php?nolap=4" target="_blank">Lap. Master Siswa</a></div>
									<?php 
								} ?>
								<div class="menuMaster"><i class="fas fa-check-circle text-success"></i> <a href="history.php" target="_blank">History..</a></div>
							</div>
						</div>
					</div>

					<div class="card bgMenu">
						<div class="card-header">
							<h2 class="mb-0">
								<a href="logout.php" class="btn btn-link btn-block text-left">LOG OUT</a>
							</h2>
						</div>
					</div>
				</div>
			</div>
