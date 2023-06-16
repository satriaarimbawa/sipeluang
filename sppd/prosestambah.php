<?php

if (isset($_POST['insert'])) {
    $class = new myClass;
    $class->insert();
}elseif (isset($_POST['update'])) {
    $class = new myClass;
    $class->update();
}


class myClass {


    private $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect('localhost','root','','sipetugas');

        if (!$this->koneksi) {
            echo "koneksi gagal dijalankan";
        }
    }

    public function insert(){
        $per = $_POST['perintah']; //yang memberi perintah      $perintah   1
        $diper = $_POST['diperintah']; //diperintah             $idpetugas  2
        $dar = $_POST['dari']; //dari daerah                    $daritem    8
        $ke = $_POST['kedaerah']; //ke daerah                   $ketem      9
        $tra = $_POST['trans']; //transposrtasi
        $tgldar = $_POST['tgldari']; //dari tanggal
        $sam = $_POST['sampai']; //sampai tanggal
        $tuj = $_POST['tujuan']; //tujuan
        $ang = $_POST['anggaran']; //rek
        $beban = $_POST['beban'];   //


        $tambah = mysqli_query($this->koneksi,"INSERT INTO `sppd`(`idsppd`, `perintah`, `idpetugas`, `tujuan`, `beban`, `anggaran`, `dari`, `sampai`, `daritem`, `ketem`, `transportasi`,`status`,`note`) VALUES (null,'$per','$diper','$tuj','$beban','$ang','$tgldar','$sam','$dar','$ke','$tra','PENDING',null)");

        if (!$tambah) {
            die(mysqli_error($this->koneksi));
        }else {
            header('Location: ../kwitansi/tambah.php');
        }
    }

    public function update(){
        $id = $_POST['id'];
        $per = $_POST['perintah']; //yang memberi perintah      $perintah   1
        $diper = $_POST['diperintah']; //diperintah             $idpetugas  2
        $dar = $_POST['dari']; //dari daerah                    $daritem    8
        $ke = $_POST['kedaerah']; //ke daerah                   $ketem      9
        $tra = $_POST['trans']; //transposrtasi
        $tgldar = $_POST['tgldari']; //dari tanggal
        $sam = $_POST['sampai']; //sampai tanggal
        $tuj = $_POST['tujuan']; //tujuan
        $ang = $_POST['anggaran']; //rek
        $beban = $_POST['beban'];   //

        $tambah = mysqli_query($this->koneksi,"UPDATE `sppd` SET `perintah`='$per',`idpetugas`='$diper',`tujuan`='$tuj',`beban`='$beban',`anggaran`='$ang',`dari`='$tgldar',`sampai`='$sam',`daritem`='$dar',`ketem`='$ke',`transportasi`='$tra',`status`='PENDING',`note`=null WHERE idsppd = '$id'");
    
        if (!$tambah) {
            echo"terdapat kesalahan pada korespondensi";
        } else {
        echo "
        <script>
        alert('data berhasil di ajukan')
        document.location.href = 'index.php'
        </script>";
        }
        
    }


}



