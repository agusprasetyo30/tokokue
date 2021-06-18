<?php
   include('./data/function.php');

   $title = "Makanan";

  $data_makanan = pagination(8, "SELECT * FROM makanan");
?>


<?php include_once('./layouts/header.php') ?>

<div class="row">
   <div class="col-md-12">
      <a href="tambah-makanan.php" class="btn btn-sm btn-success float-right mb-2"><i class="fa fa-plus"></i> Tambah Makanan</a>
   </div>
</div>

<div class="row">
   <?php
      foreach ($data_makanan as $makanan) {
   ?>
   <div class="col-md-3 mt-1">
      <div class="card">
         <div class="card-body foto">
            <a href="show-makanan.php?id=<?= $makanan['id'] ?>">
               <img src="./img/makanan/<?= $makanan['gambar'] ?>" width="100%" height="250px" class="img-rounded">
               <div class="text-center m-2 text-dark">
                  <p><?= $makanan['nama'] ?></p>
                  <p>Rp. <?= number_format($makanan['harga'],0,',' , '.') ?></p>
               </div>
               <div class="input-group-btn">
                  <a href="edit-makanan.php?id=<?= $makanan['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="hapus-makanan.php?id=<?= $makanan['id'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
               </div>
            </a>
         </div>
      </div>
   </div>
   <?php } ?>

</div>
<div class="text-center w-100 mt-3">
   <?= paginationNumber() ?>
</div>

<?php include_once('./layouts/footer.php') ?>
