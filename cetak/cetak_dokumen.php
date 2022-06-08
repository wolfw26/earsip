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
            <h4 class="text-center pb-3 ">Laporan Data Dokumen</h4>
        </div>

    </div>

    <div class="card-body">
        <table class="table table-bordered table-hovered table-striped">
            <tr class=" text-center">
                <th>No.</th>
                <th>Kode Klasifikasi</th>
                <th>No. SPM</th>
                <th>No. SP2D</th>
                <th>Keterangan</th>
                <th>Tahun</th>
                <th>Lokasi</th>
            </tr>
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
                        <td class="col col-3">
                            <abbr title="Nama Ruang - No Lemari - Baris - Box"><?= $data['nama_ruang'] . '-' . $data['no_lemari'] . '-' . $data['baris'] . '-' . $data['box']; ?></abbr>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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