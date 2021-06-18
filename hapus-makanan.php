<?php
   include('./data/function.php');

   $id = $_GET['id'];

   if (hapusMakanan($id) > 0) {
      echo "
         <script>
            alert('Data berhasil dihapus');
            document.location.href = 'makanan.php';
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