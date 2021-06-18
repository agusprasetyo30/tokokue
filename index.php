<?php
  include('./data/function.php');

  $breadcrumb_visibility = 'none';

  if ($_GET['category'] == null) {
    $makanan = pagination(4, "SELECT * FROM makanan");
  
  } else {
    $makanan = pagination(4, "SELECT m.*, k.nama FROM makanan m 
      INNER JOIN kategori_makanan km on m.id = km.id_makanan
      INNER JOIN kategori k ON km.id_kategori = k.id
      WHERE k.nama = '$_GET[category]'");
  }
?>

<?php include_once('./layouts/header.php') ?>
  <section class="hero">
    <div class="hero__slider owl-carousel">
      <div class="hero__item set-bg" data-setbg="img/background1.jpg">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <div class="hero__text">
                <h2>      ROLA     </h2>
                <h2> CAKE AND BAKERY</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero__item set-bg" data-setbg="img/background2.jpg">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <div class="hero__text">
                <h2>Terdapat Kebahagiaan Disetiap Gigitan</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>
  <div class="categories">
    <div class="container">
      <div class="row">
        <div class="categories__slider owl-carousel">
          <div class="categories__item">
            <div class="categories__item__icon">
              <a href="index.php?category=Roti Cup">
                <span class="flaticon-029-cupcake-3"></span>
                <h5>Kue Cup</h5>
              </a>
            </div>
          </div>
          <div class="categories__item">
            <div class="categories__item__icon">
              <a href="index.php?category=Roti Bakar">
                <span class="flaticon-034-chocolate-roll"></span>
                <h5>Roti Bakar</h5>
              </a>
            </div>
          </div>
          <div class="categories__item">
            <div class="categories__item__icon">
              <a href="index.php?category=Kue Lapis">
                <span class="flaticon-005-pancake"></span>
                <h5>Kue Lapis</h5>
              </a>
            </div>
          </div>
          <div class="categories__item">
            <div class="categories__item__icon">
              <a href="index.php?category=Es Krim">
                <span class="flaticon-030-cupcake-2"></span>
                <h5>Es krim</h5>
              </a>
            </div>
          </div>
          <div class="categories__item">
            <div class="categories__item__icon">
              <a href="index.php?category=Donat">
                <span class="flaticon-006-macarons"></span>
                <h5>Donat</h5>
              </a>
            </div>
          </div>
          <div class="categories__item">
            <div class="categories__item__icon">
              <a href="index.php?category=Oreo Cake">
                <span class="flaticon-005-pancake"></span>
                <h5>Oreo Cake</h5>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="product spad">
    <div class="container">
      <div class="row">
      <?php
        foreach ($makanan as $value) {
      ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="./img/makanan/<?= $value['gambar'] ?>">
            </div>
            <div class="product__item__text">
              <h6><a href="#"><?= $value['nama'] ?></a></h6>
              <div class="product__item__price">Rp. <?= number_format($value['harga'],0,',' , '.') ?></div>
              <div class="cart_add">
                <a href="https://api.whatsapp.com/send?phone=6289601517838">Buy</a>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <div class="text-center w-100 mt-3">
          <?= paginationNumber($_GET['category']) ?>
        </div>
      </div>
    </div>
  </section>

<?php include_once('./layouts/footer.php') ?>
