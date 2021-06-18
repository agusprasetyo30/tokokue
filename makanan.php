<?php
  include('./data/function.php');

  $title = "Makanan";

//   $data_pengguna = pagination(5, "SELECT * FROM users");
?>


<?php include_once('./layouts/header.php') ?>

<div class="row">
   <div class="col-md-12">
      <a href="tambah-makanan.php" class="btn btn-sm btn-success float-right mb-2"><i class="fa fa-plus"></i> Tambah Makanan</a>
   </div>
</div>

<div class="row">
   <div class="col-md-3">
      <div class="card">
         <div class="card-body foto">
            <a href="#">
               <img src="./img/icecream1.jpg" width="100%" height="250px" class="img-rounded">
               <div class="text-center m-2 text-dark">
                  Ini Es Kerim
               </div>
               <div class="input-group-btn">
                  <a href="edit-makanan.php?id=" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>

<?php include_once('./layouts/footer.php') ?>
