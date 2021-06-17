<?php
    include('db.php');
    include('pagination.php');

    /**
     * Dignakan untuk menampilkan data berdasarkan query yang diinput
     *
     * @param [type] $query
     * @return void
     */
    function query($q) : array
    {
        global $koneksi;

        $result = mysqli_query($koneksi, $q);
        $rows = [];
        while ($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
        }
        return $rows;
    }

    /**
     * digunakan untuk menambahkan pengguna baru
     *
     * @param [type] $post
     * @return void
     */
    function tambahPengguna($post)
    {
        global $koneksi;

        $nama = $post['nama'];
        $username = $post['username'];
        $password = md5($post['password']);
        $status = 'AKTIF';

        //mengecek username apakah sudah ada atau belum
        $query = mysqli_query($koneksi, "SELECT username FROM users WHERE username='$username' ");
    
        if (mysqli_fetch_assoc($query)) {
            echo "
                <script>
                    alert('Username sudah ada');
                    window.location = 'tambah-pengguna.php';
                </script>
                ";

            return false;
        }

        $query = "INSERT INTO users VALUES(NULL, '$nama', '$username', '$password', '$status')";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    /**
     * Undocumented function
     *
     * @param [type] $post
     * @return void
     */
    function editPengguna($post)
    {
        global $koneksi;

        $nama = $post['nama'];
        $username = $post['username'];
        $status = $post['status'];
        $password = $post['password'];
        $konfirmasi_password = $post['password'];

        // Mengecek apakah pengguna menginput password atau tidak
        if ($password != '') {
            if ($password == $konfirmasi_password) {
                $password_new = md5($post['password']);
            
                $query = "UPDATE users SET
                    nama     = '$nama',
                    status   = '$status',
                    password = '$password_new'
                    WHERE username = '$username'";
            } else {
                echo "
                <script>
                    alert('Tidak dapat merubah data');
                    window.location = 'pengguna.php';
                </script>
                ";

            return false;
            }

        } else {
            $query = "UPDATE users SET
                nama    = '$nama',
                status  = '$status'
                WHERE username = '$username'";
        }

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);       
    }

    function hapusPengguna($username)
    {
        global $koneksi;

        $query = "DELETE from users where username = '$username' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
?>