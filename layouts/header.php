<?php
   // session_start();
?>

<!DOCTYPE html>
<html lang="zxx">
   <head>
   <meta charset="UTF-8">
   <meta name="description" content="Cake Template">
   <meta name="keywords" content="Cake, unica, creative, html">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>ROLA CAKE AND BAKERY</title>

   <!-- Google Font -->
   <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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

   <style>
      .foto:hover {
         transition: 0.4s all;
         padding: 1.25rem 0.25rem 1.25rem 0.25rem;
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
                     <a href="#" class="btn btn-outline-warning text-dark" ><i class="fa fa-sign-out"></i> Logout</a>
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
                  <li class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>"><a href="./index.php"><i class="fa fa-home"></i> Home</a></li>
                  <li class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>"><a href="./about.php"><i class="fa fa-book"></i> About</a></li>
                  <li class="<?= basename($_SERVER['PHP_SELF']) == 'blog.php' ? 'active' : '' ?>"><a href="./blog.php"><i class="fa fa-pencil"></i> Blog</a></li>
                  <li class="<?= basename($_SERVER['PHP_SELF']) == 'pengguna.php' ? ' active' : '' ?>"><a href="./pengguna.php"><i class="fa fa-user"></i> Pengguna</a></li>
                  <li class="<?= basename($_SERVER['PHP_SELF']) == 'makanan.php' ? 'active' : '' ?>"><a href="./makanan.php"><i class="fa fa-spoon"></i> Makanan</a></li>
               </ul>
            </nav>
         </div>
         </div>
      </div>
   </header>
      <?php
         if ($breadcrumb == true) {
            include_once('breadcrumb.php');
         }
      ?>
      <div class="breadcrumb-option p-5">
      <div class="container">
         <div class="row text-center">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- Untuk memposisikan lokasi dari header sesuai keinginan -->
            <div class="breadcrumb__text mb-3 <?= $header_center == true ? 'text-center' : 'text-left' ?>">
               <h2><?= $title != null ? $title : 'No Title Yet' ?></h2>
            </div>