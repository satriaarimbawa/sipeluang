<?php
// include "../koneksi.php";

$koneksi = mysqli_connect('localhost','root','','sipetugas');

if(isset($_GET['id'])) {
    // Ambil ID file dari parameter URL
    $fileId = $_GET['id'];

    // Daftar kolom yang berisi nama file
    $fileColumns = ['berkas1', 'berkas2', 'berkas3', 'berkas4', 'berkas5', 'berkas6', 'berkas7', 'berkas8'];

    // Mencari nama file berdasarkan ID file dan kolom yang berisi data
    $fileName = null;
    foreach($fileColumns as $column) {
        $query = "SELECT $column FROM pengadaan WHERE idpengadaan = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("i", $fileId);
        $stmt->execute();
        $result = $stmt->get_result();
        $fileData = $result->fetch_assoc();
        $stmt->close();

        if($fileData && !empty($fileData[$column])) {
            $fileName = $fileData[$column];
            break;
        }
    }

    if($fileName) {
        // Mendefinisikan header untuk mengirim file ke browser
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . $fileName . "\"");

        // Mendapatkan path file dari database
        $filePath = "pengadaan/" . $fileName;

        // Membaca file dan mengirimkan isinya ke browser
        readfile($filePath);
    }
    else {
        echo "File tidak ditemukan.";
    }
}
?>
