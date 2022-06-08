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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <?php
    require_once 'config/koneksi.php';
    ?>

</head>

<body id="page-top">

    <div id="wrapper">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="?pegawai=home">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="?pegawai=home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?pegawai=data-petugas">Data Petugas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?pegawai=data-surat">Data surat</a>
                            </li>
                        </ul>
                    </div>
                    <a type="button" class="btn btn-outline-danger btn-user position-relative align-bottom" href="logout.php" role="alert">Log Out</a>
                </div>
            </nav>