<?php

if (isset($_POST['simpan'])) {
    $class = new myClass;
    $class->insert();
}

class myClass{

    private $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect('localhost','root','','sipetugas');

        if (!$this->koneksi) {
            echo "koneksi gagal";
        }
    }



    public function insert(){
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $norek = $_POST['norek'];
        $tel = $_POST['telp'];
        $gol = $_POST['gol'];
        $jab = $_POST['jabatan'];
        $key = 'saTpoLpp';
        $iv = 'pEmeRinThpEmeRin';

        // Enkripsi data menggunakan AES
        $nomor = openssl_encrypt($nip, 'AES-256-CBC', $key, 0, $iv);
        $rek = openssl_encrypt($norek, 'AES-256-CBC', $key, 0, $iv);
        $telp = openssl_encrypt($tel, 'AES-256-CBC', $key, 0, $iv);



        $tambah = mysqli_query($this->koneksi,"INSERT INTO `petugas`(`idpetugas`, `nama`, `nip`, `norek`, `telp`, `gol`, `jabatan`) VALUES (null,'$nama','$nomor','$rek','$telp','$gol','$jab')");

        if (!$tambah) {
            echo"gagal melakukan query".mysqli_error($this->koneksi);
        }else {
            echo"<script>
            alert('data telah di input');
            document.location.href = 'index.php'
            </script>";
        }
    }
}

