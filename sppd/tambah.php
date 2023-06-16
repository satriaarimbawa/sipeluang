<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="form-sppd container">
<div class="text-center" style="color: #fff; background: red;">
<h1>FORMULIR INPUT DATA</h1>
</div>

<form action="../sppd/prosestambah.php" method="post" class="formulir-sppd">
<label for="">yang memberi perintah</label>
<textarea name="perintah" id="" cols="30" rows="10" class="form-control co1" list="datalistOptions" id="exampleDataList"></textarea><br><br>

<label for="">yang di perintah</label>
<select name="diperintah" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
    <option value=""></option>
    <?php
    include "../koneksi.php";
    $query = mysqli_query($koneksi,"SELECT * FROM petugas");
    while ($pet = mysqli_fetch_assoc($query)) {
    ?>
    <option value="<?=$pet['idpetugas']?>"><?=$pet['nama']?></option>
    <?php
    }
    ?>
</select><br><br>

    <label for="">dari daerah</label>
    <input type="text" name="dari" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
    <label for="">ke</label>
    <label for="">daerah</label>
    <input type="text" name="kedaerah" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
    <label for="">transportasi yang di gunakan</label>
    <input type="text" name="trans" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
    <br><br>
    

    <label for="">dari tgl</label>
    <input type="date" name="tgldari" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
    <label for=""> sampai tgl</label>
    <input type="date" name="sampai" id="" class="form-control co1" list="datalistOptions" id="exampleDataList"><br><br>

    <label for="">maksud mengadakan perjalanan </label>
    <textarea name="tujuan" id="" cols="30" rows="10" value="" class="form-control co1" list="datalistOptions" id="exampleDataList"></textarea><br>

    <label for="">atas beban</label>
    <textarea name="beban" id="" cols="30" rows="10" class="form-control co1" list="datalistOptions" id="exampleDataList"></textarea><br>


    <label for="">pilih rekening</label>
    <select name="anggaran" id="" class="form-control co1" list="datalistOptions" id="exampleDataList">
        <option value=""></option>
        <?php
            $anggaran = mysqli_query($koneksi,"SELECT * FROM kantor ");
            while ($ang = mysqli_fetch_assoc($anggaran)) {
            ?>
                <option value="<?=$ang['idrek']?>"><?=$ang['namarek']?></option>
            <?php
            }
        ?>
    </select>

    <button type="submit" name="insert" class="btn-kwi">NEXT</button>
</form>
</div>

</body>
</html>