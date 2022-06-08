<?php include '../config/koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Hugo 0.88.1">
  <title>CETAK | E-ARSIP.BPS </title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Custom styles for this template -->
</head>
<div class="mt-3">

  <h3 class="text-center">
    Data Arsip
  </h3>

  <div class="card-body">
    <table class="table table-bordered table-hovered table-striped">
      <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Deskripsi</th>
        <th>Jenis Subyek</th>
        <th>Jenis Keaslian</th>
        <th>Jenis Sifat</th>
        <th>Jenis Fungsi</th>
        <th>Kode Lemari</th>

      </tr>
      <?php
      $tarsip = mysqli_query($koneksi, "SELECT * from tbarsip,tblemari where tblemari.id_lemari = tbarsip.id_lemari ORDER BY id desc");
      while ($t = mysqli_fetch_array($tarsip)) {
      ?>
        <tr>
          <td><?= $t['kode_arsip']; ?></td>
          <td><?= $t['nama_arsip']; ?></td>
          <td><?= $t['tanggal']; ?></td>
          <td><?= $t['deskripsi']; ?></td>
          <td><?= $t['subyek']; ?></td>
          <td><?= $t['asli']; ?></td>
          <td><?= $t['sifat']; ?></td>
          <td><?= $t['jfungsi']; ?></td>
          <td><?= $t['no_lemari']; ?></td>




        </tr>
      <?php } ?>
    </table>
  </div>


</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
  window.print()
</script>

</body>

</html>