<?php
   include('./data/function.php');

   $header_center = true;
   $id = $_GET['id'];

   $kategori = query("SELECT * FROM kategori");

   $makanan = query("SELECT * FROM makanan WHERE id = '$id'")[0];

   $makanan_kategori = query("SELECT k.id FROM kategori_makanan km 
   INNER JOIN makanan m ON m.id = km.id_makanan 
   INNER JOIN kategori k ON k.id = km.id_kategori WHERE m.id = '$id' ");

   $arr_kategori = [];
   foreach ($makanan_kategori as $id => $item) {
      array_push($arr_kategori, $item['id']);
   }

   $title = $makanan['nama'];
   // var_dump($a);
   // var_dump(json_encode($makanan_kategori));
   
   include_once('./layouts/header.php');

   // yang belum login akan diarahkan ke halaman login
   if (!isset($_SESSION['id'])) {
      echo '
         <script>
            alert("Login dulu..");
            window.location.href = "./login.php";
         </script>
      ';
   }
?>


<div class="card">
      <div class="card-body">
   <div class="row justify-content-center">
         <div class="col-md-6">
               <div class="form-group text-left">
                  <label for="nama" class="text-left">Nama</label>
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Makanan" value="<?= $makanan['nama'] ?>" readonly required/>
               </div>

               <div class="form-group text-left">
                  <label for="harga" class="text-left">Harga</label>
                     <div class="input-group">
								<div class="input-group-prepend w-100">
									<span class="input-group-text">Rp. </span>
                           <input type="number" id="harga" name="harga" class="form-control" placeholder="Masukan Harga" value="<?= $makanan['harga'] ?>" readonly required/>
								</div>
                     </div>
               </div>

               <div class="form-group text-left ">
                  <label for="kategori" class="text-left">Kategori Makanan</label>
                  <select name="kategori[]" id="kategori" class="form-control form-select" style="width: 100%;" multiple="multiple" disabled>
                     <?php
                     foreach ($kategori as $data) {
                        echo '<option value="' . $data['id'] . '">' . $data['nama'] . '</option>';
                     }
                     ?>
                  </select>
                  <small style="font-size: 10px;">*Bisa lebih dari 1 kategori</small>
               </div>
               
               <div class="form-group text-left ">
                  <label for="gambar" class="text-left">Gambar</label>
                  <div class="row">
                     <div class="col-md-8">
                        <img src="./img/makanan/<?= $makanan['gambar'] ?>" id="output" width="100%" class="image-preview mt-2 d-inline">
                     </div>
                     <div class="col-md-4">
                        <a href="makanan.php" class="btn btn-warning float-right mr-2"><i class="fa fa-undo"></i> Back</a>
                     </div>
                  </div>
               </div>
               
               
         </div>
         <div class="col-md-6">
            <div class="form-group text-left ">
               <label for="kategori" class="text-left">Resep Makanan</label>
               <div class="p-2 border">
                  <?= $makanan['resep'] ?>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php 
   include_once('./layouts/footer.php');
?>

<script>

$(document).ready(function() {

		$('#kategori').select2({
			placeholder: 'Masukan kategori',
         
		}).val(<?= json_encode($arr_kategori); ?>).trigger('change');

      // Summernote
      // $('#summernote').summernote({
      //    placeholder: 'Isi resep makanan disini',
      //    height: 140,
      // });

	});
</script>