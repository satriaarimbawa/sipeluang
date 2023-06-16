<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
</head>
<?php
include "../koneksi.php";
$update = mysqli_query($koneksi,"SELECT * FROM sppd WHERE idsppd = $_GET[id]");
$dat = mysqli_fetch_assoc($update);
?>
<body>
    <form action="../sppd/prosestambah.php" method="post">
        <input type="hidden" name="id" value="<?=$dat['idsppd']?>">
    <label for="">yang memberi perintah</label>
<textarea name="perintah" id="" cols="30" rows="10"><?=$dat['perintah']?></textarea><br><br>

<label for="">yang di perintah</label>
<select name="diperintah" id="">
    <option value=""></option>
    <?php
    include "../koneksi.php";
    $query = mysqli_query($koneksi,"SELECT * FROM petugas");
    while ($pet = mysqli_fetch_assoc($query)) {
    ?>
    <option value="<?=$pet['idpetugas']?>"
    <?php
    $q = mysqli_query($koneksi,"SELECT idpetugas FROM sppd where idsppd = '$_GET[id]'");

    if (mysqli_num_rows($q) > 0) {
    ?>
    selected
    <?php
    }
    ?>
    ><?=$pet['nama']?></option>
    <?php
    }
    ?>
</select><br><br>

    <label for="">dari daerah</label>
    <input type="text" name="dari" id="" value="<?=$dat['daritem']?>">
    <label for="">ke</label>
    <label for="">daerah</label>
    <input type="text" name="kedaerah" id="" value="<?=$dat['ketem']?>">
    <label for="">transportasi yang di gunakan</label>
    <input type="text" name="trans" id="" value="<?=$dat['transportasi']?>">
    <br><br>
    

    <label for="">dari tgl</label>
    <input type="date" name="tgldari" id="" value="<?=$dat['dari']?>">
    <label for=""> sampai tgl</label>
    <input type="date" name="sampai" id="" value="<?=$dat['sampai']?>"><br><br>

    <label for="">maksud mengadakan perjalanan </label>
    <textarea name="tujuan" id="" cols="30" rows="10" value=""><?=$dat['tujuan']?></textarea><br>

    <label for="">atas beban</label>
    <textarea name="beban" id="" cols="30" rows="10"><?=$dat['beban']?></textarea><br>


    <label for="">pilih rekening</label>
    <select name="anggaran" id="">
        <option value=""></option>
        <?php
            $anggaran = mysqli_query($koneksi,"SELECT * FROM kantor ");
            while ($ang = mysqli_fetch_assoc($anggaran)) {
            ?>
                <option value="<?=$ang['idrek']?>"
                <?php
                $q = mysqli_query($koneksi,"SELECT anggaran FROM sppd where idsppd = '$_GET[id]'");

                if (mysqli_num_rows($q) > 0) {
                ?>
                selected
                <?php
                }
                ?>
                ><?=$ang['namarek']?></option>
            <?php
            }
        ?>
    </select>

    <button type="submit" name="update">submit</button>

    
</form>

</body>
</html>


