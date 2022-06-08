<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-primary text-center">
        <h1 class="h3 mb-2 text-gray-800">Table Dokumen Keuangan</h1>
        <p class="mb-4 border-bottom-dark border-1"> Data keuangan yang sudah di data dan di simpan ke Ruang Arsip.</p>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a target="_blank" class="btn btn-outline-secondary" href="cetak/cetak_dokumen.php"><i class="fa fa-print mr-2 text-dark" aria-hidden="true"></i>Cetak Data</a>
                </h6>
            </div>


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                    <thead class=" bg-info text-dark">
                        <tr class=" text-center">
                            <th>No.</th>
                            <th>Kode Klasifikasi</th>
                            <th>No. SPM</th>
                            <th>No. SP2D</th>
                            <th>Keterangan</th>
                            <th>Tahun</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM tdokumen,tbklasifikasi,tblemari where tdokumen.klasifikasi_id = tbklasifikasi.id_klas and tdokumen.lemari_id = tblemari.id_lemari order by tdokumen.id desc ");
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($sql)) {


                        ?>
                            <tr>
                                <th><?= $no++; ?></th>
                                <th><?= $data['kode1']  . $data['kode2']; ?></th>
                                <td class="col col-2 text-wrap"><?= $data['no_spm']; ?></td>
                                <td class="col col-2"><?= $data['no_spd']; ?></td>
                                <td class="col  col-3"><?= $data['ket']; ?></td>
                                <td><?= $data['tahun']; ?></td>
                                <td class="col col-1">
                                    <abbr title="Nama Ruang - No Lemari - Baris - Box"><?= $data['nama_ruang'] . '-' . $data['no_lemari'] . '-' . $data['baris'] . '-' . $data['box']; ?></abbr>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>