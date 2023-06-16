<?php

include "../koneksi.php";

if (isset($_POST['komen'])) {
    $class = new myclass();
    $class->update();
} elseif (isset($_POST['cancel'])) {
    $class = new myclass();
    $class->cancel();
}

class myclass{
    

    private $koneksi;
    private $update;
    private $cancel;

    public function __construct()
    {
        $this->koneksi = mysqli_connect('localhost','root','','sipetugas');
    }

    function update(){
    $this->update = mysqli_query($this->koneksi,"UPDATE daftar SET note='$_POST[note]', status = 'ditolak' WHERE angkatan = $_POST[id]");

        if (!$this->update) {
            echo"terjadi kesalahan ";
        }else {
            echo"<script>
                alert('data berhasil di report')
                document.location.href = 'index.php'
                </script>
                ";
        }
    }

    function cancel(){
        $this->cancel = mysqli_query($this->koneksi,"UPDATE daftar SET status='verify' where angkatan = '$_POST[id]'");

        if (!$this->cancel) {
        echo"
        terjadi kesalahan.".mysqli_error($this->koneksi);;
        
        }else {
        echo"<script>
        alert('sudah di ferifikasi')
        document.location.href = 'index.php'
        </script>
        ";
        }

    }

}



