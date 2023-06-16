<?php

include "../koneksi.php";

$pemberi    = $_POST['pemberi'];
$tujuan     = $_POST['tujuan'];
$nom        = $_POST['nominal'];
$jum        = $_POST['jumlah'];
$norek      = $_POST['norek'];
$membagikan = $_POST['membagikan'];
$peltek     = $_POST['peltek'];
$pengguna   = $_POST['pengguna'];
$tgltrans   = $_POST['tgltrans'];
$status   = $_POST['status'];

setlocale(LC_TIME, 'id_ID');
$tanggal = strftime('%d %B %Y');


$tambah = mysqli_query($koneksi,"INSERT INTO `kwitansi`(`idkwit`, `pemberi`, `nom`, `banyak`, `tgltrans`, `tglkwit`, `ket`, `peltek`, `penerima`, `pengguna`,`rek`,`status`) VALUES (null,'$pemberi','$nom','$jum','$tgltrans','$tanggal','$tujuan','$peltek','$membagikan','$pengguna','$norek','$status')");


if (!$tambah) {
    echo"gagal menambah".die(mysqli_error($koneksi));
}else {
   echo"<script>
alert('berhasil menambah data')
document.location.href = 'index.php'
</script>";
}

