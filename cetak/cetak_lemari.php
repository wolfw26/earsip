<?php include '../config/koneksi.php';


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
            <h4 class="text-center pb-3 ">Laporan Peminjaman</h4>
        </div>

    </div>

    <div class="card-body">
        <table class="table table-bordered table-hovered table-striped">
            <tr>
                <th>No</th>
                <th>Kode Ruang</th>
                <th>Kode Lemari</th>
                <th>Kode baris</th>
                <th>Kode box</th>
                <th>Keterangan</th>
                <th>Data Tersimpan</th>


            </tr>
            <?php
            $qtampil = mysqli_query($koneksi, 'SELECT * FROM tblemari  order by id_lemari desc');
            $no = 1;

            while ($d = mysqli_fetch_assoc($qtampil)) {
                $id = $d['id_lemari'];
            ?>
                <tr>
                    <th class="text-center"><?= $no++ . '.'; ?></th>
                    <th class="text-center"><?= $d['nama_ruang']; ?></th>
                    <th class="text-center"><?= $d['no_lemari']; ?></th>
                    <th class="text-center"><?= $d['baris']; ?></th>
                    <th class="text-center"><?= $d['box']; ?></th>
                    <th class="text-center"><?= $d['lket']; ?></th>
                    <?php
                    $q = mysqli_query($koneksi, "SELECT * FROM tdokumen where tdokumen.lemari_id = $id ");
                    $dp = mysqli_num_rows($q);
                    ?>
                    <td><?= $dp ?></td>

                </tr>


            <?php } ?>
        </table>
    </div>


</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    window.print()
</script>

</body>


</html>