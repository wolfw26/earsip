<?php
include 'config/koneksi.php';

// Cekk tombol button btambah
if (isset($_POST["btambah"])) {
    //ambil data dari form
    $user = htmlspecialchars($_POST["user"]);
    $pwd = md5($_POST["pwd"]);
    $level = $_POST['level'];
    $nama = htmlspecialchars($_POST['namalkp']);
    $tgllahir = htmlspecialchars($_POST["tgl-lahir"]);
    $alamat = htmlspecialchars($_POST['alamat']);
    $nope = htmlspecialchars($_POST["nope"]);
    $jk = htmlspecialchars($_POST["jk"]);
    $bagian = htmlspecialchars($_POST["bagian"]);

    //query insert data
    $q = mysqli_query($koneksi, "INSERT INTO `tuser` (`id`, `username`, `password`, `level`, `nama_lengkap`, `tgl_lahir`, `alamat`, `jk`, `nope`, `bagian`) VALUES  
        ('', '$user','$pwd','$level','$nama','$tgllahir','$alamat','$jk','$nope','$bagian')
				");


    if ($q) {
        echo " <script>
            alert('User Berhasil Di Tambah');
            document.location = '?halaman=tambah-petugas';
            </script>";
    } else {
        echo " <script>
            alert(' GAGAL Menambah');
            document.location = '?halaman=tambah-petugas';
            </script>";
    }
}

?>




<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block" style=" background-image: url('file/undraw_Personalization_re_grty.png');background-size: contain;background-position: center; background-repeat: no-repeat;">

                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Form Tambah User</h1>
                        </div>
                        <form class="user" method="POST">
                            <div class="form-group">
                                <div class=" mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="user" placeholder="username" name="user" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="pwd" placeholder="password" name="pwd" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jk">Level</label>
                                <div class=" mb-3 mb-sm-0">
                                    <select type="text" class="form-control form-control" id="level" placeholder="jenis Kelamin" name="level">
                                        <option disabled selected>level user</option>
                                        <option value="admin">Admin</option>
                                        <option value="pegawai">Pegawai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="namalkp" placeholder="Nama Lengkap" name="namalkp" />
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control form-control-user" id="alamat" placeholder="Alamat" name="alamat"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class=" mb-3 mb-sm-0">
                                    <label for="tgl-lahir"></label>
                                    <input type="date" class="form-control form-control-user" id="tgl-lahir" placeholder="Tanggal Lahir" name="tgl-lahir" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" mb-3 mb-sm-0">
                                    <input type="number" class="form-control form-control-user" id="nope" placeholder="No.Telp" name="nope" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-5">
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <div class=" mb-3 mb-sm-0">
                                            <select type="text" class="form-control form-control" id="jk" placeholder="jenis Kelamin" name="jk">
                                                <option disabled selected>Jenis Kelamin</option>
                                                <option value="l">Laki-laki</option>
                                                <option value="p">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col col-sm-7">
                                    <div class="form-group">
                                        <div class=" mb-3 mb-sm-0">
                                            <label for="bagian">Bagian</label>
                                            <select type="text" class="form-control form-control" id="bagian" placeholder="Bagian" name="bagian">
                                                <option disabled selected>Bagian</option>
                                                <option value="statistik sosial">statistik sosial</option>
                                                <option value="statistik produksi">statistik produksi</option>
                                                <option value="statistik distribusi">statistik distribusi</option>
                                                <option value="neraca wilayah">neraca wilayah</option>
                                                <option value="analisis statistik">analisis statistik</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button class=" btn btn-primary" name="btambah">Tambahkan</button>
                            <button class=" btn btn-primary" name="btambah">Cetak</button>
                            <hr />
                        </form>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>