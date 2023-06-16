<?php
$session_id = $_COOKIE["session_id"];
session_id($session_id);
session_start();

if (!isset($_SESSION['username'])== '') {
    if (!isset($_SESSION['level']) == 'admin') {
    echo "<script>
    alert('karyawan');
    document.location.href = '../admin/index.php'
    </script>";
    }
}else {
        echo "<script>
    alert('silahkan melakukan login dahulu ');
    document.location.href = '../login/index.php'
    </script>";


}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIPELUANG</title>

    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/general2.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>


</head>

<body id="page-top">

