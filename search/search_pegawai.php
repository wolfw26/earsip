<?php

// Create connection
include '../config/koneksi.php';


$keyword = $_GET["keyword"];

$tarsip = mysqli_query(
    $koneksi,
    "SELECT * from tbarsip,tblemari where tblemari.id_lemari = tbarsip.id_lemari AND
  tbarsip.nama_arsip LIKE '%$keyword%' or
  tbarsip.subyek LIKE '%$keyword%' AND tblemari.id_lemari = tbarsip.id_lemari or
  tbarsip.kode_arsip LIKE '%$keyword%' AND tblemari.id_lemari = tbarsip.id_lemari 
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
if (mysqli_num_rows($tarsip) > 0) {
?>
    <table class="table table-borderd table-hovered table-striped">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Jenis Subyek</th>
            <th>Kode Lemari</th>
            <th>Aksi</th>
        </tr>
        <?php

        while ($t = mysqli_fetch_array($tarsip)) {
        ?>
            <tr>
                <th><?= $t['kode_arsip']; ?></th>
                <td><?= $t['nama_arsip']; ?></td>
                <td><?= $t['tanggal']; ?></td>
                <td><?= $t['deskripsi']; ?></td>
                <td><?= $t['subyek']; ?></td>
                <td><?= $t['kode_lemari']; ?></td>
            </tr>
        <?php }  ?>
    </table>
<?php } else {
    echo '<tr ><td >Tidak Ada Data Ditemukan</td></tr>';
}
?>