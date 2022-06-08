<div class="wraper p-3" style="background-image: url(file/mesh1.png); background-size:cover; background-repeat:no-repeat;">
    <div class="image text-center">
        <img src="https://media.discordapp.net/attachments/527165425046257674/937959191526645760/onlylogo.png" class="img-fluid rounded-circle" alt="...">
    </div>
    <div class="jumbotron mt-5 mb-auto border-left-primary shadow-lg bg-transparent text-center">
        <h3 class="display-4">Selamat Datang <?= $_SESSION['nama_lengkap'] ?><sup><?= $_SESSION['level'] ?></sup></h3>
        <p class="lead">Sistem ini adalah program yang akan memudahkan anda dalam Pendataan, Pengelolaan serta pencarian data yang anda butuhkan</p>
        <hr class="my-4">
        <p>Anda dapat menggunakan menu-menu yang ada di samping, terima kasih</p>
        <a class="btn btn-primary btn-lg" href="logout.php" role="button">profile</a>
    </div>
    <br><br>
    <hr>
</div>