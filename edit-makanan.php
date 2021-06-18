<?php
   include('./data/function.php');

   $title = "Edit Makanan";
   $header_center = true;

   $kategori = query("SELECT * FROM kategori");
?>


<?php include_once('./layouts/header.php') ?>

<div class="card">
      <div class="card-body">
   <div class="row justify-content-center">
         <div class="col-md-6">
            <form action=""  method="post" enctype="multipart/form-data">
               <div class="form-group text-left">
                  <label for="nama" class="text-left">Nama</label>
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Makanan" required/>
               </div>

               <div class="form-group text-left">
                  <label for="harga" class="text-left">Harga</label>
                     <div class="input-group">
								<div class="input-group-prepend w-100">
									<span class="input-group-text">Rp. </span>
                           <input type="number" id="harga" name="harga" class="form-control" placeholder="Masukan Harga" required/>
								</div>
                     </div>
               </div>

               <div class="form-group text-left ">
                  <label for="kategori" class="text-left">Kategori Makanan</label>
                  <select name="kategori[]" id="kategori" class="form-control form-select" style="width: 100%;" multiple="multiple">
                     <?php
                     foreach ($kategori as $data) {
                        echo '<option value="' . $data['id'] . '">' . $data['nama'] . '</option>';
                     }
                     ?>
                  </select>
                  <small style="font-size: 10px;">*Bisa lebih dari 1 kategori</small>
               </div>
               
               <div class="form-group text-left ">
                  <label for="gambar" class="text-left">Upload Gambar</label>
                  <input type="file"  accept="image/*" name="image" id="file" class="form-control" style="padding-bottom: 35px;" onchange="loadFile(event)" >
                  
                  <div class="row mt-2">
                     <div class="col-md-6">
                        <img id="output" width="100%" class="image-preview mt-2 d-inline">
                     </div>
                     <div class="col-md-6">
                        <button type="submit" name="simpan" class="btn btn-success float-right">Simpan</button>
                        <a href="makanan.php" class="btn btn-warning float-right mr-2">Back</a>
                     </div>
                  </div>

               </div>
               
               
         </div>
         <div class="col-md-6">
            <div class="form-group text-left ">
               <label for="kategori" class="text-left">Resep Makanan</label>
               <textarea id="summernote" name="resep"></textarea>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php 

   include_once('./layouts/footer.php');
   
   if (isset($_POST['simpan'])) {
      echo "<pre>";
         var_dump($_POST);
      echo "</pre>";

      // if (tambahPengguna($_POST) > 0) {
         // echo "
         //    <script>
         //    alert('Data berhasil ditambahkan');
         //    // document.location.href = 'pengguna.php';
         //    </script>
         // ";
      // } else {
      //    echo "
      //    <script>
      //    alert('Data gagal ditambahkan');
      //    // document.location.href = 'editanggota.php';            
      //    </script>
      //    ";
      //    echo("<br>");
      //    echo mysqli_error($koneksi);        
      // }
   }
?>

<script>
	$(document).ready(function() {
		$('#kategori').select2({
			placeholder: 'Masukan kategori',
		});

      // Summernote
      $('#summernote').summernote({
         placeholder: 'Isi resep makanan disini',
         height: 140,
      });

	})

   var loadFile = function(event) {
      var image = document.getElementById('output');
      image.src = URL.createObjectURL(event.target.files[0]);
   };
</script>