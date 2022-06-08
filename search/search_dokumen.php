<?php

// Create connection
include '../config/koneksi.php';


$keyword = $_GET["keyword"];

$tdokumen = mysqli_query(
    $koneksi,
    "SELECT *  from tbdokumen,tbarsip
    WHERE tbdokumen.arsip_id = tbarsip.id AND
    tbdokumen.kode LIKE '%$keyword%' or
    tbdokumen.dok_judul LIKE '%$keyword%' AND tbdokumen.arsip_id = tbarsip.id or
    tbdokumen.tangal LIKE '%$keyword%' AND tbdokumen.arsip_id = tbarsip.id or
    tbdokumen.kode LIKE '%$keyword%' AND tbdokumen.arsip_id = tbarsip.id or
    tbdokumen.keaslian LIKE '%$keyword%' AND tbdokumen.arsip_id = tbarsip.id 
    ORDER BY id desc
"
    // "SELECT * from tbarsip,tblemari where tblemari.id_lemari = tbarsip.id_lemari AND
    // 	tbarsip.kode_arsip LIKE '%$keyword%',
    //   tbarsip.nama_arsip LIKE '%$keyword%'
    // ORDER BY id desc
    // "
);

?>
<?php
if (mysqli_num_rows($tdokumen) > 0) {
?>
    <table class="table table-borderd table-hovered table-striped">
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
        <?php
        $no = 1;
        while ($data1 = mysqli_fetch_array($tdokumen)) {

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
                <th class=" text-center">
                    <div class=" container">
                        <a class="btn btn-danger rounded-pill" title="Hapus" href="?halaman=data-dokumen&fungsi=hapus&id=<?= $data1['id_dokumen']; ?> " onclick="return confirm('Apakah yakin ingin menghapus data ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi " viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg></a>
                        <a class="btn btn-success ml-3" title="Ubah" href="?halaman=data-dokumen&fungsi=ubah&id=<?= $data1['id_dokumen']; ?> ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                                <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
                                <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
                            </svg>
                        </a>
                    </div>
                </th>

            </tr>
        <?php }  ?>
    </table>
<?php } else {
    echo '<tr ><td >Tidak Ada Data Ditemukan</td></tr>';
}
?>