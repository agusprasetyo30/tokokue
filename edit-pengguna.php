<?php
   include('./data/function.php');

   $title = "Edit Pengguna";

   // Mengambil variabel username pada url
   $getUsername = $_GET['user'];

   $pengguna = query("SELECT * FROM users WHERE username = '$getUsername'")[0];

   // var_dump($pengguna['nama']);
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
            <form name="registration" action=""  method="post">
               <div class="form-group text-left">
                  <label for="username" class="text-left">Username</label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username" value="<?= $pengguna['username'] ?>" required readonly/>
               </div>

               <div class="form-group text-left">
                  <label for="nama" class="text-left">Nama</label>
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Pengguna" value="<?= $pengguna['nama'] ?>" required/>
               </div>

               <div class="form-group text-left">
                  <label for="status" class="d-block text-left">Status Pengguna</label>
                  
                  <div class="form-check form-check-inline">
                     <input type="radio" class="form-check-input" name="status" id="member" value="AKTIF" <?= $pengguna['status'] == 'AKTIF' ? ' checked' : '' ?> >
                     <label class="form-check-label" for="member">Aktif</label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input type="radio" class="form-check-input" name="status" id="non" value="NONAKTIF" <?= $pengguna['status'] == 'NONAKTIF' ? ' checked' : '' ?>>
                     <label class="form-check-label" for="non">Non Aktif</label>
                  </div>
               </div>

               
         </div>
      <div class="col-md-6">
         <div class="form-group text-left">
                     <label for="password">Password</label>
                     <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Password" />
                  </div>

                  <div class="form-group text-left">
                     <label for="konfirmasi_password">Konfirmasi Password</label>
                     <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control" placeholder="Masukan Password" />
                     <small style="font-size: 10px; color: red;">*Kosongkan kalau tidak ingin mengganti password</small>
                  </div>

                  <div class="form-group text-right">
                     <a href="pengguna.php" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                     <button type="submit" name="edit" class="btn btn-primary">
                        <i class="fa fa-pencil"></i>
                        Update
                     </button>
                  </div>

               </form>
         </div>
      </div>
   </div>
</div>

<?php 

   include_once('./layouts/footer.php');
   
   if (isset($_POST['edit'])) {
      if (editPengguna($_POST) > 0) {
         echo "
            <script>
            alert('Data berhasil di update');
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