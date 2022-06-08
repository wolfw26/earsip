<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Hugo 0.88.1">
  <title>LOGIN | E-ARSIP.BPS </title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-image: url(file/wave1.svg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      margin: 0;
    }

    /* .form-sigin{
        background-color: transparent;
      } */
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="assets/dist/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">


  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0 rounded-3  text-center" style=" background-image: url('file/undraw_Folder_re_j0i0.png');background-size: cover;background-position: center; background-repeat: no-repeat;">
        <marquee class="py-3 text-capitalize">SELAMAT DATANG SILAHKAN MELAKUKAN LOGIN</marquee>

        <div class="form-signin mb-5 rounded ">

          <form class="form-sigin shadow-sm p-3 bg-light" method="POST" action="cek_login.php">

            <img class="mb-4" src="file/bps.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">LOGIN</h1>

            <div class="form-label-group">
              <input type="text" class="form-control" name="username" placeholder="Masukan User Name anda" required autofocus autocomplete="None">
              <br>
            </div>

            <div class="form-label-group">
              <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
            </div>

            <!-- end form -->
            <button class=" w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021- <?= date('Y')  ?></p>
          </form>


        </div>
      </div>
    </div>

  </div>



</body>

</html>