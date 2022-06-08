<?php
session_start();
//panggil koneksi db
include 'config/koneksi.php';

$pass = md5($_POST['password']);
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $pass);

//uji username, mengambil semua isi jika user == user
$cek_user = mysqli_query($koneksi, "SELECT * FROM tuser where username = '$username' and password = '$password'  ");
$cek = mysqli_num_rows($cek_user);
if ($cek > 0) {
    $user = mysqli_fetch_assoc($cek_user); //menampung hasil jika $cek_user berhasil

    if ($user['level'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['level'] = "admin";
        header('location:home_admin.php');
    } elseif ($user['level'] == "pegawai") {
        $_SESSION['username'] = $username;
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['level'] = "admin";
        header('location:home_pegawai.php');
    }
} else {
    echo "<script>alert('MAAF,LOGIN GAGAL');
    document.location ='index.php'</script>";
}
