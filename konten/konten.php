<?php
function rupiah($angka)
{

	$hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
	return $hasil_rupiah;
}


@$halaman = $_GET['halaman'];

if ($halaman == "home") {							// HOME
	require_once 'model/adminhome.php';
} elseif ($halaman == 'data-pegawai') {				//PEGAWAI
	require_once 'model/admin/data_pegawai.php';
} elseif ($halaman == "data-arsip") {
	//tampilkan halaman arsip surat
	if (@$_GET['hal'] == "tambah" || @$_GET['hal'] == "edt") {
		include "model/admin/form_arsip.php";
	} else {
		include "model/admin/data_arsip.php";
	}
} elseif ($halaman == 'surat-masuk') {
	if (@$_GET['hal'] == "detail") {
		require_once('model/surat-masuk/detail.php');
	} elseif (@$_GET['hal'] == "cetak") {
		require_once('cetak/cetak_dokumen.php');
	} elseif (@$_GET['hal'] == "hapus") {
		require_once('model/surat-masuk/form.php');
	} else {
		require_once('model/surat-masuk/form.php');
	}
} elseif ($halaman == 'klasifikasi') {
	if (@$_GET['hal'] == "hapus") {
		require_once('model/klasifikasi/klasifikasi.php');
	} elseif (@$_GET['hal'] == "edt") {
		require_once('model/klasifikasi/edit.php');
	}
	require_once('model/klasifikasi/klasifikasi.php');
} elseif ($halaman == 'data-petugas') {			// T PEGAWAI
	require_once 'model/petugas/data.php';
} elseif ($halaman == 'tambah-petugas') {			// T PEGAWAI
	require_once 'model/petugas/form.php';
} elseif ($halaman == 'peminjam') {
	if (@$_GET['hal'] == "kembali") {
		require_once 'model/peminjam/peminjam.php';
	} else {
		require_once 'model/peminjam/peminjam.php';
	}
} elseif ($halaman == 'data-pinjam') {
	require_once 'model/peminjam/data.php';
} elseif ($halaman == "data-dokumen") {				// DATA DOKUMEN
	if (@$_GET['hal'] == "tambah" || @$_GET['hal'] == "ubah") {						//T DATA aksi=tambah
		require_once "model/dokumen/form.php";
	} else {
		include "model/dokumen/dokumen.php";
	}
} elseif ($halaman == "lemari") {
	if (@$_GET['hal'] == "hapus") {
		require_once('model/lemari/lemari.php');
	}												// LEMARI
	require_once "model/lemari/lemari.php";
} elseif ($halaman == "spm") {
	require_once('model/laporan/data_spm.php');
} elseif ($halaman == "spd") {
	require_once('model/laporan/data_spd.php');
} else {
	//echo "Tampil Halaman Home";					// HOME
	require_once 'model/adminhome.php';
}
