<?php
// include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Daftar file yang akan diunggah
    $inputFiles = $_FILES['input_files'];

    // Periksa apakah ada file yang diunggah
    if (isset($inputFiles) && is_array($inputFiles['name'])) {
        // Persiapan pernyataan SQL
        $sql = "INSERT INTO pengadaan (";
        $bindParams = [];
        $placeholders = [];

        // Inisialisasi array untuk menyimpan path file yang diunggah
        $filePaths = [];

        // Membuka koneksi ke database
        include "../koneksi.php";
        

        // Loop melalui setiap file yang diunggah
        for ($i = 0; $i < count($inputFiles['name']); $i++) {
            $fileTmp = $inputFiles['tmp_name'][$i];
            $fileName = $inputFiles['name'][$i];

            // Proses file yang diunggah sesuai kebutuhan Anda
            // Misalnya, pindahkan file ke direktori tujuan
            $destination = "pengadaan/" . $fileName;
            move_uploaded_file($fileTmp, $destination);

            // Tambahkan path file ke array
            $filePaths[] = $destination;

            // Tambahkan nama kolom dan placeholder ke pernyataan SQL
            $columnName = "berkas" . ($i + 1);
            $sql .= $columnName . ",";
            $placeholders[] = "?";

            // Tambahkan jenis data bind ke array bindParams
            $bindParams[] = 's';
        }

        // Hapus koma terakhir dari pernyataan SQL
        $sql = rtrim($sql, ",");

        // Tambahkan bagian akhir pernyataan SQL
        $sql .= ") VALUES (" . implode(',', $placeholders) . ")";

        // Persiapan pernyataan prepared statement
        $stmt = mysqli_prepare($koneksi, $sql);

        // Bind parameter ke statement SQL
        mysqli_stmt_bind_param($stmt, implode('', $bindParams), ...$filePaths);

        // Eksekusi statement SQL
        if (mysqli_stmt_execute($stmt)) {
            echo "File berhasil diunggah dan tersimpan ke database.";
            echo "<br>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }

        // Tutup statement
        mysqli_stmt_close($stmt);

        // Tutup koneksi
        mysqli_close($koneksi);
    }
}
