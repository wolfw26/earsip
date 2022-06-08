<?php include '../config/koneksi.php';
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Hugo 0.88.1">
    <title>CETAK | E-ARSIP.BPS </title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template -->
</head>
<div class="mt-3">
    <div class="container-fluid d-flex  justify-content-center pt-3 border-bottom border-dark">

        <div class="w-100">
            <h3 class="text-center"> <img class="mr-3" src="../file/bps.png" width="50" height="40">Badan Pusat Statistik Banjarmasin</h3>

            <h5 class="text-center pb-3">Jl. Gatot Subroto No.5, Kuripan, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan 70238</h5>
            <h4 class="text-center pb-3 ">Laporan Data Dokumen</h4>
        </div>

    </div>

    <div class="card-body">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
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
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    window.print()
</script>

</body>

<!-- </html>

</html>

</html>

</html>

</html> -->

</html>