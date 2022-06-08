<!-- UPDATE `tdokumen` SET `status` = 'tersedia' WHERE `tdokumen`.`id` = 3; -->

<?php
if (isset($_POST['bpinjam'])) {
    $tgl = date('Y-m-d');
    $id = $_POST['id'];
    $lemari = $_POST['id_lemari'];
    $peminjam = $_POST['peminjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $petugas = $_POST['petugas'];
    $spm = $_POST['spm'];
    $spd = $_POST['spd'];
    $map = $_POST['map'];
    $ket = $_POST['ket'];

    $q1 = mysqli_query($koneksi, "INSERT INTO `rkpinjam` (`id_pinjam`, `nama`, `dokumen_id`, `lemari`, `tgl_pinjam`, `tgl_kembali`, `ket`) VALUES                                                   ('','$peminjam','$id','$lemari','$tgl','$tgl_kembali','$ket')");
    $q1 .= mysqli_query($koneksi, "UPDATE `tdokumen` SET `status` = 'dipinjam' WHERE `tdokumen`.`id` = $id;");

    if ($q1) {
        echo " <script>
        alert('Data Pinjam Tersimpan');
        document.location = '?halaman=data-pinjam';
        </script>";
    } else {
        echo " <script>
        alert('Gagal Menambahkan');
        document.location = '?halaman=data-pinjam';
        </script>";
    }
}
?>


<div class="container-fluid">
    <div class="container-fluid d-flex  justify-content-center pt-3 border-bottom border-dark">

        <div class="w-100">
            <h3 class="text-center"> <img class="mr-3" src="file/bps.png" width="50" height="40">Badan Pusat Statistik Banjarmasin</h3>

            <h5 class="text-center pb-3">Jl. Gatot Subroto No.5, Kuripan, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan 70238</h5>
            <h4 class="text-center pb-3 ">Laporan Data Dokumen</h4>
        </div>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dokumen - <span class="badge rounded-pill bg-success">Tersedia</span></h6>
        </div>
        <div class="card-body">
            <!-- cetak -->
            <a target="_blank" href="cetak/laporan_peminjaman.php" class="btn btn-outline-secondary btn-sm"><i class="fas fa-print fa-lg"></i> Cetak</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class=" bg-gray-300 border-bottom-dark">

                        <tr class=" text-center">
                            <th>Aksi</th>
                            <th>No.</th>
                            <th>No. SPM / tanggal</th>
                            <th>No.SP2D / Tanggal</th>
                            <th>Total Anggaran</th>
                            <th>Kuitansi PPK </th>
                            <th>Keperluan</th>
                            <th>Jumlah</th>
                            <th>Tahun</th>
                            <th>No. Map</th>
                            <th>Lemari</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $q = mysqli_query($koneksi, "SELECT * FROM tdokumen,tbklasifikasi,tblemari where tdokumen.klasifikasi_id = tbklasifikasi.id_klas and tdokumen.lemari_id = tblemari.id_lemari and tdokumen.status = 'tersedia' order by tdokumen.id desc ");
                        $no = 1;
                        while ($d = mysqli_fetch_assoc($q)) {
                        ?>
                            <tr>

                                <td>
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <a id="pinjam" href="?halaman=data-pinjam" class=" btn btn-outline-success btn-sm" data-toggle="modal" data-target="#pinjamData" data-id="<?= $d['id']; ?>" data-id-lemari="<?= $d['nama_ruang'] . '-' . $d['no_lemari'] . '-' . $d['baris'] . '-' . $d['box']; ?>" data-spm="<?= $d['no_spm']; ?>" data-spd="<?= $d['no_spd']; ?>" data-map="<?= $d['map']; ?>">Pinjam</a>
                                    </h6>
                                </td>
                                <th><?= $no++; ?> .</th>
                                <td class=" row-cols-3"><?= $d['no_spm'] . '<br>' . $d['tgl_spm']; ?></td>
                                <td class=" row-cols-3"><?= $d['no_spd'] . '<br>' . $d['tgl_spd']; ?></td>
                                <td><?= $d['nominal_spm']; ?></td>
                                <td><?= $d['nokuitansi']; ?></td>
                                <td><?= $d['keperluan']; ?></td>
                                <td><?= rupiah($d['jumlah']); ?> </td>
                                <td><?= $d['tahun']; ?></td>
                                <td><?= $d['map']; ?></td>
                                <td class=" col-1"><?= $d['nama_ruang'] . '-' . $d['no_lemari'] . '-' . $d['baris'] . '-' . $d['box']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Pinjam -->
<div class="modal fade" id="pinjamData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Peminjaman</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="id_lemari" name="id_lemari">
                    <div class="form form-group">
                        <input class="form-control" type="text" name="peminjam" id="peminjam" placeholder="Nama Peminjam" autofocus required>
                    </div>
                    <div class="form form-group">
                        <label for="tgl_kembali">Tanggal Kembali</label><br>
                        <input class="form form-control" type="date" name="tgl_kembali" id="tgl_kembali" required>
                    </div>
                    <div class="form form-group">

                        <input class="form form-control" type="text" name="petugas" id="petugas" placeholder="nama petugas" autofocus required>
                    </div>
                    <div class="form form-group">
                        <label for="spm">No. SPM : </label><br>
                        <input class="form form-control" type="text" name="spm" id="spm" readonly>
                    </div>
                    <div class="form form-group">
                        <label for="spd">No. SP2D : </label><br>
                        <input class="form form-control" type="text" name="spd" id="spd" readonly>
                    </div>
                    <div class="form form-group">
                        <label for="map">Map : </label><br>
                        <input class="form form-control" type="text" name="map" id="map" readonly>
                    </div>
                    <div class="form form-group">
                        <label for="ket">Keterangan </label><br>
                        <input class="form form-control" type="text" name="ket" id="ket">
                    </div>
                    <button type="submit" class="btn btn-outline-primary " name="bpinjam">Pinjamkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).on("click", "#pinjam", function() {
        var id = $(this).data('id');
        var id_lemari = $(this).data('id-lemari');
        var spm = $(this).data('spm');
        var spd = $(this).data('spd');
        var map = $(this).data('map');
        $(".modal-body #id").val(id);
        $(".modal-body #id_lemari").val(id_lemari);
        $(".modal-body #spm").val(spm);
        $(".modal-body #spd").val(spd);
        $(".modal-body #map").val(map);
    })
</script>