<?php
if (isset($_GET['fungsi'])) {
    if ($_GET['fungsi'] == "hapus") {
        $id = $_GET['id'];
        $hapus = mysqli_query($koneksi, "DELETE FROM tbdokumen WHERE id_dokumen = '$id' ");
        if ($hapus) {
            echo " <script>
    document.location = '?halaman=data-dokumen';
</script>";
        } else {
            echo " <script>
    alert('Hapus Data GAGAL');
    document.location = '?halaman=data-dokumen';
</script>";
        }
    }
}
?>
<div class="container">
    <div class="card mt-3">
        <div class="card-header bg-info text-white ">
            Data Surat
        </div>
        <div class="card-body shadow-lg mt-2">
            <div class="d-flex align-items-center justify-content-between">

                <a href="?halaman=data-dokumen&hal=tambah" class="btn btn-info mb-3">Tambah Surat</a>
                <div>
                    <form name="cari" class="input-group mb-3" method="post" action="">
                        <input id="search" type="text" name="keyword" class="form-control" placeholder="Cari Data" aria-describedby="button-addon2">
                    </form>
                </div>
            </div>
            <div id="output">
                <div class="table table-bordered table-responsive-md">
                    <table class="table ">
                        <thead class=" bg-gray-400 text-dark text-decoration-underline text-center">
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Kode Arsip</th>
                                <th>Nama Arsip</th>
                                <th>Subyek</th>
                                <th>Keaslian</th>
                                <th>Sifat</th>
                                <th>Fungsi</th>
                                <th>aksi</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include 'config/koneksi.php';
                            $batas = 5;
                            $data = mysqli_query($koneksi, "select * from tbdokumen");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
                            $page = (isset($_GET["page"])) ? $_GET["page"] : 1;
                            $awal = ($batas * $page) - $batas;


                            $tampil = mysqli_query($koneksi, "SELECT tbdokumen.*,tbarsip.* FROM tbdokumen,tbarsip
                        WHERE tbdokumen.arsip_id = tbarsip.id
                        ORDER BY id_dokumen desc LIMIT $awal,$batas");
                            $no = 1;
                            while ($data1 = mysqli_fetch_assoc($tampil)) {

                            ?>
                                <tr class=" text-center">
                                    <th><?= $no++; ?></th>
                                    <th class=" text-uppercase text-decoration-underline"><?= $data1['kode']; ?></th>
                                    <td class=" text-capitalize"><?= $data1['dok_judul']; ?></td>
                                    <td><?= $data1['tangal']; ?></td>
                                    <td><?= $data1['dok_deskripsi']; ?></td>
                                    <td><?= $data1['kode_arsip'], "-", $data1['id_lemari']; ?></td>
                                    <td><?= $data1['nama_arsip']; ?></td>
                                    <td><?= $data1['subyek']; ?></td>
                                    <td><?= $data1['keaslian']; ?></td>
                                    <td><?= $data1['sifat']; ?></td>
                                    <td><?= $data1['fungsi']; ?></td>
                                    <th class=" d-flex align-items-center ">
                                        <a class="btn btn-danger rounded-pill btn-sm" title="Hapus" href="?halaman=data-dokumen&fungsi=hapus&id=<?= $data1['id_dokumen']; ?> " onclick="return confirm('Apakah yakin ingin menghapus data ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi " viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg></a>
                                        <a class="btn btn-success ml-3 btn-sm" title="Ubah" href="?halaman=data-dokumen&fungsi=ubah&id=<?= $data1['id_dokumen']; ?> ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                                                <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
                                                <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
                                            </svg>
                                        </a>
                                    </th>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                            <li class="page-item"><a class="page-link" href="?halaman=data-dokumen&page=<?= $i ?>"><?= $i; ?></a></li>
                        <?php endfor; ?>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <img src="file/wave.svg" alt="" srcset="">
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    //search logicnya jangan lupa copy jquery link
    $(document).ready(function() {
        $("#search").on('keyup', function() {
            $.ajax({
                type: 'POST',
                url: 'search/search_dokumen.php?keyword=' + $("#search").val(),
                success: function(data) {
                    $("#output").html(data);
                }
            });
        });
    });
</script>