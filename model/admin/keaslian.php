<div class="container-fluid">
    <div class="card mt-3 bg-light bg-opacity-100">
        <div class="card-header bg-primary text-light text-center display-5">
            Data Surat - Berdasarkan Keaslian
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Subyek</th>
                                <th scope="col">Kode Arsip - No.Lemari</th>
                                <th scope="col">Nama Arsip</th>
                                <th scope="col">Keaslian</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include 'config/koneksi.php';
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbdokumen,tbarsip where tbdokumen.arsip_id = tbarsip.id ORDER BY id_dokumen desc");
                            $no = 1;
                            while ($data1 = mysqli_fetch_assoc($tampil)) {

                            ?>
                                <tr class=" text-center">
                                    <th><?= $no++; ?></th>
                                    <th class=" text-uppercase"><?= $data1['kode']; ?></th>
                                    <td><?= $data1['dok_judul']; ?></td>
                                    <td><?= $data1['tangal']; ?></td>
                                    <td><?= $data1['dok_deskripsi']; ?></td>
                                    <td><?= $data1['subyek']; ?></td>
                                    <td><?= $data1['kode_arsip'], "-", $data1['id_lemari']; ?></td>
                                    <th><?= $data1['nama_arsip']; ?></th>
                                    <td class=" bg-gray-400 text-dark text-uppercase"><?= $data1['keaslian']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>