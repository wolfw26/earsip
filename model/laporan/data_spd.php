<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <!-- <a href="" class=" btn btn-outline-success" data-toggle="modal" data-target="#tambahData"> Entry Data</a> -->

            <a target="_blank" href="cetak/laporan_spd.php" class=" btn btn-outline-secondary btn-sm"><i class="fas fa-print fa-lg"></i> Cetak</a>
        </h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                <thead class=" text-center text-capitalize bg-gradient-primary text-light">
                    <th>No.</th>
                    <th>No. SP2D</th>
                    <th>Tanggal</th>
                    <th>Map</th>
                </thead>
                <tbody>
                    <?php

                    $sql = mysqli_query($koneksi, "SELECT * FROM tdokumen group by tgl_spm order by tgl_spm desc ");
                    $no = 1;
                    $total = 0;
                    $jumlah = mysqli_num_rows($sql);
                    while ($data = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <th class="col col-sm-1 text-center"><?= $no++; ?>.</th>
                            <td class="col col-4 text-center"><?= $data['no_spd']; ?></td>
                            <td class="text-center"><?= $data['tgl_spd']; ?></td>
                            <td class=" col col-3 text-center"><?= $data['map']; ?></td>
                        </tr>
                </tbody>

            <?php } ?>
            <tfoot>
                <th>Jumlah data : </th>
                <th><?= $jumlah; ?></th>
                <th></th>
                <th></th>
            </tfoot>
            </table>
        </div>
    </div>
</div>
</div>