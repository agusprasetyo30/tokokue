<?php
include "db.php";
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $query = "INSERT into `users`(username,password) VALUES ('$username', '" . md5($password) . "')";
    $result = mysqli_query($con, $query);
    if (isset($_POST['submit'])) {
        if ($result) {
            echo "<div class='form'><h3>Selamat, anda berhasil daftar</h3><br/>Klik ini untuk <a class='text-primary' href='login.php'>Login</a></div>";
        } else {
            echo "gagal daftar";
        }
    } else {
        echo "gagal daftar";
    }
    
   
?>
          