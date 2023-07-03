<?php 
$judul = "MASTER SISWA";
include "header.php"; 
include "koneksi.php";
?>

<div class="col-9">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Rekapiluasi Master Siswa</h2>
				<hr>
				<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
					<i class="fas fa-plus"></i> Tambah
				</button>
				
				<table class="table table-bordered table-hover table-responsive" id="siswa">
					<thead>
						<tr class="text-center">
							<th>No.</th>
							<th>NISN</th>
							<th>NIS</th>
							<th>Nama</th>
							<th>JK</th>
							<th>Nama Kelas</th>
							<th>K. Keahlian</th>
							<th>Alamat</th>
							<th>Telp</th>
							<th>Ttl Bayar</th>
							<th width="25%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$sql = "CALL pSiswa()";
						//$sql = "SELECT * FROM tb_siswa INNER JOIN tbl_kelas ON tb_siswa.id_kelas=tbl_kelas.id_kelas";
						$query = mysqli_query($koneksi, $sql);
						while($data = mysqli_fetch_array($query)){?>
							<tr>
								<td class="text-center align-middle" width="5%"><?= $no++;?>.</td>
								<td class="align-middle"><?= $data['nisn'];?></td>
								<td class="align-middle"><?= $data['nis'];?></td>
								<td class="align-middle"><?= $data['nama'];?></td>
								<td class="align-middle"><?= $data['jenis_kelamin'];?></td>
								<td class="align-middle"><?= $data['nama_kelas'];?></td>
								<td class="align-middle"><?= $data['kompetensi_keahlian'];?></td>
								<td class="align-middle"><?= $data['alamat'];?></td>
								<td class="align-middle"><?= $data['no_telepon'];?></td>
								<td class="align-middle text-right"><?= number_format($data['total_bayar']);?></td>
								<td class="align-middle text-center" width="35%"><a href="siswa-edit.php?nisn=<?= $data['nisn'];?>" class="badge badge-primary p-2 mb-1" title="Edit"><i class="fas fa-edit"></i></a><a href="siswa-delete.php?nisn=<?= $data['nisn'];?>" onclick="return confirm('Data akan dihapus?');" class="badge badge-danger p-2" title='Delete'><i class="fas fa-trash"></i></a> </td>
							</tr>
							<?php
						}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">	
					Input Master Siswa
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="siswa-simpan.php" method="post">
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >NISN</span>
						<input type="text" name="nisn" required autocomplete="off" class="form-control" placeholder="Input Nama Siswa">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >NIS</span>
						<input type="text" name="nis" required autocomplete="off" class="form-control" placeholder="Input No Induk Siswa">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Nama Siswa</span>
						<input type="text" name="nama" required  class="form-control" placeholder="Input Nama Siswa">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Jenis Kelamin</span>
						<select name="jenis_kelamin" class="form-control" required>
							<option value="" selected>~ Pilih Jenis Kelamin ~</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Nama Kelas</span>
						<select name="id_kelas" class="form-control" required>
							<option value="" selected>~ Pilih Nama Kelas ~</option>
							<?php
							include "koneksi.php"; 
							$sql = "SELECT * FROM tbl_kelas";
							$query = mysqli_query($koneksi, $sql);
							while($d = mysqli_fetch_array($query)){?>
								<option value="<?= $d['id_kelas'];?>"><?= $d['nama_kelas'];?></option>
								<?php
							}?>
						</select>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Keahlian</span>
						<input type="text" name="kompetensi_keahlian" required  class="form-control" placeholder="Input Kompetensi Keahlian">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Alamat</span>
						<input type="text" name="alamat" required  class="form-control" placeholder="Input Alamat">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Telp</span>
						<input type="text" name="no_telepon" required  class="form-control" placeholder="Input No Telp/WA">
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#siswa').dataTable();
	});
</script>