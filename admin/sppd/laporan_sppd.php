<?php
include "../koneksi.php";
if (isset($_GET['id'])) {
$query = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM sppd where idsppd = '$_GET[id]'"));
$pet = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM petugas INNER JOIN sppd ON petugas.idpetugas = sppd.idpetugas WHERE idsppd = '$_GET[id]'"));
$ang = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kantor INNER JOIN sppd ON kantor.idrek = sppd.anggaran WHERE idsppd = '$_GET[id]'"));
            $key = 'saTpoLpp';
            $iv = 'pEmeRinThpEmeRin';
            $rek = openssl_decrypt($pet['nip'], 'AES-256-CBC', $key, 0, $iv); 
}else {
$query = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM sppd where idsppd = '$_GET[page]'"));
$pet = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM petugas INNER JOIN sppd ON petugas.idpetugas = sppd.idpetugas WHERE idsppd = '$_GET[page]'"));
$ang = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kantor INNER JOIN sppd ON kantor.idrek = sppd.anggaran WHERE idsppd = '$_GET[page]'"));
            $key = 'saTpoLpp';
            $iv = 'pEmeRinThpEmeRin';
            $rek = openssl_decrypt($pet['nip'], 'AES-256-CBC', $key, 0, $iv); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/admin.css">

</head>
<?php
if (isset($_GET['id'])) {
    echo"<body>";

}else {
    echo"<body onload='window.print()'>";
}
?>
<div class="kop">
    <img src="../../img/kop.jpeg" alt="" style="width: 100%; margin:0px;">   
</div>
<hr>
<br>
<table align="right">
    <tr>
        <td>nomor</td>
        <td>:</td>
        <td>B.36.091/1550/Bid.II/Sat.Pol.PP</td>
    </tr>
    <tr>
        <td>Lembar ke</td>
        <td>:</td>
    </tr>
</table>
<br>
<br>
<br>
<h1 align="center"><b>SURAT PERINTAH PERJALANAN DINAS</b></h1>
<b><hr width="50%" ></b> 
<h1 align="center"><b>(S P P D)</b></h1>
<hr>
<hr>
<table>
    <tr>
        <td>1.</td>
        <td>pejabat yang  memberi perintah</td>
        <td>:</td>
        <td><?=$query['perintah']?></td>
    </tr>
</table>

<hr>
<table>
    <tr>
        <td>2.</td>
        <td>Nama/Nip Pegawai Yang diperintah mengadakan perjalanan</td>
        <td>:</td>
        <td>
            <?=$pet['nama']?><br>
            <?=$rek?>
        </td>
    </tr>
</table>

<hr>
<table>
    <tr>
        <td>3.</td>
        <td>jabatan,pangkat dan golongan dari pegawai yang di perintah</td>
        <td>:</td>
        <td><?=$pet['jabatan']?></td>
    </tr>
</table>
<hr>

<table>
    <tr width="50%">
        <td>4.perjalanan dinas yang di perintahkan</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>dari</td>
        <td>:</td>
        <td><?=$query['daritem']?></td>
    </tr>
    <tr>
        <td>ke</td>
        <td>:</td>
        <td><?=$query['ketem']?></td>
    </tr>
    <tr>
        <td>transportasi yang dgunakan </td>
        <td>:</td>
        <td><?=$query['transportasi']?></td>
    </tr>
</table>
<hr>

<table>
    <tr>
        <td>5.</td>
        <td>perjalanan dinas direncanakan</td>
        <td>:</td>
        <td>
            dari tanggal <?=$query['dari']?> sampai tanggal
            <?=$query['sampai']?>
        </td>
    </tr>
</table>
<hr>

<table>
    <tr>
        <td>6.</td>
        <td>maksud mengadakan perjalanan</td>
        <td>:</td>
        <td><?=$query['tujuan']?></td>
    </tr>
</table>
<hr>

<table>
    <tr>
        <td>7.</td>
        <td>perhitungan biaya perjalanan</td>
        <td>:</td>
        <td>
            atas beban :<?=$query['beban']?><br>

            pasal anggaran:<?=$ang['norek']?>
        </td>
    </tr>
</table>
<hr>

<table>
    <tr>
        <td>8.</td>
        <td>keterangan</td>
        <td>:</td>
        <td>Lihat sebelah</td>
    </tr>
</table>
<hr>

<h4 align="right" style="margin-right: 18%;"><?='Bali,'.date('d M Y')?></h4>
<table align="right" style="margin-right: 10%;">
    <tr>
        <td>a.n KEPALA SATUAN SEKRETARIAT</td>
    </tr>
</table>
<br><br><br><br>
<table align="right" style="margin-right: 6%;">
    <tr>
        <td><u>I GUSTI AGUNG NGURAH PARTAMA,S.IP.,M.Si</u></td>
    </tr>
    <tr>
        <td>jabatan</td>
    </tr>
    <tr>
        <td>NIP </td>
    </tr>
</table>

<?php
if (@$_GET[''] ) {
    echo"haloo";
} elseif (@$_GET['id']) {
?>
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses.php" method="post">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <textarea name="note" id="" cols="30" rows="10"></textarea>            
            <div class="modal-footer">
              <button type="submit" name="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="komen" class="btn btn-primary">Save changes</button>
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
            <input type="submit" name="submit" value="submit" onclick="return confirm('yakin mengajukan berkas')">
        </form>
    <?php
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>
</html>