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

    /**
     * Undocumented function
     *
     * @param [type] $username
     * @return void
     */
    function hapusPengguna($username)
    {
        global $koneksi;

        $query = "DELETE from users where username = '$username' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    /**
     * Undocumented function
     *
     * @param [type] $judul
     * @return void
     */
    function uploadbarang($judul){
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $file_tmp = $_FILES['gambar']['tmp_name'];

        if ($error === 4) { 
            echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
            ";
            return false;
        }

        $jenis_gambar = ['jpg', 'jpeg', 'png', 'gif','JPG']; //jenis gambar yang boleh diinputkan
        $pecah_gambar = explode(".", $nama_file); //Memecah nama file dengan jenis gambar
        $pecah_gambar = strtolower(end($pecah_gambar)); //mengambil data array paling belakang
        if (!in_array($pecah_gambar, $jenis_gambar)) {
            echo "
                <script>
                    alert('Yang anda upload bukan file gambar');
                </script>
            ";
            return false;
        }
        //cek kapasitas file yang diupload dala bentuk byte 1 MB = 1000000 Byte
        if ($ukuran_file > 10000000) {
            echo"
                <script>
                    alert('Ukuran file terlalu besar');
                </script>
            ";
            return false;
        }

        if ($judul == null) {
            $namafilebaru = uniqid();
        
        } else {
            $namafilebaru = $judul;
        }

        $namafilebaru .= ".";
        $namafilebaru .= $pecah_gambar;

        move_uploaded_file($file_tmp, '../img/makanan/'.$namafilebaru);

        //mereturn nama file agar masuk ke $gambar == upload()
        return $namafilebaru;
    }
?>