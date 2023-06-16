
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


</head>
<?php

    include "../koneksi.php";

if (@$_GET['id']) {
    $query1 = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM daftar WHERE iddaf = '$_GET[id]'"));
    // $tempat = mysqli_fetch_assoc($query);
    $i = 1;
    $tgl = date('d-m-Y');
}else {
        $query1 = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM daftar ORDER BY angkatan DESC LIMIT 1"));
    // $tempat = mysqli_fetch_assoc($query);
    $i = 1;
    $tgl = date('d-m-Y');
    if (isset($_GET['submit'])) {
    $query = mysqli_query($koneksi,"UPDATE daftar SET status='PENDING' WHERE angkatan ='$query1[angkatan]'");

    if (!$query) {
        echo"query anda gagal";
        die;
    }else {
echo"<script>
        alert('dokumen sudah di ajukan');
        document.location.href = 'index.php'
    </script>";
    }

    }


}
    ?>
<?php
if (!isset($_GET['id'])) {
    echo"<body>";

}else {
    echo"<body onload='window.print()'>";
}
?>
    <table>
        <tr>
            <td><b>DAFTAR</b></td>
            <td><b>:</b></td>
            <td><b>PENERIMAAN PERJALANAN DINAS KOTA DALAM RANGKA PELAKSAAN PENGAWAL</b></td>
            <tr><b>           
            <td>KE</td>
            <td>:</td>
            <td><b><?=strtoupper($query1['tempat'])?></b></td>
            </b>
            </tr>
            <tr>
            <td><b>TANGGAL</b></td> 
            <td>:</td>
            <td><b><?=$tgl?></b></td>
            </tr>

        </tr>
    </table>


    <table border="1" class="table table-bordered">
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>gol</th>
            <th>no.rekening</th>
            <th>jumlah terima</th>
            <th>tanda tangan</th>
        </tr>
        <?php
        if (isset($_GET['id'])) {
            $query = mysqli_query($koneksi,"SELECT * FROM daftar WHERE angkatan = '$_GET[id]'");
            $daf = mysqli_fetch_assoc($query);
            $querypet = mysqli_query($koneksi,"SELECT * FROM petugas INNER JOIN  daftar ON petugas.idpetugas = daftar.idpetugas where angkatan = '$daf[angkatan]'");
            while ($pet = mysqli_fetch_assoc($querypet)) {
            $querygol = mysqli_query($koneksi,"SELECT * FROM gol where idgol = '$pet[gol]'");
            $gol = mysqli_fetch_assoc($querygol);
            $key = 'saTpoLpp';
            $iv = 'pEmeRinThpEmeRin';
            $rek = openssl_decrypt($pet['norek'], 'AES-256-CBC', $key, 0, $iv);   
            ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$pet['nama']?></td>
            <td><?=$gol['golongan']?></td>
            <td><?=$rek?></td>
            <td><?=$daf['jumlahterima']?></td>
            <td></td>
        </tr>
            <?php
            $i++;
            }
        ?>

        <tr>
            <td>jumlah</td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            $i++;
            ?>
            <?php
            $sum = $daf['jumlahterima']*$i;
            ?>
            <td><?=number_format($sum)?></td>
        </tr>
        <?php
        } else {
            $query = mysqli_query($koneksi,"SELECT * FROM daftar ORDER BY angkatan DESC LIMIT 1");
            while ($daf = mysqli_fetch_assoc($query)) {
                $querypet = mysqli_query($koneksi,"SELECT * FROM petugas INNER JOIN  daftar ON petugas.idpetugas = daftar.idpetugas where angkatan = '$daf[angkatan]'");
                while ($pet = mysqli_fetch_assoc($querypet)) {
                $querygol = mysqli_query($koneksi,"SELECT * FROM gol where idgol = '$pet[gol]'");
                $gol = mysqli_fetch_assoc($querygol);
                $key = 'saTpoLpp';
                $iv = 'pEmeRinThpEmeRin';
                $rek = openssl_decrypt($pet['norek'], 'AES-256-CBC', $key, 0, $iv);   
                ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$pet['nama']?></td>
                <td><?=$gol['golongan']?></td>
                <td><?=$rek?></td>
                <td><?=$daf['jumlahterima']?></td>
                <td></td>
            </tr>
                <?php
                $i++;
                }
            ?>
    
            <tr>
                <td>jumlah</td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                $i++;
                ?>
                <?php
                $sum = $daf['jumlahterima']*$i;
                }
                ?>
                <td><?=number_format($sum)?></td>
            </tr>
<?php    
        }
?>
 
    </table>
    
    <form action="prosesdafatar.php" method="post">
        <input type="hidden" name="id" value="<?=$daf['iddaf']?>">
        <input type="submit" name="submit" value="submit" onclick="return confirm('yakin mengajukan berkas')">
    </form>

</body>
</html>