<?php
  $namaHost = "localhost";
  $username = "root";
  $password = "gokpras123";
  $database = "tubes";

  $koneksi = mysqli_connect($namaHost, $username, $password, $database);

  if (mysqli_connect_errno())
  {
  echo "Koneksi Gagal : " . mysqli_connect_error();
  }
?>
