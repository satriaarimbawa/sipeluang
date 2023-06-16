
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>peserta</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/admin.css">

        <style>
            .kop_gen{
                display: flex;
                padding: 1%;
            }
            .kop_right{
                margin-right: 5%;
            }
            .con_down{
                display: flex;
            }
            .tab_down tr{
                padding-left: 50%;
            }
            table, th, td{
                border-collapse: collapse;
                margin-left: 5%;
                border: 1px solid #999;
                padding: 8px 35px;
            }
            .fill{
                display: flex;
            }
        </style>
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

            if ($query1['st atus'] == 'pending') {

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
        <div> <!--general -->
            <div class="kop_gen"><!--kop -->
                <div class="kop_right"><!--kanan -->
                    <p>DAFTAR</p>
                </div>
                <div class="kop_left"><!--kiri -->
                    <div class="con_up">
                        <div class="fill"><p>:</p><p>penerimaan perjalanan dinas dalam kota dalam rangka pelaksanaan pengawalan</p></div>
                    </div>
                    <div class="con_down">
                        <div class="down_right">
                            <p>Ke      </p>
                            <p style="padding-top: 16px;">Tanggal </p>
                        </div>
                        <div class="down_left">
                            <div class="fill"><p>:</p><p><?=strtoupper($query1['tempat'])?></p></div>
                            <div class="fill"><p>:</p><p><?=$tgl?></p></div>
                        </div>
                    </div>
                </div>
            </div>
                <table>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Gol</td>
                        <td>No.Rekening</td>
                        <td>Jumlah Terima</td>
                        <td>TTD</td>
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
            <?php
            $i++;
            $sum = $daf['jumlahterima']*$i;
            ?>
            <td colspan="4">Jumlah</td>
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

        <tr>
            <?php
            $sum = $daf['jumlahterima']*$i;
            $i++;
            }
            ?>
            <td colspan="4">Jumlah</td>
            <td><?=number_format($sum)?></td>
        </tr>
        <?php    
        }
        }
    
        ?>
    </table>  


    <?php
    if (@$_GET[''] ) {
        echo"haloo";
    } elseif (@$_GET['page']) {
    ?>
    <!-- Button trigger modal -->
    <br>
<button type="button" class="btn-bar" data-bs-toggle="modal" data-bs-target="#exampleModal">
  catatan
</button>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">catatan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses.php" method="post">
            <input type="hidden" name="id" value="<?=$_GET['page']?>">
            <textarea name="note" id="" cols="30" rows="10"></textarea>            
            <div class="modal-footer">
              <button type="submit" name="cancel" class="btn btn-secondary" data-bs-dismiss="modal">simpan</button>
              <button type="submit" name="komen" class="btn-bar">kembalikan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div> 
    <?php
    } else {
    ?>  
        <form action="" method="get">
            <input class="btn-bar" style="margin-top: 20px;" type="submit" name="submit" value="submit" onclick="return confirm('yakin mengajukan berkas')">
        </form>
    <?php
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>