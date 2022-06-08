<?php
if (isset($_POST['bubah'])) {
    $id = $_POST['id'];
    $user = htmlspecialchars($_POST['user']);
    $pwd = md5($_POST['pwd']);
    $level = htmlspecialchars($_POST['level']);
    $nama = htmlspecialchars($_POST['namalkp']);
    $tgl_lahir = htmlspecialchars($_POST['tgl-lahir']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $jk = htmlspecialchars($_POST['jk']);
    $nope = htmlspecialchars($_POST['nope']);
    $bagian = htmlspecialchars($_POST['bagian']);
    // var_dump($id, $ruang, $lemari, $box, $map, $tahun, $ket);
    // UPDATE `tbklasifikasi` SET
    //  `no_ruang` = 'B', 
    //  `no_lemari` = '2', 
    //  `no_box` = '4', 
    //  `folder` = '112', 
    //  `tahun` = '2021', 
    //  `ket` = 'ubah db' 
    //  WHERE `tbklasifikasi`.`id` = 1;
    $edit = mysqli_query($koneksi, "UPDATE `tuser` SET  
    `username` = '$user', 
    `password` = '$pwd', 
    `level` = '$level', 
    `nama_lengkap` = '$nama', 
    `tgl_lahir` = '$tgl_lahir', 
    `alamat` = '$alamat', 
    `jk` = '$jk', 
    `nope` = '$nope', 
    `bagian` = '$bagian' 
    WHERE `tuser`.`id` = $id ");

    if ($edit) {
        echo " <script>
    alert('Data user Di Ubah');
    document.location = '?halaman=data-petugas';
    </script>";
    } else {
        echo " <script>
    alert('Gagal Mengubah');
    document.location = '?halaman=data-petugas';
    </script>";
    }
}

?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
        </div>
        <div class="card-body">
            <a target="_blank" href="cetak/cetak_petugas.php" class="btn btn-outline-secondary btn-sm"><i class="fas fa-print fa-lg"></i> Cetak</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class=" text-capitalize text-center">
                            <th>No.</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Nama Lengkap</th>
                            <th>Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>J. Kelamin</th>
                            <th>No. HP</th>
                            <th>Bagian</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- id`, `username`, `password`, `level`, `nama_lengkap`, `tgl_lahir`, `alamat`, `jk`, `nope`, `bagian` -->
                        <?php
                        $q = mysqli_query($koneksi, "SELECT * FROM `tuser` ORDER BY `id` DESC");
                        $no = 1;
                        while ($d = mysqli_fetch_assoc($q)) {
                        ?>

                            <tr class="text-center">
                                <th><?= $no++; ?></th>
                                <td><?= $d['username']; ?></td>
                                <td><?= $d['level']; ?></td>
                                <td><?= $d['nama_lengkap']; ?></td>
                                <td><?= $d['tgl_lahir']; ?></td>
                                <td><?= $d['alamat']; ?></td>
                                <td>
                                    <?php if ($d['jk'] == 'l') {
                                        echo 'Laki-laki';
                                    } else {
                                        echo 'perempuan';
                                    }
                                    ?>
                                </td>
                                <td><?= $d['nope']; ?></td>
                                <td><?= $d['bagian']; ?></td>
                                <td>
                                    <a id="tedit" data-toggle="modal" data-target="#userUbah" data-id="<?= $d['id']; ?>" data-user="<?= $d['username']; ?>" data-pwd="<?= $d['password']; ?>" data-level="<?= $d['level']; ?>" data-namalkp="<?= $d['nama_lengkap']; ?>" data-tgl_lahir="<?= $d['tgl_lahir']; ?>" data-alamat="<?= $d['alamat']; ?>" data-jk="<?= $d['jk']; ?>" data-nope="<?= $d['nope']; ?>" data-bagian="<?= $d['bagian']; ?>" class=" btn btn-outline-success btn-sm"><i class="fas fa-edit fa-lg"></i>Edit</a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- modal edit -->

<!-- <div id="editData" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content  modal-md">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Kode Klasifikasi</h5>

                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                            <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" name="nama" />
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
            </div>
            <div class="modal-footer">
                <br>
            </div>
        </div>
    </div>
</div> -->

<!-- modal edit -->

<div id="userUbah" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal modal-title"> Ubah Data User</div>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block" style=" background-image: url('file/undraw_Personalization_re_grty.png');background-size: contain;background-position: center; background-repeat: no-repeat;">

                        </div>
                        <div class="col-lg-7">
                            <div class="p-2">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Form Ubah User</h1>
                                </div>
                                <form class="user" method="POST">
                                    <div class="form-group">
                                        <div class=" mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="user" placeholder="username" name="user" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control" id="pwd" placeholder="password" name="pwd" />
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
                                            <label for="tgl-lahir">Tanggal lahir</label>
                                            <input type="text" class="form-control form-control-user" id="tgl-lahir" placeholder="01 01 2021" name="tgl-lahir" />
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
                                        <input type="hidden" name="id" id="id">

                                    </div>

                                    <button class=" btn btn-primary" name="bubah">Ubah</button>
                                    <hr />
                                </form>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <br>
            </div>
        </div>
    </div>
</div>
<script src="assets/vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).on("click", "#tedit", function() {
        var id = $(this).data('id');
        var user = $(this).data('user');
        var pwd = $(this).data('pwd');
        var level = $(this).data('level');
        var namalkp = $(this).data('namalkp');
        var tgl_lahir = $(this).data('tgl_lahir');
        var alamat = $(this).data('alamat');
        var jk = $(this).data('jk');
        var nope = $(this).data('nope');
        var bagian = $(this).data('bagian');

        $(".modal-body #id").val(id);
        $(".modal-body #user").val(user);
        $(".modal-body #pwd").val(pwd);
        $(".modal-body #level").val(level);
        $(".modal-body #namalkp").val(namalkp);
        $(".modal-body #tgl-lahir").val(tgl_lahir);
        $(".modal-body #alamat").val(alamat);
        $(".modal-body #jk").val(jk);
        $(".modal-body #nope").val(nope);
        $(".modal-body #bagian").val(bagian);
    })
</script>