<?php

@$pegawai = $_GET['pegawai'];
if ($pegawai == "home") { // HOME
    require_once 'model/pegawaihome.php';
} elseif ($pegawai == 'data-surat') { //PEGAWAI
    require_once 'model/pegawai/data_surat.php';
} elseif ($pegawai == "data-petugas") {
    require_once 'model/pegawai/data_petugas.php';
} else {
    require_once 'model/pegawaihome.php';
}
