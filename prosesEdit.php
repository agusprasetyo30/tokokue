<?php
    include "db.php";
    $id_users =$_GET['id_users'];
    $username =$_GET['username'];
    $level =$_GET['level'];
    $query = "UPDATE users SET id_users='$id_users', username='$username', level='$level' WHERE id_users='$id_users'";
    $result =mysqli_query($con, $query);
    if($result){
        echo "Berhasil Update data ke database";
?>
<a href="user.php">Lihat Data DiTable </a>
<?php
    }else{
        echo "Gagal update data" . mysqli_error($con);
    }
?>