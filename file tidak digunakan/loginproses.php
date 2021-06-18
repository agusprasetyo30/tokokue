<?php
    include "db.php";
    
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = md5($_POST['password']);
    $query = mysqli_query($con,"SELECT * From users WHERE username = '$username' and password = '$password'");
    $cek = mysqli_num_rows($query);
    $row = mysqli_fetch_assoc($query);
    if($cek){
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['level'] = $row['level'];
        if ($row['level']=='admin') {
            header("location:user.php");
        }else if($row['level']=='member'){
            header("location:user.php");
        } else {
         echo "goblok";
        }
        
    }else{
        echo "Username atau password salah. Silahkan ";?>
            <a href="login.php">Login Kembali</a>
            <?php
            echo mysqli_error($con);
    }
?>
