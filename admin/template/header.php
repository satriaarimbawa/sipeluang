<?php
$session_id = $_COOKIE["session_id"];
session_id($session_id);
session_start();

if (isset($_SESSION['username']) == '') {
    if (!isset($_SESSION['level']) == 'admin') {
        echo "<script>
    alert('karyawan');
    document.location.href = '../../index.php'
</script>";
    }
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

    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" />
<link rel="stylesheet" href="../../css/admin.css">
<link rel="stylesheet" href="../../css/admin2.css">

	<script>
		$(document).ready(function(){
			function checkNewRecord(){
				$.ajax({
					url: '../template/check_new_record.php',
					dataType: 'json',
					success: function(response){
						if(response.status == 'success'){
                                $(document).ready(function() {
                                setTimeout(function() {
                                    alertify.alert('ada pengajuan data baru ');
                                }, 10000);
                                });
						}
						checkNewRecord(); //rekursif untuk memeriksa kembali
					},
					error: function(){
						checkNewRecord(); //rekursif untuk memeriksa kembali
					}
				});
			}

			//memanggil fungsi checkNewRecord saat dokumen siap
			checkNewRecord();
		});
        setInterval(function(){
    location.reload();
}, 300000);
	</script>
</head>

<body id="page-top">

