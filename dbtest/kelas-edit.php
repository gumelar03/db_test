<?php
$judul = "EDIT MASTER KELAS";
include "header.php";
include "koneksi.php";
$id_kelas = $_GET['id_kelas'];
$sql = "SELECT * FROM tbl_kelas WHERE id_kelas='$id_kelas'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);?>

<div class="col-6">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Edit Master Kelas</h1>
				<form action="kelas-update.php" method="post">
					<input type="hidden" name="id_kelas" value="<?= $id_kelas;?>">
					<div class="input-group mb-1 input-sm">
						<span class="input-group-text lebar" >Nama Kelas</span>
						<input type="text" name="nama_kelas" required autofocus autocomplete="off" value="<?= $data['nama_kelas'];?>">
					</div>

					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Wali Kelas</span>
						<input name="wali_kelas" required value="<?= $data['wali_kelas'];?>">
					</div>
					<div class="input-group mb-1">
						<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Update</button> | <a href="kelas.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
					</div>
				</table>
			</form>
		</div>
	</div>
</div>

</div>
</div>
