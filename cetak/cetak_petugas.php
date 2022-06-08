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
    <div class="w-100">
        <h3 class="text-center"> <img class="mr-3" src="../file/bps.png" width="50" height="40">Badan Pusat Statistik Banjarmasin</h3>

        <h5 class="text-center pb-3">Jl. Gatot Subroto No.5, Kuripan, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan 70238</h5>
        <h4 class="text-center pb-3 ">Laporan Data Petugas</h4>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hovered table-striped">
            <tr>
                <td>Username</td>
                <td>Level</td>
                <td>Nama Lengkap</td>
            </tr>
            <?php
            $tadmin = mysqli_query($koneksi, "SELECT * from tuser ORDER BY id desc");
            while ($t = mysqli_fetch_array($tadmin)) {
            ?>
                <tr>
                    <td><?= $t['username']; ?></td>
                    <td><?= $t['level']; ?></td>
                    <td><?= $t['nama_lengkap']; ?></td>
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

</html>dow.print()
</script>

</body>

</html>