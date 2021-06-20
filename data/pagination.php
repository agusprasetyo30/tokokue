<?php
   include('db.php');

   $previous;
   $next;
   $total_halaman;
   $nomer;
   $halaman_current;

   /**
     * Digunakan untuk menampilkan data sesuai dengan data pagination
     *
     * @param [int] $batasTampil
     * @param [string] $query
     */
   function pagination(int $batasTampil, $query) : object
   {
      global $halaman_current, $previous, $next, $total_halaman, $nomer, $koneksi;
      
      $halaman = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      
      $halaman_current = ($halaman > 1) ? ($halaman * $batasTampil) - $batasTampil : 0;
      // $this->halaman_current = ($halaman > 1) ? ($halaman * $batasTampil) / $batasTampil : 0;
      
      $previous = $halaman - 1;
      $next = $halaman + 1;

      $data = mysqli_query($koneksi, $query);
      $jml_data = mysqli_num_rows($data);
      $total_halaman = ceil($jml_data / $batasTampil);
      
      $data_pagination = mysqli_query($koneksi, $query . ' limit ' . $halaman_current . ', ' . $batasTampil);
      
      $nomer = 1 + $halaman_current;

      return $data_pagination;
   }

   /**
    * Mengambil nomer sesuai dengan jumlah data yang ditampilkan
    *
    * @return integer
    */
   function getNomer() : int
   {
      global $nomer;

      return (int)$nomer++;
   }
   
   /**
    * Menampilkan nomer halaman current sesuai dengan data yg dipilih
    *
    * @return integer
    */
   function getHalamanCurrent() : int
   {
      global $halaman_current;
      
      return $halaman_current;
   }

   /**
    * Menampilkan semua data nomer pagination
    *
    * @param [type] $menu
    * @return string
    */
   function paginationNumber($menu = null) : string 
   {
      global $halaman_current, $previous, $next, $total_halaman;

      $link_previous = '';
      $number_link = '';
      $link_next = '';

      // Untuk tombol previous
      if ($halaman_current > 1) {
        $link_previous = "href='?category=" . $menu . "&page=$previous'";
      }

      // Untuk tombol next
      if ($halaman_current < $total_halaman) {
        $link_next = "href='?category=" . $menu . "&page=$next'";
      }

      $previous = "<nav>" .
      "<ul class='pagination justify-content-center'><li class='page-item'>" .
      "<a class='page-link'" . $link_previous . ">Previous</a>";
      

      for ($i=1; $i <= $total_halaman; $i++) { 
        if ($next - 1 == $i) {
            $number_link .= "<li class='page-item active'><a class='page-link' href='?category=" . $menu . "&page=" . $i . "'>" . $i . "</a></li>";
        } else {
            $number_link .= "<li class='page-item'><a class='page-link' href='?category=" . $menu . "&page=" . $i . "'>" . $i . "</a></li>";
        }
      }
      
      $next = "<li class='page-item'> <a class='page-link'" . $link_next . ">Next</a>";

      // Menggabungkan semua perintah
      return $previous . $number_link . $next;
   }
?>
