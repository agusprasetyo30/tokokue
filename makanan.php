<?php

//Harga makanan
function harga_klepon()
{
    include "db.php";
    $klepon = mysqli_query($con, "
           SELECT * from makanan where id_makanan = 1
          ");
    $rows = [];
    while ($row = mysqli_fetch_assoc($klepon)) {
        $rows[] = $row;
    }
    $diskon = 0.1;
    $hargadiskon = $rows[0]['harga'] * $diskon;
    $harga = $rows[0]['harga'] - $hargadiskon;
    echo ($harga);
}
function harga_kuelumpur()
{
    include "db.php";
    $kuelumpur = mysqli_query($con, "
          SELECT makanan.harga from makanan where id_makanan = 2
         ");
    $rows = [];
    while ($row = mysqli_fetch_assoc($kuelumpur)) {
        $rows[] = $row;
    }
    $diskon = 0.2;
    $hargadiskon = $rows[0]['harga'] * $diskon;
    $harga = $rows[0]['harga'] - $hargadiskon;
    echo ($harga);
}
function harga_kueserabi()
{
    include "db.php";
    $kueserabi = mysqli_query($con, "
        SELECT makanan.harga from makanan where id_makanan = 3
       ");
    $rows = [];
    while ($row = mysqli_fetch_assoc($kueserabi)) {
        $rows[] = $row;
    }
    $diskon = 0.05;
    $hargadiskon = $rows[0]['harga'] * $diskon;
    $harga = $rows[0]['harga'] - $hargadiskon;
    echo ($harga);
}
function harga_pukis()
{
    include "db.php";
    $pukis = mysqli_query($con, "
        SELECT makanan.harga from makanan where id_makanan = 4
       ");
    $rows = [];
    while ($row = mysqli_fetch_assoc($pukis)) {
        $rows[] = $row;
    }
    $diskon = 0.05;
    $hargadiskon = $rows[0]['harga'] * $diskon;
    $harga = $rows[0]['harga'] - $hargadiskon;
    echo ($harga);
}
