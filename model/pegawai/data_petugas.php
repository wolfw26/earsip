<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class=" text-capitalize text-center">
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Bagian</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- id`, `username`, `password`, `level`, `nama_lengkap`, `tgl_lahir`, `alamat`, `jk`, `nope`, `bagian` -->
                        <?php
                        $q = mysqli_query($koneksi, "SELECT * FROM `tuser` ORDER BY `id` DESC");
                        $no = 1;
                        while ($d = mysqli_fetch_assoc($q)) {
                        ?>

                            <tr class="text-center">
                                <th><?= $no++; ?></th>
                                <td><?= $d['nama_lengkap']; ?></td>
                                <td><?= $d['tgl_lahir']; ?></td>
                                <td><?= $d['alamat']; ?></td>
                                <td><?= $d['nope']; ?></td>
                                <td><?= $d['bagian']; ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>