<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/general.css">
    <title>Document</title>
</head>
<body>
    
    <div class="d-grid" style="margin-left: 5%; margin-right: 5%; margin-top:20px;">
    <div class="text-center" style="color: #fff; background: red; text-align:center;">
    <h1>FORMULIR TAMBAH PETUGAS</h1>
    </div>
    <form action="proses.php" method="post" style="background-color: white; padding:10px;">
        <label for="">Nama petugas</label>
        <input type="text" name="nama" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
        <label for="">Nip</label>
        <input type="text" name="nip" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
        <label for="">no rek</label>
        <input type="text" name="norek" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
        <label for="">no telp</label>
        <input type="text" name="telp" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
        <label for="golonga">golongan</label>
        <select name="gol" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
            <option value=""></option>
            <?php
            include "../koneksi.php";
            $query = mysqli_query($koneksi,"SELECT * FROM gol");
            while ($g = mysqli_fetch_assoc($query)) {
            ?>
            <option value="<?=$g['idgol']?>"><?=$g['golongan']?></option>
            <?php
            }
            ?>
        </select>
        <label for="">jabatan</label>
        <input type="text" name="jabatan" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">

        <input type="submit" name="simpan" value="simpan" class="btn-kwi">
    </form>
</div>
</body>
</html>