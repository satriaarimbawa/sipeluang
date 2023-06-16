<?php

use myClass as GlobalMyClass;

if (isset($_POST['pengadaan'])) {
    $class = new MyClass;
    $class->pengadaan();
} elseif (isset($_POST['perjalanan'])) {
    $class = new MyClass;
    $class->perjalanan();
}



class myClass{

    private $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect('localhost','root','','sipetugas');

        if (!$this->koneksi) {
            echo "koneksi gagal dijalankan";
        }
    }


    public function pengadaan() {
        //isi variabel

        $nama = $_FILES['file']['name'];
        $dir = $_FILES['file']['tmp_name'];
        $size = $_FILES['file']['size'];
        $err = $_FILES['file']['error'];

        if ($err === 4) {
            echo"<script>
        alert('pilih gambar terlebih dahulu');
        document.location.href = 'index.php'
        </script> ";
        }

        $ekstensivalid = ['pdf'];
        $ekstensifile = explode('.',$nama);
        $ekstensifile = strtolower(end($ekstensifile));
        $query = mysqli_query($this->koneksi,"SELECT * FROM buktipengadaan where nama = '$nama'");
        //cek ekstension file
        if (!in_array($ekstensifile,$ekstensivalid)) {
            echo "ekstensi salah";
            // var_dump($eks);
            return false;
        }
        //cek size

        if (!$size > 5000000) {
            echo"file terlalu besar";
            return false;
        }

        if (mysqli_num_rows($query) > 0) {
        echo"<script>
        alert('berkas sudah ada');
        document.location.href = 'index.php'
        </script> ";
        return false;
        }

        $upload = move_uploaded_file($_FILES['file']['tmp_name'],'bkpengadaan/'.$nama);

        if ($upload) {

        $tambah = mysqli_query($this->koneksi,"INSERT INTO `buktipengadaan`(`idbkpengadaan`, `nama`) VALUES (null,'$nama')");

        if (!$tambah) {
            echo "gagal melakukan tambah data". mysqli_error($this->koneksi);
            die;

        } else {
            echo"<script>
            alert('berkas berhasil di upload');
        document.location.href = 'pengadaan.php'
        </script> ";

        }
        }
    }

    public function perjalanan()
    {

        $nama = $_FILES['file']['name'];
        $dir = $_FILES['file']['tmp_name'];
        $size = $_FILES['file']['size'];
        $err = $_FILES['file']['error'];

        if ($err === 4) {
            echo"<script>
        alert('pilih gambar terlebih dahulu');
        document.location.href = 'index.php'
        </script> ";
        }

        $ekstensivalid = ['pdf'];
        $ekstensifile = explode('.',$nama);
        $ekstensifile = strtolower(end($ekstensifile));
        $query = mysqli_query($this->koneksi,"SELECT * FROM buktipengadaan where nama = '$nama'");
        //cek ekstension file
        if (!in_array($ekstensifile,$ekstensivalid)) {
            echo "ekstensi salah";
            // var_dump($eks);
            return false;
        }
        //cek size

        if (!$size > 5000000) {
            echo"file terlalu besar";
            return false;
        }

        if (mysqli_num_rows($query) > 0) {
        echo"<script>
        alert('berkas sudah ada');
        document.location.href = 'index.php'
        </script> ";
        return false;
        }

        $upload = move_uploaded_file($_FILES['file']['tmp_name'],'bkperjalanan/'.$nama);

        if ($upload) {

        $tambah = mysqli_query($this->koneksi,"INSERT INTO `bkperjalanan`(`idbkperjalanan`, `nama`) VALUES  (null,'$nama')");

        if (!$tambah) {
            echo "gagal melakukan tambah data". mysqli_error($this->koneksi);
            die;

        } else {
            echo"<script>
            alert('berkas berhasil di upload');
        document.location.href = 'perjalanan.php'
        </script> ";

        }
        }
    }


}

