<?php
session_start();
// hapus semua variabel session
session_unset(); 
// tutup session 
session_destroy(); 

header('Location: ../tokokue');
?>