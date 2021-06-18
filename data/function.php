<?php
    // ini_set('display_errors', 1);
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

    function tambahMakanan($post)
    {
        global $koneksi;

        $nama = $post['nama'];
        $harga = $post['harga'];
        $kategori = $post['kategori'];
        $resep = $post['resep'];

        $gambar = uploadGambarMakanan($nama);
        
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO makanan VALUES(NULL, '$nama', '$harga', '$gambar', '$resep')";
        
        if (mysqli_query($koneksi, $query)) {
            $makanan_id = mysqli_insert_id($koneksi);

            for ($i=0; $i < count($kategori); $i++) { 
                $kategori_makanan = "INSERT INTO kategori_makanan VALUES(NULL, $makanan_id, $kategori[$i])";
                mysqli_query($koneksi, $kategori_makanan);
            }
        }

        return mysqli_affected_rows($koneksi);       
    }

    /**
     * Undocumented function
     *
     * @param [type] $post
     * @return void
     */
    function editMakanan($post)
    {
        global $koneksi;

        $id_makanan = $post['id_makanan'];
        $nama = $post['nama'];
        $harga = $post['harga'];
        $kategori = $post['kategori'];
        $resep = $post['resep'];
        $gambar_lama = $post['gambar_lama'];

        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambar_lama;
        } else {
            if (hapusGambarMakanan($id_makanan)) {
                $gambar = uploadGambarMakanan($nama);
            }
        }

        // Update makanan
        $query = "UPDATE makanan SET 
            nama    = '$nama',
            harga   = '$harga',
            resep   = '$resep',
            gambar  = '$gambar' WHERE id = '$id_makanan'";

        // Dignakan untuk menghapus many to many kategori
        $kategori_hapus = "DELETE kategori_makanan WHERE id_makanan = '$id_makanan'";
        mysqli_query($koneksi, $kategori_hapus);

        // Menyimpan kategori yang baru/sesuai inputan
        for ($i=0; $i < count($kategori); $i++) { 
            $kategori_makanan = "INSERT INTO kategori_makanan VALUES(NULL, $id_makanan, $kategori[$i])";
            mysqli_query($koneksi, $kategori_makanan);
        }

        // Eksekusi update makanan
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    function hapusMakanan($id)
    {
        global $koneksi;

        $query = "DELETE from makanan where id = '$id' ";

        if (hapusGambarMakanan($id)) {
            mysqli_query($koneksi, $query);
            return mysqli_affected_rows($koneksi);
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $judul
     * @return void
     */
    function uploadGambarMakanan($judul = null){
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
        if ($ukuran_file > 5000000) {
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
            $namafilebaru = trim((string)$judul, ' ');
        }

        $namafilebaru .= ".";
        $namafilebaru .= $pecah_gambar;

        $location = dirname(getcwd()) . '/tubes-uas/img/makanan/' . $namafilebaru;
        // $location = '../img/makanan/' . $namafilebaru;

        if(move_uploaded_file($file_tmp, $location)) {
            return $namafilebaru;
        } else {
            echo 'something wrong';
            return false;
        }

        //mereturn nama file agar masuk ke $gambar == upload()
        // return $namafilebaru;
    }

    /**
     * Undocumented function
     *
     * @param [type] $id_makanan
     * @return void
     */
    function hapusGambarMakanan($id_makanan)
    {
        $query = query("SELECT gambar FROM makanan WHERE id = '$id_makanan'")[0];

        if ($query['gambar'] == null) {
            return true;
            
        } else {
            $location = dirname(getcwd()) . '/tubes-uas/img/makanan/' . $query['gambar'];
            // $location = '../img/makanan/' . $namafilebaru;
            unlink($location);
            return true;
        }
    }
?>