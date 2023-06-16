<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
<?php include "../template/header.php" ?>    
<?php include "../template/navbar.php" ?>    

<div class="text-center" style="color: red;">
<h1> DAFTAR SPPD</h1>
</div>

    <table border="1" class="table tabel">
        <tr>
            <th>no</th>
            <th>id</th>
            <th>tgl</th>
            <th>tempat</th>
            <th>aksi</th>
        </tr>
        <?php
        include "../../koneksi.php";
        $i = 1;
        $query = mysqli_query($koneksi,"SELECT * FROM sppd WHERE status IN ('PENDING','verify') ORDER BY idsppd desc");
        while ($dat = mysqli_fetch_assoc($query)) {
            $ang = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kantor INNER JOIN sppd ON kantor.idrek = sppd.anggaran where idsppd = '$dat[idsppd]'"));
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$dat['perintah']?></td>
            <td><?=$dat['tujuan']?></td>
            <td><?=$ang['norek']?></td>
            <?php
            if ($dat['status'] == 'verify') {
            ?>
            <td><a href="laporan_sppd.php?page=<?=$dat['idsppd']?>"><i data-feather="download"></i></a></td>
            <?php
            }else {
            ?>
                <td><a href="laporan_sppd.php?id=<?=$dat['idsppd']?>"><i data-feather="eye"></i></a><i data-feather="clock" style="margin-left: 20px;"></i></td>

            <?php
            }
            ?>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>

<?php include "../template/footer.php" ?>    


<!-- </body>
</html> -->