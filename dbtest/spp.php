<?php 
$judul = "MASTER SPP";
include "header.php";
include "koneksi.php";
?>

<div class="col-7">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>PRODUK SUSU ISAM LIST</h2>
				<hr>
				<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
					<i class="fas fa-plus"></i> Tambah
				</button>	

				<table class="table table-bordered table-hover" id="spp">
					<thead>
						<tr class="text-center">
							<th>No.</th>
							<th>Tahun</th>
							<th>Nominal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$sql = "SELECT * FROM tbl_spp";
						$query = mysqli_query($koneksi, $sql);
						while($data = mysqli_fetch_array($query)){?>
							<tr>
								<td align="center" width="5%"><?= $no++;?>.</td>
								<td align="center"><?= $data['tahun'];?></td>
								<td align="right"><?= number_format($data['nominal']);?></td>
								<td align="center" width="20%"><a href="spp-edit.php?id_spp=<?= $data['idspp'];?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="spp-delete.php?id_spp=<?= $data['idspp'];?>" onclick="return confirm('Data akan dihapus?');" class="badge badge-danger p-2" title="Delete"><i class="fas fa-trash"></i></a> </td>
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
				<form action="spp-simpan.php" method="post">
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Tahun</span>
						<input type="text" name="tahun" required autocomplete="off" class="form-control" placeholder="Input Tahun SPP">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Total</span>
						<input type="text" name="nominal" required autocomplete="off" class="form-control" placeholder="Input Total Setahun">
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
		$('#spp').dataTable();
	});
</script>
