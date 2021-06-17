<?php
   include('./data/function.php');

   $username = $_GET['user'];

   if (hapusPengguna($username) > 0) {
      echo "
         <script>
            alert('Data berhasil dihapus');
            document.location.href = 'pengguna.php';
         </script>
      ";
   } else {
      echo "
         <script>
            alert('Hapus data gagal');
            // document.location.href = 'jenisbarang.php';
         </script>
      ";
      echo("<br>");
      var_dump(mysqli_error($koneksi));
   }
    
?>