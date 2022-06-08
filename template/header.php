<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['nama_lengkap']) or empty($_SESSION['level'])) {
    echo "<script>
    alert('Maaf, untuk mengakses halaman ini, silahkan Login terlebih dahulu..!!');
    document.location='index.php';
    </script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Arsip || BPS</title>


    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/fontawesome-free/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <?php
    require_once 'config/koneksi.php';
    ?>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-ARSIP <sup>ADMIN</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="?halaman=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>HOME <?= $_SESSION['level']; ?></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataMaster" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master Data</span>
                </a>
                <div id="dataMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data</h6>
                        <a class="collapse-item" href="?halaman=data-dokumen">Data Dokumen/Surat</a>
                        <a class="collapse-item" href="?halaman=data-arsip">Data Arsip</a>
                    </div>
                </div>
            </li> -->

            <li class=" nav-item">
                <a class="nav-link collapsed" href="?halaman=surat-masuk">
                    <i class=" fas fa-file-download"></i>
                    <span>Data Masuk</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="nav-link collapsed" href="?halaman=klasifikasi">
                    <i class=" fas fa-archive"></i>
                    <span>Kode Klasifikasi</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="nav-link collapsed" href="?halaman=lemari">
                    <i class="fas fa-book"></i></i>
                    <span>Data Lemari</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jenis" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Dokumen</span>
                </a>
                <div id="jenis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tambah</h6>

                        <a class="collapse-item" href="?halaman=subyek-dokumen">Subyek Dokumen</a>
                        <a class="collapse-item" href="?halaman=keaslian-arsip"> Keaslian Dokumen</a>
                        <a class="collapse-item" href="?halaman=sifat-arsip"> Sifat Dokumen</a>
                        <a class="collapse-item" href="?halaman=fungsi-arsip"> Fungsi Dokumen</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user"></i>
                    <span>Management Petugas</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h3 class="collapse-header">Petugas</h3>
                        <a class="collapse-item" href="?halaman=tambah-petugas">Tambah Petugas</a>
                        <a class="collapse-item" href="?halaman=data-petugas">Data Petugas</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#peminjam" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-book-reader"></i>
                    <span>Management Peminjam</span>
                </a>
                <div id="peminjam" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h3 class="collapse-header">Peminjaman dokumen</h3>
                        <a class="collapse-item" href="?halaman=peminjam">Peminjam</a>
                        <a class="collapse-item" href="?halaman=data-pinjam">Data Dokumen</a>
                    </div>
                </div>
            </li>
            <!-- Laporan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-book-open"></i>
                    <span>Laporan</span>
                </a>
                <div id="laporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h3 class="collapse-header">Laporan Dokumen</h3>
                        <a class="collapse-item" href="?halaman=spm">Laporan Jumlah SPM </a>
                        <a class="collapse-item" href="?halaman=spd">Laporan Jumlah SP2D</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- Button Log Out -->
            <a type="button" class="btn btn-outline-danger text-white position-relative align-bottom" href="logout.php" role="alert">Log Out</a>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-image: url(file/svg3.png);background-size: 100% 100%;
background-attachment:fixed;">

            <!-- Main Content -->
            <div id="content">
                <marquee class="py-3 border-bottom-dark bg-gradient-primary text-light">Selamat Datang Di Badan Pusat Statistik Kota Banjarmasin</marquee>