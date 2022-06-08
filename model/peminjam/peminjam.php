<?php
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "kembali") {
        $id = $_GET['id'];
        $q = mysqli_query($koneksi, "UPDATE `tdokumen` SET `status` = 'tersedia' WHERE `tdokumen`.`id` = $id;");
    }
}
?>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
    </div>
    <div class="card-body">
        <a target="_blank" href="cetak/Laporan_peminjaman.php" class="btn btn-outline-warning btn-sm"><i class="fas fa-print fa-lg"></i> Cetak</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                    <tr class=" text-center">
                        <th>Aksi</th>
                        <th>No.</th>
                        <th>Nama Peminjam</th>
                        <th>No. SPM</th>
                        <th>No. SPD</th>
                        <th>Ruang</th>
                        <th>tgl_Pinjam</th>
                        <th>tgl_Kembali</th>
                        <th>Lain-lain</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $q = mysqli_query($koneksi, "SELECT
                    rkpinjam.*,
                    tdokumen.id,
                    tdokumen.no_spm,
                    tdokumen.no_spd,
                    tblemari.nama_ruang,
                    tblemari.no_lemari,
                    tblemari.baris,
                    tblemari.box from rkpinjam,tdokumen,tblemari where  tdokumen.status = 'dipinjam' and rkpinjam.dokumen_id = tdokumen.id and tdokumen.lemari_id = tblemari.id_lemari  order by rkpinjam.id_pinjam desc ");
                    $no = 1;
                    while ($d = mysqli_fetch_assoc($q)) {
                    ?>
                        <tr>
                            <td>
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <a href="?halaman=peminjam&hal=kembali&id=<?= $d['id']; ?>" name="kembali" class="btn btn-outline-success">Dikembalikan</a>
                                </h6>
                            </td>
                            <th><?= $no++; ?> .</th>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['no_spm']; ?></td>
                            <td><?= $d['no_spd']; ?></td>
                            <td><?= $d['nama_ruang'] . '-' . $d['no_lemari'] . '-' . $d['baris'] . '-' . $d['box']; ?></td>
                            <td><?= $d['tgl_pinjam']; ?></td>
                            <td><?= $d['tgl_kembali']; ?></td>
                            <td><?= $d['ket']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>