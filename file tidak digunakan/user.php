<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Cake Template">
  <meta name="keywords" content="Cake, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Toko Kue Jaya</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
</head>

<body>
  <div id="preloder">
    <div class="loader"></div>
  </div>
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="header__top__inner">
              <div class="header__logo">
                <a href="./index.php"><img src="img/logokue.png" alt=""></a>
                <br>
              </div>
            </div>
          </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="header__menu mobile-menu">
            <ul>
              <li class="active"><a href="./index.php">Home</a></li>
              <li><a href="./about.php">About</a></li>
              <li><a href="./blog.php">Blog</a></li>
              <?php
              include "db.php";
              session_start();
              if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
                echo '<li><a href="./customer.php">Data Order</a></li>';
              }
              if (isset($_SESSION['username'])) {
                echo '<li><a href="./logout.php">Logout</a></li>';
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <section class="hero">
    <div class="hero__slider owl-carousel">
      <div class="hero__item set-bg" data-setbg="img/kue.jpg">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <div class="hero__text">
                <h2>Toko Kue Jaya</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero__item set-bg" data-setbg="img/kue2.jpg">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <div class="hero__text">
                <h2>Sehat dan Higienis</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>
  <?php
  if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
    include "admin.php";
  } else if (isset($_SESSION['level']) && $_SESSION['level'] == 'member') {
    include "categories.php";
  } else {
    include "index.php";
  }


  ?>
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
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="footer__widget">
            <h6>Alamat Kami</h6>
            <ul>
              <li>Jl. Soekarno-Hatta, Malang</li>
              <li>Jawa Timur</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
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
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery.barfiller.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nicescroll.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>