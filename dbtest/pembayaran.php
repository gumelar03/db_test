<?php
$judul = "PEMBAYARAN";
include "koneksi.php";
include "header.php";
$tgl = date('Y-m-d');

?>

<div class="col-9">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Rekapiluasi Pembayaran</h2>
				<hr>
				<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
					<i class="fas fa-plus"></i> Tambah
				</button>
				
				<table class="table table-bordered table-hover" id="pembayaran">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Siswa</th>
							<th>Nama Kelas</th>
							<th>Tgl Bayar</th>
							<th>Nama Bulan</th>
							<th>Tahun</th>
							<th>Jumlah Bayar</th>
							<th>Nama Petugas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						//$sql = "CALL pPembayaran();";
						 $sql = "SELECT * FROM tbl_pembayaran INNER JOIN tb_siswa ON tbl_pembayaran.nisn=tb_siswa.nisn INNER JOIN tbl_kelas ON tb_siswa.id_kelas=tbl_kelas.id_kelas INNER JOIN tbl_spp ON tbl_pembayaran.id_spp=tbl_spp.idspp INNER JOIN tbl_petugas ON tbl_pembayaran.id_petugas=tbl_petugas.id_petugas";
						$query = mysqli_query($koneksi, $sql);
						while($data = mysqli_fetch_array($query)){
							$kd_bulan = $data['bulan_bayar'];
							if($kd_bulan=="01"){$nama_bulan = "Januari";}
							elseif($kd_bulan=="02"){$nama_bulan = "Februari";}
							elseif($kd_bulan=="03"){$nama_bulan = "Maret";}
							elseif($kd_bulan=="04"){$nama_bulan = "April";}
							elseif($kd_bulan=="05"){$nama_bulan = "Mei";}
							elseif($kd_bulan=="06"){$nama_bulan = "Juni";}
							elseif($kd_bulan=="07"){$nama_bulan = "Juli";}
							elseif($kd_bulan=="08"){$nama_bulan = "Agustus";}
							elseif($kd_bulan=="09"){$nama_bulan = "September";}
							elseif($kd_bulan=="10"){$nama_bulan = "Oktober";}
							elseif($kd_bulan=="11"){$nama_bulan = "November";}
							elseif($kd_bulan=="12"){$nama_bulan = "Desember";}?>
							<tr>
								<td class="align-middle text-center" width="5%"><?= $no++;?>.</td>
								<td class="align-middle"><?= $data['nama'];?></td>
								<td class="align-middle"><?= $data['nama_kelas'];?></td>
								<td class="align-middle"><?= $data['tgl_bayar'];?></td>
								<td class="align-middle"><?= $nama_bulan;?></td>
								<td class="align-middle text-center"><?= $data['tahun'];?></td>
								<td class="align-middle text-right"><?= number_format($data['jumlah_bayar']);?></td>
								<td class="align-middle"><?= $data['nama_petugas'];?></td>
								<td align="center" width="10%"><a href="pembayaran-edit.php?id_pembayaran=<?= $data['id_pembayaran'];?>" class="badge badge-primary p-2 mb-1" title="Edit"><i class="fas fa-edit"></i></a><a href="pembayaran-delete.php?id_pembayaran=<?= $data['id_pembayaran'];?>" onclick="return confirm('Data akan dihapus?');" class="badge badge-danger p-2" title='Delete'><i class="fas fa-trash"></i></a> </td>
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
					Input Pembayaran
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="pembayaran-simpan.php" method="post">
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Nama Siswa</span>
						<select name="nisn" class="form-control" required>
							<option value="" selected>~ Pilih Nama Siswa ~</option>
							<?php
							include "koneksi.php";
							$sql = "SELECT * FROM tb_siswa INNER JOIN tbl_kelas ON tb_siswa.id_kelas=tbl_kelas.id_kelas";
							$query = mysqli_query($koneksi, $sql);
							while($d = mysqli_fetch_array($query)){?>
								<option value="<?= $d['nisn'];?>"><?= $d['nama'] . '-'.$d['nama_kelas'];?></option>
								<?php
							}?>
						</select>
					</div>

					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Tgl Bayar</span>
						<input type="date" name="tgl_bayar" required autocomplete="off" class="form-control" value="<?= $tgl;?>">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Nama Bulan</span>
						<select name="bulan_bayar" class="form-control" required>
							<option value="" selected>~ Pilih Nama Bulan ~</option>
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desembar</option>
						</select>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Tahun</span>
						<select name="id_spp" class="form-control" required >
							<option value="" selected>~ Pilih Tahun ~</option>
							<?php
							$sql = "SELECT * FROM tbl_spp ORDER BY tahun";
							$query = mysqli_query($koneksi, $sql);
							while($d = mysqli_fetch_array($query)){?>
								<option value="<?= $d['idspp'];?>"><?= $d['tahun'];?></option>
								<?php
							}?>
						</select>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Jumlah Bayar</span>
						<input type="text" name="jumlah_bayar" required autocomplete="off" class="form-control">
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
		$('#pembayaran').dataTable();
	});
</script>