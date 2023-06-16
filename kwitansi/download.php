<?php

$file = $_GET['nama'];
$path = '../arsip/';

if (file_exists($path . $file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $file . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($path . $file));
    readfile($path . $file);
    exit;
}