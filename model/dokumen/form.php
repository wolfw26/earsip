<?php
if (isset($_POST['doktambah'])) {
    //ambil da5ta dari form
    $kode1 = htmlspecialchars($_POST['dok-kode1'] . $_POST['dok-kode2']);
    $judul = htmlspecialchars($_POST['dok-judul']);
    $deskripsi = htmlspecialchars($_POST['dok-deskripsi']);
    //$id = mysqli_query($koneksi, "SELECT id_dokumen from tbdokumen");
    $tanggal = $_POST['dok-tanggal'];
    $jenis1 = $_POST['subyek'];
    $jenis2 = $_POST['keaslian'];
    $jenis3 = $_POST['sifat'];
    $jenis4 = $_POST['jfungsi'];
    $arsip_id = $_POST['arsip-id'];


    $query = "INSERT INTO tbdokumen (`id_dokumen`, `kode`, `dok_judul`, `dok_deskripsi`, `tangal`, `arsip_id`, `subyek`, `keaslian`, `sifat`, `fungsi`) 
                                        VALUES ('', '$kode1', '$judul', '$deskripsi', '$tanggal', '$arsip_id', '$jenis1', '$jenis2', '$jenis3', '$jenis4')
                ";

    $simpan = mysqli_query($koneksi, $query);
    if ($simpan) {
        echo " <script>
    alert('Simpan Data Sukses');
    document.location = '?halaman=data-dokumen';
</script>";
    } else {
        echo " <script>
    alert('Simpan Data gagal');
    document.location = '?halaman=data-dokumen';
</script>";
        echo "mysqli_error($koneksi)";
    }
}

?>

<div class="container-md">
    <form class="user mb-4" method="POST">
        <div class="row mb-4">
            <div class="col-lg-7">
                <div class="alert alert-primary" role="alert">
                    DATA DOKUMEN / SURAT
                </div>
                <div class="card shadow-lg p-4">

                    <div class="form-group row">
                        <div class=" col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user text-uppercase" required autofocus autocomplete="off" placeholder="Kode dokumen" name="dok-kode1">
                        </div>

                        <div class="col-sm-6">
                            <input type="number" class="form-control form-control-user" required autofocus autocomplete="off" placeholder="Kode dokumen" name="dok-kode2">
                        </div>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" required autofocus autocomplete="off" placeholder="Judul Surat" name="dok-judul">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" required autocomplete="off" placeholder="deskripsi" name="dok-deskripsi">
                    </div>

                    <div class="form-group">
                        <label for="date1">Tanggal di buat</label>
                        <input type="date" class="form-control form-control-user dataTables_paginate" required id="date1" placeholder="Tanggal di buat" name="dok-tanggal">

                    </div>
                    <div class="form-group">
                        <select class="form-control form-select" name="arsip-id" id="arsip-id" required>
                            <option disabled selected>-ARSIP-</option>
                            <?php
                            $arsip = mysqli_query($koneksi, "SELECT id,kode_arsip,nama_arsip from tbarsip");
                            while ($d = mysqli_fetch_array($arsip)) {
                            ?>
                                <option value="<?= $d['id']; ?>"><?= $d['kode_arsip']; ?>-<?= $d['nama_arsip']; ?></option>
                            <?php } ?>
                        </select>
                    </div>




                </div>
            </div>

            <div class="col-lg-5 mt-4">
                <div class="p-5 border">

                    <h3 class=" text-center">Jenis Surat</h3>
                    <hr>
                    <div class="form-group">
                        <select class="form-control form-select" name="subyek" id="jenis" required>
                            <option disabled selected>Berdasarkan subyek atau isinya</option>
                            <option value="keuangan">Surat Keuangan</option>
                            <option value="kepegawaian">surat Kepegawaian</option>
                            <option value="null">...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-select" name="keaslian" id="jenis" required>
                            <option disabled selected>Berdasarkan Keaslianya</option>
                            <option value="asli">Asli</option>
                            <option value="salinan">Salinan</option>
                            <option value="tembusan">Tembusan</option>
                            <option value="null">...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-select" name="sifat" id="jenis" required>
                            <option disabled selected>Berdasarkan Sifatnya</option>
                            <option value="rahasia">Rahasia</option>
                            <option value="penting">Penting</option>
                            <option value="biasa">Biasa</option>
                            <option value="null">...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-select" name="jfungsi" id="jenis" required>
                            <option disabled selected>Berdasarkan Fungsi</option>
                            <option value="aktif">Aktif</option>
                            <option value="semi-aktif">Semi-Aktif</option>
                            <option value="statis">Statis</option>
                            <option value="null">...</option>
                        </select>
                    </div>


                </div>
            </div>
        </div>
        <button class="fa fa-check btn btn-primary btn-user btn-block" name="doktambah">
            <i class="fa fa-check"></i>
            Tambah
        </button>
    </form>
</div>