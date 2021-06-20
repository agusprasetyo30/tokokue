<?php
   include('./data/function.php');

   $title = "Tambah Pengguna";
   $header_center = true;

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



<div class="row justify-content-center">
   <div class="col-md-5">
      <div class="card">
         <div class="card-body">
            <form name="registration" action=""  method="post">
               <div class="form-group text-left">
                  <label for="nama" class="text-left">Nama</label>
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Pengguna" required />
               </div>

               <div class="form-group text-left">
                  <label for="username" class="text-left">Username</label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username" required />
               </div>
               
               <div class="form-group text-left">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Password" required />
               </div>

               <div class="form-group text-right">
                  <a href="pengguna.php" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                  <button type="submit" name="tambah" class="btn btn-success">
                     <i class="fa fa-sign-in"></i>
                     Login
                  </button>
               </div>

            </form>
         </div>
      </div>
   </div>
</div>

<?php 

   include_once('./layouts/footer.php');
   
   if (isset($_POST['tambah'])) {
      if (tambahPengguna($_POST) > 0) {
         echo "
            <script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'pengguna.php';
            </script>
         ";
      } else {
         echo "
         <script>
         alert('Data gagal ditambahkan');
         // document.location.href = 'editanggota.php';            
         </script>
         ";
         echo("<br>");
         echo mysqli_error($koneksi);        
     }
   }
?>