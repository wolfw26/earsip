<?php
include 'config/koneksi.php';


if (isset($_POST['btambah'])) {


    $ruang = htmlspecialchars($_POST['ruang']);
    $lemari = htmlspecialchars($_POST['lemari']);
    $box = htmlspecialchars($_POST['box']);
    $baris = htmlspecialchars($_POST['baris']);
    $ket = htmlspecialchars($_POST['ket']);
    // $tempDir = "qrcode/"; //nama folder simpan qr
    // $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
    // if (!file_exists($tempdir)) //Buat folder bername temp
    //     mkdir($tempdir);
    // //isi qrcode jika di scan
    // $codeContents = $ruang . $lemari . $box . $baris . $ket;
    // //nama file qrcode yang akan disimpan
    // $namaFile = $_POST['ruang'] . $_POST['ket'] . ".png";
    // //ECC Level
    // $level = QR_ECLEVEL_H;
    // //Ukuran pixel
    // $UkuranPixel = 10;
    // //Ukuran frame
    // $UkuranFrame = 4;

    // QRcode::png($codeContents, $tempdir . $namaFile, $level, $UkuranPixel, $UkuranFrame);

    $query = mysqli_query($koneksi, "INSERT INTO `tblemari` (`id_lemari`, `nama_ruang`, `no_lemari`, `box`, `baris`, `lket`) VALUES 
                                                                    ('', '$ruang', '$lemari','$box','$baris','$ket');");
    if ($query) {
        echo " <script>
        alert('Data Di Tambahkan');
        document.location = '?halaman=lemari';
        </script>";
    } else {
        echo " <script>
        alert('Gagal Menambahkan');
        document.location = '?halaman=lemari';
        </script>";
    }
}

if (isset($_POST['bubah'])) {
    $id = $_POST['id'];
    $ruang = htmlspecialchars($_POST['ruang']);
    $lemari = htmlspecialchars($_POST['lemari']);
    $baris = htmlspecialchars($_POST['baris']);
    $box = htmlspecialchars($_POST['box']);
    $ket = htmlspecialchars($_POST['ket']);
    // var_dump($id, $ruang, $lemari, $box, $map, $tahun, $ket);
    // UPDATE `tbklasifikasi` SET
    //  `no_ruang` = 'B', 
    //  `no_lemari` = '2', 
    //  `no_box` = '4', 
    //  `folder` = '112', 
    //  `tahun` = '2021', 
    //  `ket` = 'ubah db' 
    //  WHERE `tbklasifikasi`.`id` = 1;
    $edit = mysqli_query($koneksi, "UPDATE `tblemari` SET 
    `nama_ruang` = '$ruang', 
    `no_lemari` = '$lemari', 
    `box` = '$box', 
    `baris` = '$baris', 
    `lket` = '$ket' 
    WHERE `tblemari`.`id_lemari` = '$id' ");

    if ($edit) {
        echo " <script>
    alert('Data Di Ubah');
    document.location = '?halaman=lemari';
    </script>";
    } else {
        echo " <script>
    alert('Gagal Mengubah');
    document.location = '?halaman=lemari';
    </script>";
    }
} elseif (isset($_GET['hal'])) {
    if ($_GET['hal'] == "dlt") {
        $id = $_GET['id'];
        $hapus = mysqli_query($koneksi, "DELETE FROM tblemari WHERE id_lemari = '$id' ");
        if ($hapus) {
            echo " <script>
    document.location = '?halaman=lemari';
</script>";
        } else {
            echo " <script>
    alert('Hapus Data GAGAL');
    document.location = '?halaman=lemari';
</script>";
        }
    }
}
?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kode Lokasi Penyimpanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="border-bottom-dark border-2 mb-3">
                    <a class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus fa-md"></i>Tambah kode </a>
                    <a href="cetak/cetak_lemari.php" class="btn btn-sm btn-outline-success mb-3" target="_blank"><i class="fas fa-print fa-md"></i>Cetak </a>

                </div>


                <table class="table table-bordered table-hover table-sm" id="dataTable" width="auto" cellspacing="0">
                    <thead class=" text-center">
                        <tr>
                            <th>Fungsi</th>
                            <th>No</th>
                            <th>Kode Ruang</th>
                            <th>Kode Lemari</th>
                            <th>Kode baris</th>
                            <th>Kode box</th>
                            <th>Keterangan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qtampil = mysqli_query($koneksi, 'SELECT * FROM tblemari order by id_lemari desc');
                        $no = 1;
                        while ($d = mysqli_fetch_assoc($qtampil)) {
                        ?>
                            <tr>
                                <td class="text-center p-2">
                                    <!-- btn edit -->
                                    <a id="tubah" data-toggle="modal" data-target="#modalUbah" data-id="<?= $d['id_lemari']; ?>" data-ruang="<?= $d['nama_ruang']; ?>" data-lemari="<?= $d['no_lemari']; ?>" data-box="<?= $d['box']; ?>" data-baris="<?= $d['baris']; ?>" data-ket="<?= $d['lket']; ?>" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit fa-sm">Edit</i></a>
                                    <!-- btn Hapus -->
                                    <a class="btn btn-danger btn-sm mr-2" href="?halaman=lemari&hal=dlt&id=<?= $d['id_lemari']; ?>" name="hapus" onclick="return confirm('Apakah yakin ingin menghapus ini?')">
                                        <i class="fas fa-trash fa-sm"></i> Delete</a>

                                </td>

                                <th class="text-center"><?= $no++ . '.'; ?></th>
                                <th class="text-center"><?= $d['nama_ruang']; ?></th>
                                <th class="text-center"><?= $d['no_lemari']; ?></th>
                                <th class="text-center"><?= $d['baris']; ?></th>
                                <th class="text-center"><?= $d['box']; ?></th>
                                <td><?= $d['lket']; ?></td>



                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- MODAL -->
<div id="tambahData" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content  modal-md">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Lokasi Penyimpanan</h5>

                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-2">
                        <label for="ruang" class="form-label">Ruang Arsip</label>
                        <input type="text" class="form-control" id="ruang" name="ruang" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="lemari" class="form-label">No. Lemari</label>
                        <input type="number" class="form-control" id="lemari" name="lemari" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="box" class="form-label">No. Box</label>
                        <input type="number" class="form-control" id="box" name="box" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="baris" class="form-label">No. Baris</label>
                        <input type="number" class="form-control" id="baris" name="baris" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control" placeholder="Keterangan" style="height: 100px" name="ket"></textarea>
                        <label for="ket">Keterangan</label>
                    </div>


                    <button type="submit" class="btn btn-primary" name="btambah">Tambahkan</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<!-- modal edit -->

<div id="modalUbah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content  modal-md">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Kode Klasifikasi</h5>

                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" id="id" name="id">
                    <div class="mb-2">
                        <label for="ruang" class="form-label">Ruang Arsip</label>
                        <input type="text" class="form-control" id="ruang" name="ruang" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="lemari" class="form-label">No. Lemari</label>
                        <input type="number" class="form-control" id="lemari" name="lemari" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="box" class="form-label">No. Box</label>
                        <input type="number" class="form-control" id="box" name="box" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="map" class="form-label">No. Baris</label>
                        <input type="number" class="form-control" id="baris" name="baris" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control" placeholder="Keterangan" style="height: 100px" id="ket" name="ket"></textarea>
                        <label for="ket">Keterangan</label>
                    </div>


                    <button type="submit" class="btn btn-primary" name="bubah">Tambahkan</button>
                </form>
            </div>
            <div class="modal-footer">
                <br>
            </div>
        </div>
    </div>
</div>
<script src="assets/vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).on("click", "#tubah", function() {
        var id = $(this).data('id');
        var ruang = $(this).data('ruang');
        var lemari = $(this).data('lemari');
        var box = $(this).data('box');
        var baris = $(this).data('baris');
        var tahun = $(this).data('tahun');
        var ket = $(this).data('ket');
        $(".modal-body #id").val(id);
        $(".modal-body #ruang").val(ruang);
        $(".modal-body #lemari").val(lemari);
        $(".modal-body #box").val(box);
        $(".modal-body #baris").val(baris);
        $(".modal-body #tahun").val(tahun);
        $(".modal-body #ket").val(ket);
    })
</script>