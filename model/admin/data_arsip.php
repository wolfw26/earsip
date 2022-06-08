<?php include 'config/koneksi.php';

if (isset($_GET['hal'])) {
	if ($_GET['hal'] == "hapus") {
		$id = $_GET['idarsip'];
		$hapus = mysqli_query($koneksi, "DELETE FROM tbarsip WHERE id = '$id' ");
		if ($hapus) {
			echo " <script>
    document.location = '?halaman=data-arsip';
</script>";
		} else {
			echo " <script>
    alert('Hapus Data GAGAL');
    document.location = '?halaman=data-arsip';
</script>";
		}
	}
}
?>





<!-- Container -->
<div class="container">
	<div class="alert alert-primary" role="alert">
		DATA ARSIP
	</div>





	<div class="card mt-3 bg-light bg-opacity-100">
		<div class="card-header bg-primary text-light">
			Data Arsip
		</div>
		<div class="card-body  bg-transparent ">
			<div class="d-flex align-items-center justify-content-between">
				<div>
					<a class="btn btn-success" href="?halaman=data-arsip&hal=tambah">Tambah Arsip</a>
					<a target="_blank" class="btn btn-info text-dark mb-2" href="cetak/cetak_arsip.php"><i class="fa fa-print mr-2 text-dark" aria-hidden="true"></i>Cetak Arsip</a>
				</div>
				<div>
					<form name="cari" class="input-group mb-3" method="post" action="">
						<input id="search" type="text" name="keyword" class="form-control" placeholder="Cari Data" aria-describedby="button-addon2">
					</form>
				</div>
			</div>
			<div id="output" class=" text-dark">
				<table class="table table-sm table-bordered text-center  bg-transparent">
					<tr>
						<th>Kode</th>
						<th>Nama</th>
						<th>Tanggal</th>
						<th>Deskripsi</th>
						<th>Jenis Subyek</th>
						<th>Kode Lemari</th>
						<th>Aksi</th>
					</tr>


					<?php
					$batas = 5;
					$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
					$halaman_awal = ($page > 1) ? ($page * $batas) - $batas : 0;

					$qpg = "SELECT * FROM tbarsip,tblemari where tblemari.id_lemari = tbarsip.id_lemari ORDER BY id desc LIMIT $halaman_awal, $batas";
					$result = mysqli_query($koneksi, "$qpg");

					$tarsip = mysqli_query($koneksi, "SELECT * from tbarsip,tblemari where tblemari.id_lemari = tbarsip.id_lemari ORDER BY id desc");
					$jumlah_data = mysqli_num_rows($tarsip);
					$total_halaman = ceil($jumlah_data / $batas);




					while ($t = mysqli_fetch_array($result)) {
					?>
						<tr>
							<th><?= $t['kode_arsip']; ?></th>
							<td class=" text-capitalize"><?= $t['nama_arsip']; ?></td>
							<td><?= $t['tanggal']; ?></td>
							<td class="text-capitalize"><?= $t['deskripsi']; ?></td>
							<td><?= $t['subyek']; ?></td>
							<td><?= $t['no_lemari']; ?></td>
							<td>
								<a type="submit" class="btn btn-danger " href="?halaman=data-arsip&hal=hapus&id=<?= $t['id']; ?>;" onclick="return confirm('Apakah yakin ingin menghapus ini?')">Hapus</a>
								<a type="submit" href="?halaman=data-arsip&hal=edt&idarsip=<?= $t['id']; ?>" class="btn btn-success " name="edt-arsip">Edit</a>
							</td>


						</tr>
					<?php } ?>
				</table>
				<nav>
					<ul class="pagination justify-content-center">
						<?php
						for ($x = 1; $x <= $total_halaman; $x++) {
						?>
							<li class="page-item"><a class="page-link" href="?halaman=data-arsip&page=<?php echo $x ?>"><?php echo $x; ?></a></li>
						<?php
						}
						?>
					</ul>
				</nav>
			</div>
		</div>

		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
			<path fill="#a2d9ff" fill-opacity="1" d="M0,64L48,85.3C96,107,192,149,288,181.3C384,213,480,235,576,213.3C672,192,768,128,864,117.3C960,107,1056,149,1152,154.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
		</svg>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		//search logicnya jangan lupa copy jquery link
		$(document).ready(function() {
			$("#search").on('keyup', function() {
				$.ajax({
					type: 'POST',
					url: 'search/search_arsip.php?keyword=' + $("#search").val(),
					success: function(data) {
						$("#output").html(data);
					}
				});
			});
		});
	</script>
</div>