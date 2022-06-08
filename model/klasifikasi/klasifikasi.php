<?php
include 'config/koneksi.php';


if (isset($_POST['btambah'])) {
    $kode1 = htmlspecialchars($_POST['kode1']);
    $kode2 = htmlspecialchars($_POST['kode2']);
    $ket = htmlspecialchars($_POST['ket']);
    $query = mysqli_query($koneksi, "INSERT INTO `tbklasifikasi` (`id_klas`,`kode1`,`kode2` , `ket`) VALUES 
                                                                    ('','$kode1','$kode2','$ket');");
    if ($query) {
        echo " <script>
        alert('Klasifikasi Di Tambahkan');
        document.location = '?halaman=klasifikasi';
        </script>";
    } else {
        echo " <script>
        alert('Gagal Menambahkan');
        document.location = '?halaman=klasifikasi';
        </script>";
    }
}

if (isset($_POST['bubah'])) {
    $id = $_POST['id'];
    $kode1 = htmlspecialchars($_POST['kode1']);
    $kode2 = htmlspecialchars($_POST['kode2']);
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
    $edit = mysqli_query($koneksi, "UPDATE `tbklasifikasi` SET 
    `kode1` = '$kode1', 
    `kode2` = '$kode2', 
    `ket` = '$ket' 
    WHERE `tbklasifikasi`.`id_klas` = '$id' ");

    if ($edit) {
        echo " <script>
    alert('Klasifikasi Di Ubah');
    document.location = '?halaman=klasifikasi';
    </script>";
    } else {
        echo " <script>
    alert('Gagal Mengubah');
    document.location = '?halaman=klasifikasi';
    </script>";
    }
} elseif (isset($_GET['hal'])) {
    if ($_GET['hal'] == "dlt") {
        $id = $_GET['id'];
        $hapus = mysqli_query($koneksi, "DELETE FROM tbklasifikasi WHERE id_klas = '$id' ");
        if ($hapus) {
            echo " <script>
    document.location = '?halaman=klasifikasi';
</script>";
        } else {
            echo " <script>
    alert('Hapus Data GAGAL');
    document.location = '?halaman=klasifikasi';
</script>";
        }
    }
}
?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kode klasifikasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="border-bottom-dark border-2 mb-3">
                    <a class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahData">Tambah kode </a>
                </div>


                <table class="table table-bordered table-hover table-sm" id="dataTable" width="auto" cellspacing="0">
                    <thead class=" text-center">
                        <tr>
                            <th>Fungsi</th>
                            <th>No</th>
                            <th>Kode Klasifikasi</th>
                            <th>Perihal</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qtampil = mysqli_query($koneksi, 'SELECT * FROM tbklasifikasi');
                        $no = 1;
                        while ($d = mysqli_fetch_assoc($qtampil)) {
                        ?>
                            <tr>
                                <th class="text-center"><?= $no++ . '.'; ?></th>
                                <td class="text-center p-2">
                                    <!-- btn edit -->
                                    <a id="tubah" data-toggle="modal" data-target="#modalUbah" data-id="<?= $d['id_klas']; ?>" data-kode1="<?= $d['kode1']; ?>" data-kode2="<?= $d['kode2']; ?>" data-ket="<?= $d['ket']; ?>" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit fa-sm">Edit</i></a>
                                    <!-- btn Hapus -->
                                    <a class="btn btn-danger btn-sm mr-2" href="?halaman=klasifikasi&hal=dlt&id=<?= $d['id_klas']; ?>" name="hapus" onclick="return confirm('Apakah yakin ingin menghapus ini?')">
                                        <i class="fas fa-trash fa-sm"></i> Delete</a>

                                </td>

                                <th class="text-center"><?= $d['kode1'] . $d['kode2']; ?></th>
                                <td class=" text-capitalize"><?= $d['ket']; ?></td>



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
                <h5 class="modal-title">Form Tambah Kode Klasifikasi</h5>

                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="row mb-3">
                        <label for="kode" class="form-label">Kode klasivikasi</label>
                        <div class="col-5">
                            <input type="text" class="form-control text-uppercase" id="kode1" name="kode1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" id="kode2" name="kode2" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control text-capitalize" placeholder="Keterangan" style="height: 100px" id="ket" name="ket"></textarea>
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
                    <div class="row mb-3">
                        <label for="kode" class="form-label">Kode klasivikasi</label>
                        <div class="col-5">
                            <input type="text" class="form-control" id="kode1" name="kode1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" id="kode2" name="kode2" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control" placeholder="Keterangan" style="height: 100px" name="ket" id="ket"></textarea>
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
        var kode1 = $(this).data('kode1');
        var kode2 = $(this).data('kode2');
        var ket = $(this).data('ket');
        $(".modal-body #id").val(id);
        $(".modal-body #kode1").val(kode1);
        $(".modal-body #kode2").val(kode2);
        $(".modal-body #ket").val(ket);
    })
</script>