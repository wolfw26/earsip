<?php
include 'config/koneksi.php';
if (isset($_GET["hal"])) {
    if ($_GET['hal'] == 'edt') {
        $darsip = mysqli_query(
            $koneksi,
            "SELECT tbarsip.*,tblemari.id_lemari,tblemari.no_lemari from tbarsip,tblemari where tbarsip.id_lemari = tblemari.id_lemari and tbarsip.id ='$_GET[idarsip]'"
        );
        $data = mysqli_fetch_array($darsip);
        if ($data) {
            $id = $_GET['idarsip'];
            $vkode = $data['kode_arsip'];
            $vnama = $data['nama_arsip'];
            $vtanggal = $data['tanggal'];
            $vdeskripsi = $data['deskripsi'];
            $vsubyek = $data['subyek'];
            $vlemari = $data['id_lemari'];
        }
    }
}
// Cekk tombol button btambah
if (isset($_POST["btambah"])) {
    if ($_GET['hal'] == "edt") {
        //perintah edit data
        //ubah data
        $id = $_GET['idarsip'];
        $kode_arsip = htmlspecialchars(strtoupper($_POST["kode_arsip"]));
        $nama_arsip = htmlspecialchars(lcfirst($_POST["nama_arsip"]));
        $tanggal_arsip = $_POST["tanggal_arsip"];
        $deskripsi_arsip = htmlspecialchars(lcfirst($_POST["deskripsi_arsip"]));
        $kode_lemari = $_POST["kode_lemari"];
        $subyek = $_POST["jsubyek"];

        $ubah = mysqli_query($koneksi, "UPDATE `tbarsip` SET 
                                `kode_arsip` = '$kode_arsip', 
                                `nama_arsip` = '$nama_arsip', 
                                `tanggal` = '$tanggal_arsip', 
                                `deskripsi` = '$deskripsi_arsip', 
                                `id_lemari` = '$kode_lemari', 
                                `subyek` = '$subyek' 
                                WHERE `id` = '$id'");

        if ($ubah) {
            echo "<script>
					alert('Ubah Data Sukses');
					document.location='?halaman=data-arsip';
				</script>";
        } else {
            echo "<script>
					alert('Ubah Data GAGAL!!');
					document.location='?halaman=data-arsip';
				</script>";
        }
    } else {
        //ambil data dari form
        $kode_arsip = htmlspecialchars(strtoupper($_POST["kode_arsip"]));
        $nama_arsip = htmlspecialchars(lcfirst($_POST["nama_arsip"]));
        $tanggal_arsip = $_POST["tanggal_arsip"];
        $deskripsi_arsip = htmlspecialchars(lcfirst($_POST["deskripsi_arsip"]));
        $kode_lemari = $_POST["kode_lemari"];
        $jenis1 = $_POST["jsubyek"];

        //query insert data
        $query = "INSERT INTO tbarsip 
				VALUES 
				('', '$kode_arsip','$nama_arsip','$tanggal_arsip','$deskripsi_arsip','$kode_lemari','$jenis1')
				";
        $data = mysqli_query($koneksi, $query);
        if ($data) {
            echo " <script>
		alert('Simpan Data Sukses');
		document.location='?halaman=data-arsip';
		</script>";
        }
    }
}

?>


<div class="card-header bg-primary bg-opacity-50 text-light">
    Tambah Data Arsip
</div>
<div class="card-body">
    <form action="" method="post" class="user">
        <div class="row">
            <div class="col-lg-7">
                <div class="p-5">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user text-uppercase" name="kode_arsip" required autofocus autocomplete="off" placeholder="Kode Arsip" value="<?= @$vkode; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user text-capitalize" name="nama_arsip" required autofocus autocomplete="off" placeholder="Nama Arsip" value="<?= @$vnama; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_arsip">Tanggal arsip</label>
                        <input type="date" class="form-control form-control-user" id="tanggal_surat" name="tanggal_arsip" placeholder="Tanggal Di terima" value="<?= @$vtanggal; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user text-capitalize" name="deskripsi_arsip" required autofocus autocomplete="off" placeholder="Deskripsi" value="<?= @$vdeskripsi; ?>">
                    </div>

                    <div class="form-group">
                        <select class="form-control form-select" name="kode_lemari" id="arsip-id" value="<?= @$vlemari; ?>" required>
                            <option disabled selected>Lemari</option>
                            <?php
                            $arsip = mysqli_query($koneksi, "SELECT id_lemari,no_lemari,kode_lemari from tblemari ORDER BY no_lemari asc");
                            while ($l = mysqli_fetch_array($arsip)) {
                            ?>
                                <option value=" <?= $l['id_lemari']; ?>">lemari <?= $l['no_lemari']; ?> Kode -><?= $l['kode_lemari']; ?></option>
                            <?php } ?>
                        </select>
                    </div>



                    <hr>
                    <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
									<i class="fab fa-google fa-fw"></i> Register with Google
								</a>
								<a href="index.html" class="btn btn-facebook btn-user btn-block">
									<i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
								</a> -->
                    <hr>
                </div>
            </div>
            <div class="col-lg-5 mt-4">
                <div class="p-5 border">

                    <h3 class=" text-center">Jenis Arsip</h3>
                    <hr>
                    <div class="form-group">
                        <select class="form-control form-select" name="jsubyek" id="jenis" value="<?= @$vsubyek; ?>" required>
                            <?php
                            $query_jurusan = "SELECT * from tbarsip,tblemari where tblemari.id_lemari = tbarsip.id_lemari ORDER BY id desc";
                            $sql_jurusan = mysqli_query($koneksi, $query_jurusan);
                            while ($data_jurusan = mysqli_fetch_array($sql_jurusan)) {
                                if ($_GET['idarsip'] == $data_jurusan['id_jurusan']) {
                                    $select = "selected";
                                } else {
                                    $select = "";
                                }
                                echo "<option $select>" . $data_jurusan['jurusan'] . "</option>";
                            }
                            ?>
                            <option disabled selected>Berdasarkan subyek atau isinya</option>
                            <option value="keuangan">Arsip Keuangan</option>
                            <option value="kepegawaian">Arsip Kepegawaian</option>
                            <option value="sensus">Arsip Sensus</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block" name="btambah">Tambah</button>

    </form>

</div>
</div>