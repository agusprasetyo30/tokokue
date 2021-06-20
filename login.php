<?php
  session_start();

  $title = "Login Area";
  $header_center = true;

  // yang belum login akan diarahkan ke halaman login
  if (isset($_SESSION['id'])) {
    echo '
      <script>
        window.location.href = "./";
      </script>
    ';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="description" content="Cake Template">
  <meta name="keywords" content="Cake, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ROLA CAKE AND BAKERY</title>

  <!-- Google Font -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->

  <!-- Css Styles -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/flaticon.css" type="text/css">
  <link rel="stylesheet" href="css/barfiller.css" type="text/css">
  <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/select2/select2.min.css" type="text/css">
  <link rel="stylesheet" href="css/summernote/summernote.min.css" type="text/css">
<!-- include summernote css/js -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
  <style>
    .foto:hover {
        transition: 0.4s all;
        padding: 1.25rem 0.25rem 1.25rem 0.25rem;
    }

    .footer {
        padding-bottom: 30px;
    }

    .nice-select {
        display: none;
    }
  </style>
  </head>

  <body>
  <div id="preloder">
    <div class="loader"></div>
  </div>
  <header class="header">
    <div class="header__top">
        <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <div class="header__top__inner">
              <div class="header__logo">
                <a href="./index.php"><img src="img/logokue.png" alt=""></a>
              </div>
                <div class="float-right">
                    <a href="./login.php" class="btn btn-outline-warning text-dark"><i class="fa fa-sign-in"></i> Login</a>
                </div>
              </div>
          </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </div>
    <?= $_SESSION['username'] ?>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
        
          <nav class="header__menu mobile-menu">
              <ul>
                <li class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>"><a href="./index.php"><i class="fa fa-home"></i> Home</a></li>
                <li class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>"><a href="./about.php"><i class="fa fa-book"></i> About</a></li>
                <li class="<?= basename($_SERVER['PHP_SELF']) == 'blog.php' ? 'active' : '' ?>"><a href="./blog.php"><i class="fa fa-pencil"></i> Blog</a></li>
                <?php if ($_SESSION['id'] != null) { ?>
                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'pengguna.php' ? ' active' : '' ?>"><a href="./pengguna.php"><i class="fa fa-user"></i> Pengguna</a></li>
                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'makanan.php' ? 'active' : '' ?>"><a href="./makanan.php"><i class="fa fa-spoon"></i> Makanan</a></li>
                <?php } ?>
              </ul>
          </nav>
        </div>
        </div>
    </div>
  </header>
    <div class="<?= $breadcrumb_visibility == 'none' ? '' : 'breadcrumb-option p-5' ?>  ">
    <div class="container">
        <div class="row text-center">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
          <!-- Untuk memposisikan lokasi dari header sesuai keinginan -->
          <div class="breadcrumb__text mb-3 <?= $breadcrumb_visibility == 'none' ? 'd-none':'' ?> <?= $header_center == true ? 'text-center' : 'text-left' ?>">
              <h2><?= $title != null ? $title : 'No Title Yet' ?></h2>
          </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <form name="registration" action="" method="post">
                        <div class="form-group text-left">
                          <label for="" class="text-left">Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />
                        </div>
                        
                        <div class="form-group text-left">
                          <label for="">Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Masukan Password" required />
                        </div>

                        <div class="form-group text-right">
                          <input type="submit" name="login" value="Login" class="btn btn-success"/>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
      <div class="container">
      <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="footer__widget">
            <h6>Buka Setiap Hari</h6>
            <ul>
                <li>Senin - Jumat : 08:00 – 17:00</li>
                <li>Sabtu - Minggu : 10:00 am – 17:00</li>
            </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="footer__widget">
            <h6>Alamat Kami</h6>
            <ul>
                <li>Jl. Karangwaru No.60 , Tuban</li>
                <li>Jawa Timur</li>
            </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="footer__widget">
            <h6>Toko Kue jaya</h6>
            <div class="footer__logo">
                <a href="#"><img src="img/logokue.png" alt=""></a>
            </div>
            </div>
          </div>

      </div>
      </div>
    </footer>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/select2/select2.min.js"></script>

    <script src="js/summernote/summernote-bs4.min.js"></script>
  </body>
</html>

<?php
  include('./data/function.php');

  if (isset($_POST['login'])) {
    if (login($_POST) == true) {
      echo "
        <script>
          alert('Login Berhasil');
          document.location.href = './';
        </script>
      ";
    
    } else {
      echo "
        <script>
          alert('Login Gagal');
        </script>
      ";
    }
  }
?>