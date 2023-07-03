<?php 
$judul = "EDIT MASTER SISWA";
include "header.php";
include "koneksi.php";
$nisn = $_GET['nisn'];
$sql = "SELECT * FROM tb_siswa WHERE nisn='$nisn'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$id_kelas = $data['id_kelas'];
$jenis_kelamin = $data['jenis_kelamin'];
?>
<div class="col-6">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>LIST SUSU ISAM/h2>
				<form action="siswa-update.php" method="post">
					<input type="hidden" name="nisn" value="<?= $nisn;?>">
					<input type="hidden" name="nis" value="<?= $data['nis'];?>">
					<div class="input-group mb-1 input-sm">
						<span class="input-group-text lebar" >Nama Siswa</span>
						<input name="nama" type="text" class="form-control" required autocomplete="off" value="<?= $data['nama'];?>">
					</div>
					<div class="input-group mb-1 input-sm">
						<span class="input-group-text lebar" >Jenis Kelamin</span>
						<select name="jenis_kelamin" class="form-control" required>
							<?php
							$sql = "SELECT DISTINCT(jenis_kelamin) FROM tb_siswa";
							$query = mysqli_query($koneksi, $sql);
							while($d = mysqli_fetch_array($query)){?>
								<option value="<?= $d['jenis_kelamin'];?>" <?php if($d['jenis_kelamin']==$jenis_kelamin){echo 'selected="selected"';}?>><?= $d['jenis_kelamin'];?></option>
								<?php
							}?>
						</select>
					</div>
					<div class="input-group mb-1 input-sm">
						<span class="input-group-text lebar" >Nama Kelas</span>
						<select name="id_kelas" class="form-control" required>
							<?php
							$sql = "SELECT * FROM tbl_kelas";
							$query = mysqli_query($koneksi, $sql);
							while($d = mysqli_fetch_array($query)){?>
								<option value="<?= $d['id_kelas'];?>" <?php if($d['id_kelas']==$id_kelas){echo 'selected="selected"';}?>><?= $d['nama_kelas'];?></option>
								<?php
							}?>
						</select>
					</div>
					<div class="input-group mb-1 input-sm">
						<span class="input-group-text lebar" >K. Keahlian</span>
						<input name="kompetensi_keahlian" type="text" class="form-control" required autocomplete="off" value="<?= $data['kompetensi_keahlian'];?>">
					</div>
					<div class="input-group mb-1 input-sm">
						<span class="input-group-text lebar" >Alamat</span>
						<input name="alamat" type="text" class="form-control" required autocomplete="off" value="<?= $data['alamat'];?>">
					</div>
					<div class="input-group mb-1 input-sm">
						<span class="input-group-text lebar" >Telp / WA</span>
						<input name="no_telepon" type="text" class="form-control" required autocomplete="off" value="<?= $data['no_telepon'];?>">
					</div>
					<div class="input-group mb-1 input-sm">
						<button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Update </button>| <a href="siswa.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
					</tr>
				</table>
			</form>
		</body>
		</html>
