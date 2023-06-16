<?php

use myclass as GlobalMyclass;

include "../koneksi.php";

if (isset($_POST['insert'])) {
    $class = new myclass;
    $class->insert();
} elseif (isset($_POST['update'])) {
    $class = new myclass;
    $class->update();
}elseif (isset($_POST['submit'])) {
    $class = new myclass;
    $class->submit();
}



class myclass {

    private $koneksi;
    private $query;


function __construct() {

$username = "localhost";
$user = "root";
$pass = "";
$db = "sipetugas";


$this->koneksi = mysqli_connect($username,$user,$pass,$db);

if (!$this->koneksi) {
    echo"
    
<script>
alert('koneksi anda gagall');
</script>
    ";
}

}

    function insert(){
    $terima = $_POST['jumlah'];
    $tempat = $_POST['tempat'];
    $total = $_POST['total'];
    $tgl = date('Y-m-d');

    $today = date("ymd");
    $query = mysqli_query($this->koneksi,"SELECT max(angkatan) AS last from daftar WHERE angkatan ");
    $bar = mysqli_fetch_assoc($query);
    $lastangkatan = $bar['last'];
    $lastnourut = substr($lastangkatan,6,4);
    $nextnourut = $lastnourut + 1;
    $nextangkatan = $today.sprintf('%04s' , $nextnourut);

    for ($i=1; $i <=$_POST['total'] ; $i++) { 
        $nama = trim(mysqli_real_escape_string($this->koneksi,$_POST['pet'.$i]));

        $nambah = mysqli_query($this->koneksi,"INSERT INTO `daftar`(`iddaf`,`idpetugas`, `jumlahterima`, `tglbuat`, `angkatan`, `tempat`,`status`) VALUES (null,'$nama','$terima','$tgl','$nextangkatan','$tempat','PENDING')");

    }

    // var_dump($tempat);
    // if (!$nambah) {
    //     die(mysqli_error($koneksi));
    // }else {
    //     $queryspt = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT iddaf FROM daftar ORDER BY iddaf DESC LIMIT 1"));
    //     $id = $queryspt['iddaf'];
    //     // var_dump($id);

    //     $tambah = mysqli_query($koneksi,"INSERT INTO `spt`(`idspt`, `iddaftar`, `tujuan`, `temsurat`, `tglsurat`,`tgljalan`,`ketempat`) VALUES (null,'$id',null,null,null,null,null)");

    //     if (!$tambah) {
    //         echo"gagal di tambah".mysqli_error($koneksi);
    //     }else {
        //     }
        
            // echo"<script>
            // document.location.href = 'laporan_peserta.php'
            // </script>";
            echo"<script>
            document.location.href = '../sppd/tambah.php'
            </script>";
    // }
    }

    function update(){

$terima = $_POST['jumlah'];
$tempat = $_POST['tempat'];
$total = $_POST['total'];
$tgl = date('Y-m-d');

    for ($i=1; $i <= $_POST['total']; $i++) { 
        $nama = trim(mysqli_real_escape_string($this->koneksi,$_POST['pet'.$i]));
        $pet = $_POST['pet'.$i];
        $iddaf = $_POST['iddaf'.$i];


        $nambah = mysqli_query($this->koneksi,"UPDATE `daftar` SET `idpetugas`='$pet',`jumlahterima`='$terima',`tglbuat`='$tgl',`tempat`='$tempat',`status`='PENDING',`note`= null WHERE iddaf = '$iddaf'");
    }
    
    // for ($i = 1; $i <= $_POST['total']; $i++) { 
    //     $pet = isset($_POST['pet'.$i]) ? intval($_POST['pet'.$i]) : 0;
    //     $iddaf = isset($_POST['iddaf'.$i]) ? $_POST['iddaf'.$i] : '';

    //     if ($pet != 0 && $iddaf != '') {
    //         $nambah = mysqli_query($this->koneksi, "UPDATE `daftar` SET `idpetugas`='$pet', `jumlahterima`='$terima', `tglbuat`='$tgl', `tempat`='$tempat', `status`='PENDING', `note`= null WHERE iddaf = '$iddaf'");
            
    //         if (!$nambah) {
    //             echo "Error: " . mysqli_error($this->koneksi);
    //         }
    //     }
    // }


    if (!$nambah) {
        echo"terjadi kesalahan query".mysqli_error($this->koneksi);
    }else {
            echo"<script>
            alert('data berhasil di ubah')
            document.location.href = 'index.php'
            </script>";
    }

    }

    public function submit(){

    //     $nambah = mysqli_query($this->koneksi,"UPDATE `daftar` SET `status`='PENDING',`note`= null WHERE iddaf = '$_POST[id]'");
        
    // if (!$nambah) {
    //     echo"terjadi kesalahan query".mysqli_error($this->koneksi);
    // }else {
            echo"<script>
            alert('sedang mengajukan berkas')
            document.location.href = 'index.php'
            </script>";
    // }
    }
}

