<div class="jumbotron mt-5 mb-auto border-left-primary shadow-lg text-center">
    <div class="container-fluid d-flex  justify-content-center pt-3 border-bottom border-dark">

        <div class="w-100">
            <h3 class="text-center"> <img class="mr-3" src="file/bps.png" width="50" height="40">Badan Pusat Statistik Banjarmasin</h3>

            <h5 class="text-center pb-3">Jl. Gatot Subroto No.5, Kuripan, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan 70238</h5>
            <h4 class="text-center pb-3 "> Data Dokumen</h4>
        </div>

    </div>
</div>
<br><br>
<hr>
<div class="container mx-auto border-2 " style="width: 40rem; height:18rem;">
    <div class="alert bg-light bg-opacity-75" role="alert" style="background-image:url('file/svg2.png');background-size:cover; background-repeat:no-repeat">
        <h2 class="alert-heading text-center display-6">Sistem</h2>
        <hr>
        <div class="container bg-success p-2 rounded-3 bg-opacity-75 shadow-lg border-bottom-success border-left-primary">
            <div class="alert alert-warning" role="alert">
                <h3 class=" text-center text-dark">Pengelolaan dan pendataan Arsip</h3>
            </div>
            <div class="alert alert-primary" role="alert">
                <h4 class="mb-0 text-center text-dark">Badan Pusat Statistik</h4>
            </div>
        </div>


    </div>
</div>
<hr />
<!-- Begin Page Content -->


<div class="container-fluid border-bottom-primary card ">
    <!-- Content Row -->
    <div class="row g-2 mt-4">


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Petugas</div>
                            <?php
                            $q = mysqli_query($koneksi, "SELECT * FROM tuser");
                            $p = mysqli_num_rows($q);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $p; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Dokumen Tersedia</div>
                            <?php
                            $q = mysqli_query($koneksi, "SELECT * FROM tdokumen");
                            $d = mysqli_num_rows($q);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $d; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Data Dokumen dipinjam</div>
                            <?php
                            $q = mysqli_query($koneksi, "SELECT * FROM tdokumen where status ='dipinjam'");
                            $dp = mysqli_num_rows($q);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dp; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Dokumen Fisik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>