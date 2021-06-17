<?php
    include "db.php";
    $id =$_GET['id'];
   
    $query ="DELETE FROM users WHERE id_users = '$id'";
    $result = mysqli_query($con,$query);
    var_dump($result);
    if ($result) {
        echo "Data Berhasil dihapus";
    } else{
        echo "Gagal update data" . mysqli_error($con);
    }
?>
<a href="user.php">Lihat Data DiTable </a>