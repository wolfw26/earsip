
<?php
include 'koneksi.php';

$hapus = mysqli_query($koneksi,  "DELETE FROM `tbdokumen` WHERE `tbdokumen`.`id_dokumen` = '$_GET[id]'");
if ($hapus) {
    echo " <script>
		alert('Data di hapus');
		document.location='?halaman=data-dokumen';
		</script>";
} else {
    echo " <script>
    alert('Data belum di hapus');
    document.location='?halaman=data-dokumen';
    </script>";
}
?>