

<html>
    <head>
        <title></title>
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
                border: 1px solid #999;
                padding: 8px 35px;
                margin-right: 2px;
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
                            <div class="fill"><p>:</p><p>Kabupaten Klungkung</p></div>
                            <div class="fill"><p>:</p><p>10 april 2023</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
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

        ?>
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

        ?>
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
            </div>
        </div>
    </body>
</html>