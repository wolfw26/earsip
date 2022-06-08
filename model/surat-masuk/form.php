<?php

if (isset($_GET["hal"])) {
    if ($_GET['hal'] == 'hapus') {
        $id = $_GET['id'];
        $dlt = mysqli_query($koneksi, "DELETE FROM tdokumen where id = $id");
        if ($dlt) {
            echo " <script>
            document.location = '?halaman=surat-masuk';
            </script>";
        } else {
            echo " <script>
            alert('gagal di Hapus');
            document.location = '?halaman=surat-masuk';
            </script>";
        }
    }
}
if (isset($_POST['btambah'])) {
    $tgl = date('Y-m-d');
    $spm = htmlspecialchars($_POST['spm']);
    $tgl_spm = htmlspecialchars($_POST['tgl_spm']);
    $nominal_spm = htmlspecialchars($_POST['nominal_spm']);
    $spd = htmlspecialchars($_POST['sp2d']);
    $tgl_spd = htmlspecialchars($_POST['tgl_sp2d']);
    $kuitansi = htmlspecialchars($_POST['no_kuitansi']);
    $dari = htmlspecialchars($_POST['dari']);
    $jkuitansi = htmlspecialchars($_POST['jkuitansi']);
    $keperluan = htmlspecialchars($_POST['keperluan']);
    $ndari = htmlspecialchars($_POST['ndari']);
    $ntgl = htmlspecialchars($_POST['ntgl']);
    $nnominal = htmlspecialchars($_POST['nnominal']);
    $nkeperluan = htmlspecialchars($_POST['nkeperluan']);
    $tujuan = htmlspecialchars($_POST['tujuan']);
    $tahun = htmlspecialchars($_POST['tahun']);
    $klas = htmlspecialchars($_POST['klas']);
    $jenis = htmlspecialchars($_POST['jenis']);
    $ringkasan = htmlspecialchars($_POST['ringkasan']);
    $map = htmlspecialchars($_POST['map']);
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $tujuan = htmlspecialchars($_POST['tujuan']);
    $jenis = htmlspecialchars($_POST['jenis']);

    $ekstensi_diperbolehkan    = array('docx', 'xlsx', 'pdf');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['file']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'file/' . $nama);
    }

    $query = mysqli_query($koneksi, "INSERT INTO `tdokumen` 
    (`id`, `no_spm`, `tgl_spm`, `nominal_spm`, `no_spd`, `tgl_spd`, `nokuitansi`, `kdari`, `jumlah`, `keperluan`, `ndari`, `ntgl`, `nnominal`, `nkeperluan`, `tujuan`, `tahun`, `klasifikasi_id`,`jenis`, `ket`, `map`, `tgl_masuk`, `lemari_id`, `status`, `file`) VALUES   ('', '$spm', '$tgl_spm','$nominal_spm', '$spd', '$tgl_spd', '$kuitansi', '$dari', '$jkuitansi', '$keperluan', '$ndari', '$ntgl', '$nnominal', '$nkeperluan','$tujuan','$tahun','$klas','$jenis','$ringkasan','$map','$tgl','$lokasi','tersedia','$nama')");
    if ($query) {
        echo " <script>
        alert('Data Telah Di Tambahkan');
        document.location = '?halaman=surat-masuk';
        </script>";
    } else {
        echo " <script>
        alert('Gagal Menambahkan');
        document.location = '?halaman=surat-masuk';
        </script>";
    }
}

if (isset($_POST['bubah'])) {
    $tgl = date('Y-m-d');
    $id = $_POST['id'];
    $spm = htmlspecialchars($_POST['spm']);
    $tgl_spm = htmlspecialchars($_POST['tgl_spm']);
    $nominal_spm = htmlspecialchars($_POST['nominal_spm']);
    $spd = htmlspecialchars($_POST['sp2d']);
    $tgl_spd = htmlspecialchars($_POST['tgl_sp2d']);
    $kuitansi = htmlspecialchars($_POST['no_kuitansi']);
    $dari = htmlspecialchars($_POST['dari']);
    $jkuitansi = htmlspecialchars($_POST['jkuitansi']);
    $keperluan = htmlspecialchars($_POST['keperluan']);
    $ndari = htmlspecialchars($_POST['ndari']);
    $ntgl = htmlspecialchars($_POST['ntgl']);
    $nnominal = htmlspecialchars($_POST['nnominal']);
    $nkeperluan = htmlspecialchars($_POST['nkeperluan']);
    $tujuan = htmlspecialchars($_POST['tujuan']);
    $tahun = htmlspecialchars($_POST['tahun']);
    $klas = htmlspecialchars($_POST['klas']);
    $jenis = htmlspecialchars($_POST['jenis']);
    $ringkasan = htmlspecialchars($_POST['ringkasan']);
    $map = htmlspecialchars($_POST['map']);
    $lokasi = htmlspecialchars($_POST['lokasi']);

    $ekstensi_diperbolehkan    = array('docx', 'xlsx', 'pdf');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['file']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'file/' . $nama);
    }
    $edit = mysqli_query($koneksi, "UPDATE `tdokumen` SET 
    `no_spm` = '$spm', 
    `tgl_spm` = '$tgl_spm', 
    `nominal_spm` = '$nominal_spm', 
    `no_spd` = '$spd', 
    `tgl_spd` = '$tgl_spd', 
    `nokuitansi` = '$kuitansi', 
    `kdari` = '$dari', 
    `jumlah` = '$jkuitansi', 
    `keperluan` = '$keperluan', 
    `ndari` = '$ndari', 
    `ntgl` = '$ntgl', 
    `nnominal` = '$nnominal', 
    `nkeperluan` = '$nkeperluan', 
    `tujuan` = '$tujuan', 
    `tahun` = '$tahun', 
    `klasifikasi_id` = '$klas', 
    `jenis` = '$jenis', 
    `ket` = '$ringkasan', 
    `map` = '$map', 
    `lemari_id` = '$lokasi'
    WHERE `tdokumen`.`id` = $id ");

    if ($edit) {
        echo " <script>
    alert('Data Di Ubah');
    document.location = '?halaman=surat-masuk';
    </script>";
    } else {
        echo " <script>
    alert('Gagal Mengubah');
    document.location = '?halaman=surat-masuk';
    </script>";
    }
}

?>

<!-- -> ID CArd (1) drop down dari databse
    -> nama petugas arsip (2) diambil dari id card id
    -> nomor surat (manual aja) 09K4t4
    -> tgl surat (Date)
    -> tgl diterima (date) 
    -> Surat M/K (drop down) array manual 
    
    -> Perihal/ deskripsi surat (text)
    -> lampiran (number)
    -> kode klasifikasi (dropdown ambil dari form klasifikasi)
    -> Keterangan ( agung podo moro)
    -> isi ringkasan ( Pesanan meja 100)
    -> Dari (varc)
    -> Kepada (BPS)
    -> indeks/subjek
    -> catatan
    -> cabinet / Rak
    -> catatan 
-->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-primary text-center">
        <h1 class="h3 mb-2 text-gray-800">Table Dokumen Keuangan</h1>
        <p class="mb-4 border-bottom-dark border-1"> Data keuangan yang sudah di data dan di simpan ke Ruang Arsip.</p>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex">

                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="" class=" btn btn-outline-success" data-toggle="modal" data-target="#tambahData"> Entry Data</a>
                </h6>
                <h6 class="m-0 font-weight-bold text-primary">
                    <a target="_blank" class="btn btn-outline-warning" href="cetak/cetak_dokumen.php"><i class="fa fa-print mr-2 text-dark" aria-hidden="true"></i>Cetak Data</a>
                </h6>
            </div>


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                    <thead class=" bg-info text-dark">
                        <tr class=" text-center">
                            <th>No.</th>
                            <th>Kode Klasifikasi</th>
                            <th>No. SPM</th>
                            <th>No. SP2D</th>
                            <th>Keterangan</th>
                            <th>Tahun</th>
                            <th>Lokasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($koneksi, "SELECT tdokumen.*,tblemari.*,tbklasifikasi.id_klas,tbklasifikasi.kode1,tbklasifikasi.kode2 FROM tdokumen,tbklasifikasi,tblemari where tdokumen.klasifikasi_id = tbklasifikasi.id_klas and tdokumen.lemari_id = tblemari.id_lemari order by tdokumen.id desc ");
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
                                <td class="col col-1">
                                    <abbr title="Nama Ruang - No Lemari - Baris - Box"><?= $data['nama_ruang'] . '-' . $data['no_lemari'] . '-' . $data['baris'] . '-' . $data['box']; ?></abbr>
                                </td>
                                <td class="col col-4" class="text-center">
                                    <!-- btn Hapus -->
                                    <a class="btn btn-outline-danger btn-sm" href="?halaman=surat-masuk&hal=hapus&id=<?= $data['id']; ?>" name="hapus" onclick="return confirm('Apakah yakin ingin menghapus ini?')">
                                        <i class="fas fa-trash fa-lg"></i> Hapus</a>
                                    <!-- /end hapus -->

                                    <!-- btn edit -->
                                    <a id="tedit" data-toggle="modal" data-target="#editData" data-id="<?= $data['id']; ?>" data-spm="<?= $data['no_spm']; ?>" data-tgl_spm="<?= $data['tgl_spm']; ?>" data-nominal_spm="<?= $data['nominal_spm']; ?>" data-spd="<?= $data['no_spd']; ?>" data-tgl_spd="<?= $data['tgl_spd']; ?>" data-nokuitansi="<?= $data['nokuitansi']; ?>" data-kdari="<?= $data['kdari']; ?>" data-jumlah="<?= $data['jumlah']; ?>" data-keperluan="<?= $data['keperluan']; ?>" data-ndari="<?= $data['ndari']; ?>" data-ntgl="<?= $data['ntgl']; ?>" data-nnominal="<?= $data['nnominal']; ?>" data-nkeperluan="<?= $data['nkeperluan']; ?>" data-tujuan="<?= $data['tujuan']; ?>" data-tahun_anggaran="<?= $data['tahun']; ?>" data-klasifikasi="<?= $data['klasifikasi_id']; ?>" data-ket="<?= $data['ket']; ?>" data-lokasi="<?= $data['lemari_id']; ?>" data-map="<?= $data['map']; ?>" data-file="<?= $data['file']; ?>" class=" btn btn-outline-success btn-sm"><i class="fas fa-edit fa-lg"></i>Edit</a>
                                    <!-- /end edit -->

                                    <!-- btn detail -->
                                    <a href="?halaman=surat-masuk&hal=detail&id=<?= $data['id']; ?> " class="btn btn-outline-secondary btn-sm"><i class="fas fa-info fa-lg"></i> Detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div id="tambahData" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>


            </div>
            <div class="modal-body">
                <form class="user mb-4" method="POST" enctype="multipart/form-data">

                    <div class=" card-body bg-body">
                        <div class=" row mb-3">

                            <div class="col-lg-5 ml-4 border-right">
                                <div class="form-group mb-0 p-3 border ">
                                    <div class="row ">
                                        <div>
                                            <p class="text-muted">1. Data SPM</p>
                                        </div>
                                        <div class="col">
                                            <label for="spm" class="form-label">No. SPM</label>
                                            <input type="text" class="form-control form-control-sm" id="spm" name="spm" autofocus required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="tgl_spm" class="form-label">Tanggal SPM</label>
                                            <input type="date" class="form-control form-control-sm" id="tgl_spm" name="tgl_spm" autofocus required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="nominal_spm" class="form-label">Nominal SPM</label>
                                            <input type="number" class="form-control form-control-sm" id="nominal_spm" name="nominal_spm" autofocus required autocomplete="off">
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group mb-0 p-3 border ">
                                    <div class="row ">
                                        <div>
                                            <p class="text-muted">2. Data SP2D</p>
                                        </div>
                                        <div class="col">
                                            <label for="sp2d" class="form-label">No. SP2D</label>
                                            <input type="text" class="form-control form-control-sm" id="sp2d" name="sp2d" autofocus required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="tgl_sp2d" class="form-label">Tanggal SP2D</label>
                                            <input type="date" class="form-control form-control-sm" id="tgl_sp2d" name="tgl_sp2d" autofocus required autocomplete="off">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mb-0 p-2 border">
                                    <div>
                                        <p class="text-muted">3.Rincian Kuitansi PPK</p>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="no_kuitansi" class="form-label">Nomor Kuitansi</label>
                                            <input type="text" class="form-control form-control-sm" id="no_kuitansi" name="no_kuitansi" autofocus required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="dari" class="form-label">Diterima Dari</label>
                                            <input type="text" class="form-control form-control-sm" id="dari" name="dari" value="Kuasa Pengguna Anggaran" autofocus required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="jkuitansi" class="form-label">Jumlah</label>
                                            <input type="number" class="form-control form-control-sm" id="jkuitansi" name="jkuitansi" autofocus required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="keperluan" class="form-label">Keperluan </label>
                                            <input type="text" value="Contoh : Gaji Kepada Saudara/i ..." class="form-control form-control-sm" id="keperluan" name="keperluan" autofocus required autocomplete="off">
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group mb-0">
                                    <div>
                                        <p class="text-muted">3.Nota / Invoice</p>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="ndari" class="form-label">Dari: </label>
                                            <input type="text" class="form-control form-control-sm" id="ndari" name="ndari" autofocus autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="ntgl" class="form-label">tanggal</label>
                                            <input type="date" class="form-control form-control-sm" id="ntgl" name="ntgl" autofocus autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="nnominal" class="form-label">Nominal</label>
                                            <input type="number" class="form-control form-control-sm" id="nnominal" name="nnominal" autofocus autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="nkeperluan" class="form-label">Keperluan </label>
                                            <input type="text" value="Contoh : Pengadaan Barang dst.." class="form-control form-control-sm" id="nkeperluan" name="nkeperluan" autofocus autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5 mt-4 ml-4">
                                <div class="form-group mb-0">
                                    <label for="tujuan" class="form-label">Tujuan </label>
                                    <input type="text" class="form-control form-control-sm" id="tujuan" name="tujuan" autofocus value="Subbagian Umum" required autocomplete="off">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="tahun" class="form-label">Tahun Anggaran</label>
                                    <input type="date" class="form-control form-control-sm" id="tahun" name="tahun" autofocus required autocomplete="off">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="klas" class="form-label">Kode klasifikasi</label>
                                    <select class="form-control form-select" name="klas" id="klas" required>
                                        <option disabled selected>-- Kode Klasifikasi --</option>
                                        <?php
                                        $klas = mysqli_query($koneksi, "SELECT * from tbklasifikasi");
                                        while ($d = mysqli_fetch_array($klas)) {
                                        ?>
                                            <option value="<?= $d['id_klas']; ?>">
                                                <?= $d['kode1']; ?>.<?= $d['kode2']; ?> -> ( <?= $d['ket']; ?>)
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="jenis" class="form-label">Jenis Dokumen</label>
                                    <select class="form-control form-select" name="jenis" id="jenis" required>
                                        <option disabled selected>-- Jenis Dokumen --</option>
                                        <option value="dokumen gaji pns">Dokumen Gaji PNS</option>
                                        <option value="dokumen tunjangan kinerja pns">Dokumen tunjangan kinerja pns</option>
                                        <option value="dokumen lembur pns">Dokumen lembur pns</option>
                                        <option value="dokumen tunjanga uang makan">Dokumen tunjangan uang makan</option>
                                        <option value="honor output kegiatan">Honor output kegiatan</option>
                                        <option value="dokumen pengadaan barang dan jasa">Dokumen pengadaan barang dan jasa</option>
                                        <option value="dokumen perjalanan dinas">Dokumen perjalanan dinas</option>
                                        <option value="dokumen belanja bahan">Dokumen belanja bahan</option>
                                        <option value="dokumen pembangunan/pemeliharaan gedung">Dokumen pembangunan/pemeliharaan gedung</option>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="ringkasan" class="form-label">Lain-lain</label>
                                    <input type="text" value="Contoh : Dokumen Bukti Pengadaan Barang / Jasa.." class="form-control form-control-sm" id="ringkasan" name="ringkasan" autofocus required autocomplete="off">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="map" class="form-label">Kode Map</label>
                                    <input type="text" class="form-control form-control-sm" id="map" name="map" autofocus required autocomplete="off">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <select class="form-control form-select" name="lokasi" id="lokasi" required>
                                        <option disabled selected>-- Lokasi Simpan --</option>
                                        <?php
                                        $dok = mysqli_query($koneksi, "SELECT * from tblemari");
                                        while ($d = mysqli_fetch_array($dok)) {
                                        ?>
                                            <option value="<?= $d['id_lemari']; ?>"><?= $d['nama_ruang']; ?>.<?= $d['no_lemari']; ?>.<?= $d['baris']; ?>.<?= $d['box']; ?> ( <?= $d['lket']; ?>)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="map" class="form-label">File PDF</label>
                                    <input type="file" accept=".pdf" class="form-control form-control-sm" id="file" name="file" autofocus autocomplete="off">
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="btambah">Tambah</button>
                </form>
            </div>
            <div class="modal-footer text-center">
                <p class="mt-5 mb-3 text-muted">&copy; 2021- <?= date('d-m-Y')  ?></p>
            </div>
        </div>
    </div>

</div>

<!-- Modal Edit -->
<div id="editData" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                <h3 class=" text-start">
                    <?php
                    echo date('Y-m-d');
                    ?>
                </h3>

            </div>
            <div class="modal-body">
                <form class="user mb-4" method="POST">

                    <div class=" card-body bg-body">
                        <div class=" row mb-3">

                            <div class="col-lg-5 ml-4 border-right">
                                <div class="form-group mb-0 p-3 border ">
                                    <div class="row ">
                                        <div>
                                            <p class="text-muted">1. Data SPM</p>
                                        </div>
                                        <div class="col">
                                            <label for="spm" class="form-label">No. SPM</label>
                                            <input type="text" class="form-control form-control-sm" id="spm" name="spm" autofocus required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="tgl_spm" class="form-label">Tanggal SPM</label>
                                            <input type="date" class="form-control form-control-sm" id="tgl_spm" name="tgl_spm" autofocus required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="nominal_spm" class="form-label">Nominal SPM</label>
                                            <input type="text" class="form-control form-control-sm" id="nominal_spm" name="nominal_spm" autofocus required autocomplete="off">
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group mb-0 p-3 border ">
                                    <div class="row ">
                                        <div>
                                            <p class="text-muted">2. Data SP2D</p>
                                        </div>
                                        <div class="col">
                                            <label for="sp2d" class="form-label">No. SP2D</label>
                                            <input type="text" class="form-control form-control-sm" id="sp2d" name="sp2d" autofocus required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="tgl_sp2d" class="form-label">Tanggal SP2D</label>
                                            <input type="date" class="form-control form-control-sm" id="tgl_sp2d" name="tgl_sp2d" autofocus required autocomplete="off">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mb-0 p-2 border">
                                    <div>
                                        <p class="text-muted">3.Rincian Kuitansi PPK</p>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="no_kuitansi" class="form-label">Nomor Kuitansi</label>
                                            <input type="text" class="form-control form-control-sm" id="no_kuitansi" name="no_kuitansi" autofocus required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="dari" class="form-label">Diterima Dari</label>
                                            <input type="text" class="form-control form-control-sm" id="dari" name="dari" value="Kuasa Pengguna Anggaran" autofocus required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="jkuitansi" class="form-label">Jumlah</label>
                                            <input type="text" class="form-control form-control-sm" id="jkuitansi" name="jkuitansi" autofocus required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="keperluan" class="form-label">Keperluan </label>
                                            <input type="text" class="form-control form-control-sm" id="keperluan" name="keperluan" value="Contoh : Gaji kepada saudara/i" autofocus required autocomplete="off">
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group mb-0">
                                    <div>
                                        <p class="text-muted">3.Nota / Invoice</p>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="ndari" class="form-label">Dari: </label>
                                            <input type="text" class="form-control form-control-sm" id="ndari" name="ndari" autofocus autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="ntgl" class="form-label">tanggal</label>
                                            <input type="date" class="form-control form-control-sm" id="ntgl" name="ntgl" value="Kuasa Pengguna Anggaran" autofocus autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="nnominal" class="form-label">Nominal</label>
                                            <input type="number" class="form-control form-control-sm" id="nnominal" name="nnominal" autofocus autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="nkeperluan" class="form-label">Keperluan </label>
                                            <input type="text" class="form-control form-control-sm" id="nkeperluan" name="nkeperluan" value="Contoh :Pengadaan Barang dst.." autofocus autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5 mt-4 ml-4">
                                <div class="form-group mb-0">
                                    <label for="tujuan" class="form-label">Tujuan </label>
                                    <input type="text" class="form-control form-control-sm" id="tujuan" name="tujuan" autofocus value="Subbagian Umum" required autocomplete="off">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="tahun" class="form-label">Tahun Anggaran</label>
                                    <input type="text" class="form-control form-control-sm" id="tahun" name="tahun" autofocus required autocomplete="off">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="klas" class="form-label">Kode klasifikasi</label>
                                    <select class="form-control form-select" name="klas" id="klas" required>
                                        <option disabled selected>-- Kode Klasifikasi --</option>
                                        <?php
                                        $klas = mysqli_query($koneksi, "SELECT * from tbklasifikasi");
                                        while ($d = mysqli_fetch_array($klas)) {
                                        ?>
                                            <option value="<?= $d['id_klas']; ?>">
                                                <?= $d['kode1']; ?>.<?= $d['kode2']; ?> -> ( <?= $d['ket']; ?>)
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="jenis" class="form-label">Jenis Dokumen</label>
                                    <select class="form-control form-select" name="jenis" id="jenis" required>
                                        <option disabled selected>-- Jenis Dokumen --</option>
                                        <option value="dokumen gaji pns">Dokumen Gaji PNS</option>
                                        <option value="dokumen tunjangan kinerja pns">Dokumen tunjangan kinerja pns</option>
                                        <option value="dokumen lembur pns">Dokumen lembur pns</option>
                                        <option value="dokumen tunjanga uang makan">Dokumen tunjangan uang makan</option>
                                        <option value="honor output kegiatan">Honor output kegiatan</option>
                                        <option value="dokumen pengadaan barang dan jasa">Dokumen pengadaan barang dan jasa</option>
                                        <option value="dokumen perjalanan dinas">Dokumen perjalanan dinas</option>
                                        <option value="dokumen belanja bahan">Dokumen belanja bahan</option>
                                        <option value="dokumen pembangunan/pemeliharaan gedung">Dokumen pembangunan/pemeliharaan gedung</option>
                                    </select>
                                </div>

                                <div class="form-group mb-0">
                                    <label for="ringkasan" class="form-label">Lain-lain</label>
                                    <input type="text" value="Contoh : Dokumen Bukti Pengadaan barang / jasa" class="form-control form-control-sm" id="ringkasan" name="ringkasan" autofocus required autocomplete="off">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="map" class="form-label">Kode Map</label>
                                    <input type="text" class="form-control form-control-sm" id="map" name="map" autofocus required autocomplete="off">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <select class="form-control form-select" name="lokasi" id="lokasi" required>
                                        <option disabled selected>-- Lokasi Simpan --</option>
                                        <?php
                                        $dok = mysqli_query($koneksi, "SELECT * from tblemari");
                                        while ($d = mysqli_fetch_array($dok)) {
                                        ?>
                                            <option value="<?= $d['id_lemari']; ?>"><?= $d['nama_ruang']; ?>.<?= $d['no_lemari']; ?>.<?= $d['baris']; ?>.<?= $d['box']; ?> ( <?= $d['lket']; ?>)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="map" class="form-label">File..</label>
                                    <input type="file" accept=".pdf" class="form-control form-control-sm" id="file" name="file" autofocus autocomplete="off">
                                </div>
                            </div>

                        </div>
                        <input type="hidden" name="id" id="id">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="bubah">Tambah</button>
                </form>
            </div>
            <div class="modal-footer text-center">
                <p class="mt-5 mb-3 text-muted">&copy; 2021- <?= date('d-m-Y')  ?></p>
            </div>
        </div>
    </div>

</div>





<script src="assets/vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).on("click", "#tedit", function() {
        var id = $(this).data('id');
        var spm = $(this).data('spm');
        var tgl_spm = $(this).data('tgl_spm');
        var nominal_spm = $(this).data('nominal_spm');
        var spd = $(this).data('spd');
        var tgl_spd = $(this).data('tgl_spd');
        var nokuitansi = $(this).data('nokuitansi');
        var kdari = $(this).data('kdari');
        var jumlah = $(this).data('jumlah');
        var keperluan = $(this).data('keperluan');
        var ndari = $(this).data('ndari');
        var ntgl = $(this).data('ntgl');
        var nnominal = $(this).data('nnominal');
        var nkeperluan = $(this).data('nkeperluan');
        var tujuan = $(this).data('tujuan');
        var tahun = $(this).data('tahun_anggaran');
        var klasifikasi = $(this).data('klasifikasi');
        var ket = $(this).data('ket');
        var lokasi = $(this).data('lokasi');
        var map = $(this).data('map');
        var file = $(this).data('file');
        // var masuk = $(this).data('masuk');
        $(".modal-body #id").val(id);
        $(".modal-body #spm").val(spm);
        $(".modal-body #tgl_spm").val(tgl_spm);
        $(".modal-body #nominal_spm").val(nominal_spm);
        $(".modal-body #sp2d").val(spd);
        $(".modal-body #tgl_sp2d").val(tgl_spd);
        $(".modal-body #no_kuitansi").val(nokuitansi);
        $(".modal-body #dari").val(kdari);
        $(".modal-body #jkuitansi").val(jumlah);
        $(".modal-body #keperluan").val(keperluan);
        $(".modal-body #ndari").val(ndari);
        $(".modal-body #ntgl").val(ntgl);
        $(".modal-body #nnominal").val(nnominal);
        $(".modal-body #nkeperluan").val(nkeperluan);
        $(".modal-body #tujuan").val(tujuan);
        $(".modal-body #tahun").val(tahun);
        $(".modal-body #klas").val(klasifikasi);
        $(".modal-body #ringkasan").val(ket);
        $(".modal-body #map").val(map);
        // $(".modal-body #masuk").val(masuk);
        $(".modal-body #lokasi").val(lokasi);
        $(".modal-body #file").val(file);

    })
</script>

<!-- -> ID CArd (1) drop down dari databse
    -> nama petugas arsip (2) diambil dari id card id
    -> nomor surat (manual aja) 09K4t4
    -> tgl surat (Date)
    -> tgl diterima (date) 
    -> Surat M/K (drop down) array manual 
    ------------------------------------------
    -> Perihal/ deskripsi surat (text)
    
    -> lampiran (number)

    -> kode klasifikasi (dropdown ambil dari form klasifikasi)
    --------------------------------------------------
    -> Keterangan ( agung podo moro) bedanya apa ? sama perihal
    -> isi ringkasan ( Pesanan meja 100)
    ____________________________________________________________
    -> Dari (varc)
    -> Kepada (BPS)
    -> indeks/subjek
    -> catatan
    ____________________________________________________________
    -> cabinet / Rak
    -> Catatan ( Ambil dari cabinet)
    ____________________________________________________________
    -> attachment / fle tambahan (uploud / pdf/ png/jpeg.)


    ---------------------------------
-->