<?php
//isi variabel
include "../koneksi.php";

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
$query = mysqli_query($koneksi,"SELECT * FROM arsip where namaberkas = '$nama'");
// var_dump($ekstensifile);
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
document.location.href = 'arsip.php'
</script> ";
return false;
}

$upload = move_uploaded_file($_FILES['file']['tmp_name'],'../arsip/'.$nama);

if ($upload) {

$tambah = mysqli_query($koneksi,"INSERT INTO `arsip`(`idarsip`, `namaberkas`) VALUES (null,'$nama')");

if (!$tambah) {
    echo "gagal melakukan tambah data". mysqli_error($koneksi);
    die;

} else {
    echo"<script>
    alert('berkas berhasil di upload');
document.location.href = 'arsip.php'
</script> ";
// header('Location: index.php');

}
}

