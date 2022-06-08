<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-primary text-center">
        <h1 class="h3 mb-2 text-gray-800">Detail Dokumen</h1>
        <?php
        $id = $_GET['id'];
        $sql = mysqli_query($koneksi, "SELECT * FROM tdokumen where tdokumen.id = $id ");
        $d = mysqli_fetch_assoc($sql);
        ?>
        <p class="mb-4"> Nomor SPM : <?= $d['no_spm']; ?></p>
        <p class="mb-4"> Nomor SP2D : <?= $d['no_spd']; ?></p>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <!-- <a href="" class=" btn btn-outline-success" data-toggle="modal" data-target="#tambahData"> Entry Data</a> -->

                <a target="_blank" href="cetak/cetak_detail_surat.php?id=<?= $d['id']; ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-print fa-lg"></i> Cetak</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <?php
                    $id = $_GET['id'];
                    $sql = mysqli_query($koneksi, "SELECT * FROM tdokumen where tdokumen.id = $id order by tdokumen.id desc ");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($sql)) {


                    ?>
                        <tr>
                            <th scope="row">No. SPM : </th>
                            <td class="col col-8"><?= $data['no_spm']; ?></td>
                            <td><?= $data['tgl_spm']; ?></td>


                        </tr>
                        <tr>
                            <th scope="row">No. SP2D : </th>
                            <td class="col col-8"><?= $data['no_spd']; ?></td>
                            <td><?= $data['tgl_spd']; ?></td>

                        </tr>
                        <tr>
                            <th scope="row">Tahun : </th>
                            <td class="col col-8"><?= $data['tahun']; ?></td>
                            <td>
                                <strong>Map : </strong><?= $data['map']; ?>
                            </td>

                        </tr>
                    <?php } ?>
                </table>
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class=" text-center text-capitalize bg-gradient-info text-light">
                        <th>Field</th>
                        <th>Rincian</th>
                        <th>Lain-lain</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM tdokumen,tbklasifikasi,tblemari where tdokumen.klasifikasi_id = tbklasifikasi.id_klas AND tdokumen.lemari_id = tblemari.id_lemari AND tdokumen.id = $id order by tdokumen.id desc ");
                        $data = mysqli_fetch_assoc($sql);
                        ?>

                        <tr>
                            <th>Nomor SPM</th>
                            <td class=" text-center"><?= $data['no_spm']; ?></td>
                            <td><?= $data['nominal_spm']; ?></td>
                        </tr>
                        <tr>
                            <th>Nomor SP2D</th>
                            <td class=" text-center"><?= $data['no_spd']; ?></td>
                        </tr>
                        <tr>
                            <th>Rincian Kuitansi</th>
                            <td class=" text-center"><?= $data['nokuitansi']; ?>. <br> .<?= $data['kdari']; ?>. <br> .<?= $data['keperluan']; ?></td>
                            <td><?= $data['jumlah']; ?></td>
                        </tr>
                        <tr>
                            <th>Nota/ <br> invoice <br> <?= $data['ntgl']; ?> </th>
                            <td class=" text-center"><?= $data['ndari']; ?> <br> <?= $data['nkeperluan']; ?></td>
                            <td><?= $data['nnominal']; ?></td>
                        </tr>
                        <tr>
                            <th>Tujuan Dokumen</th>
                            <td class=" text-center"><?= $data['tujuan']; ?></td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td class=" text-center"><?= $data['tahun']; ?></td>
                        </tr>
                        <tr>
                            <th>Kode Klasifikasi</th>
                            <td class=" text-center"><?= $data['kode1'] . '-' . $data['kode2']; ?></td>
                            <td><?= $data['ket']; ?></td>
                        </tr>
                        <tr>
                            <th>Ringkasan</th>
                            <td class=" text-center"><?= $data['ket']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengarsipan</th>
                            <td class=" text-center"><?= $data['tgl_masuk']; ?></td>
                        </tr>
                        <tr>
                            <th>Lokasi penyimpanan</th>
                            <td class=" text-center"><?= $data['nama_ruang'] . '-' . $data['no_lemari'] . '-' . $data['baris'] . '-' . $data['box']; ?></td>
                        </tr>
                        <tr>
                            <th>File..</th>
                            <td><?= $data['file']; ?></td>
                        </tr>

                </table>
            </div>
        </div>
    </div>
</div>