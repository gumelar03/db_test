<?php 
$judul = "EDIT MASTER SPP";
include "header.php";
include "koneksi.php";

$id_spp = $_GET['id_spp'];
$sql = "SELECT * FROM tbl_spp WHERE idspp='$id_spp'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

<div class="col-6">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Edit Master SPP</h2>
				<form action="spp-update.php" method="post">
					<input type="hidden" name="id_spp" value="<?= $id_spp;?>">

					<div class="input-group mb-1 input-sm">
						<span class="input-group-text lebar" >Tahun</span>
						<input type="text" name="tahun" class="form-control" required autofocus autocomplete="off" value="<?= $data['tahun'];?>">
					</div>
					
					<div class="input-group mb-1 input-sm">
						<span class="input-group-text lebar" >Nominal</span>
						<input name="nominal" class="form-control" required value="<?= $data['nominal'];?>">
					</div>

					<div class="input-group mb-1 input-sm">
						<button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Update </button>| <a href="spp.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
					</div>
				</table>
			</form>
		</div>
	</div>
</div>
</div>

</div>
</div>
