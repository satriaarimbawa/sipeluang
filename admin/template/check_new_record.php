<?php
header('Content-Type: application/json');

//koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sipetugas";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

//mengambil jumlah record pada database
$sql = "SELECT COUNT(*) AS jumlah_record FROM daftar";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$jumlah_record = $row['jumlah_record'];

//mengecek apakah ada record baru pada database
$record_baru = false;
while(!$record_baru){
  sleep(1); //delay selama 1 detik
  $sql = "SELECT COUNT(*) AS jumlah_record FROM daftar";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if($row['jumlah_record'] > $jumlah_record){
    $record_baru = true;
  }
}

//menutup koneksi ke database
$conn->close();

//mengembalikan response dalam format JSON
$response = array('status' => 'success');
echo json_encode($response);
?>
