<?php 
$judul = "MASTER KELAS";
include "header.php";
include "koneksi.php";
?>

<div class="col-9">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Rekapiluasi Master Kelas</h2>
				<hr>
				<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
					<i class="fas fa-plus"></i> Tambah
				</button>

				<table class="table table-bordered table-hover" id="kelas">
					<thead>
						<tr class="text-center">
							<th>No.</th>
							<th>Nama Kelas</th>
							<th>Wali Kelas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no 		= 1;
						$sql 		= "SELECT * FROM tbl_kelas";
						$query 	= mysqli_query($koneksi, $sql);
						while($data = mysqli_fetch_array($query)){?>
							<tr>
								<td align="center" width="5%"><?= $no++;?>.</td>
								<td><?= $data['nama_kelas'];?></td>
								<td><?= $data['wali_kelas'];?></td>
								<td align="center" width="25%"><a href="kelas-edit.php?id_kelas=<?= $data['id_kelas'];?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="kelas-delete.php?id_kelas=<?= $data['id_kelas'];?>" onclick="return confirm('Data akan dihapus?');" class="badge badge-danger p-2" title='Delete'><i class="fas fa-trash"></i></a> </td>
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
					Input Master Petugas
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="kelas-simpan.php" method="post">
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Nama Kelas</span>
						<input type="text" name="nama_kelas" required autocomplete="off" class="form-control" placeholder="Input Nama Kelas">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Wali Kelas</span>
						<input type="text" name="wali_kelas" required autocomplete="off" class="form-control" placeholder="Input Wali Kelas">
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
		$('#kelas').dataTable();
	});
</script>