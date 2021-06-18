<?php
    include('./data/function.php');

    $title = "Blog";
    $id = $_GET['id'] == null ? '' : $_GET['id'];
    
    $makanan = query("SELECT * FROM makanan");
    
    if ($id == null) {
        $resep = $makanan[0];
    
    } else {
        $resep = query("SELECT * FROM makanan WHERE id = '$id'")[0];
    }
    
?>

<?php include_once('./layouts/header.php') ?>
    
    <section class="blog text-left">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="./img/makanan/<?= $resep['gambar'] ?>">
                            <div class="blog__pic__inner">
                                <div class="label">Resep</div>
                            </div>
                        </div>
                        <div class="blog__item__text">
                            <h2>Cara Memasak <?= $resep['nama'] ?></h2>
                            <?= $resep['resep'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <h5>Resep Lainnya</h5>
                            <div class="blog__sidebar__item__categories">
                                <ul>
                                    <?php
                                        foreach ($makanan as $value) {
                                    ?>

                                    <li><a href="blog.php?id=<?= $value['id'] ?>">Membuat <?= $value['nama'] ?></a></li>
                                    
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include_once('./layouts/footer.php') ?>
