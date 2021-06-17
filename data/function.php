<?php
    include('db.php');

    /**
     * Dignakan untuk menampilkan data berdasarkan query yang diinput
     *
     * @param [type] $query
     * @return void
     */
    function query($query){
        global $koneksi;

        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
        }
        return $rows;
    }

    function tambahAdmin($post)
    {
        global $koneksi;

        
    }


?>