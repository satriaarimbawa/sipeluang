<?php
include "../koneksi.php";
$query = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM sppd where idsppd = '$_GET[id]'"));
$pet = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM petugas INNER JOIN sppd ON petugas.idpetugas = sppd.idpetugas WHERE idsppd = '$_GET[id]'"));
$ang = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kantor INNER JOIN sppd ON kantor.idrek = sppd.anggaran WHERE idsppd = '$_GET[id]'"));
            $key = 'saTpoLpp';
            $iv = 'pEmeRinThpEmeRin';
            $rek = openssl_decrypt($pet['nip'], 'AES-256-CBC', $key, 0, $iv); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/admin.css">
    <title>Document</title>

</head>
<body onload="window.print()">
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
</body>
</html>

<html>
    <head>
        <title></title>
        <style>
            p{
                margin-block-end: 0em;
                margin-block-start: 0em;
            }
            .per{
                display: -webkit-inline-box;
            }
            table, th, td{
                border-collapse: collapse;
                margin-left: 5%;
                border: 1px solid #999;
                padding: 10px 20px;
            }
            .tgl{
                width: 60px;
            }
            .ket{
                margin: 20px;
                text-align:left; 
                text-indent:80px;
            }
            .jud_1{
                margin-bottom: 20px;
                text-align:left; 
                text-indent:100px;
            }
            .cel{
                padding: 50px;
                text-align: left;
            }
            .jud_2{
                margin-bottom: 20px;
                margin-top: 20px;
                text-align:left; 
                text-indent:100px;
            }
            .tabel{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div>
            <div class="ket">
                <p>Keterangan :</p>
            </div>
            <div>
                <div class="jud_1">
                    <p>1. Dari Pejabat Pemberi Perintah Jalan</p>
                </div>
                <div >
                    <table class="tabel">
                        <tr>
                            <td rowspan="2">
                                <p class="per">tempat kedudukan pegawai yang diberikan perintah</p>
                            </td>
                            <td colspan="2">
                                <p>berangkat</p>
                            </td>
                            <td colspan="2">
                                <p>kembali</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="tgl">tgl</p>
                            </td>
                            <td>
                                <p>ttd</p>
                            </td>
                            <td>
                                <p class="tgl">tgl</p>
                            </td>
                            <td>
                                <p>ttd</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Denpasar</p>
                            </td>
                            <td>
                                <p>6-7-2023</p>
                            </td>
                            <td class="cel">
                                <p>a.n kepala satuan polisi pamong praja provinsi bali</p>
                                <p>sekretaris</p><br><br><br>
                                <u>nama</u>
                                <p>Pembina TK I</p>
                                <p>NIP</p>
                            </td>
                            <td>
                                <p>6-7-2023</p>
                            </td>
                            <td class="cel">
                                <p>a.n kepala satuan polisi pamong praja provinsi bali</p>
                                <p>sekretaris</p><br><br><br>
                                <u>nama</u>
                                <p>Pembina TK I</p>
                                <p>NIP</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div>
                <div class="jud_2">
                    <p>2. Dari Pejabat Pemberi Perintah Jalan</p>
                </div>
                <div>
                    <table class="tabel">
                        <tr>
                            <td rowspan="2">
                                <p class="per">tempat kedudukan pegawai yang diberikan perintah</p>
                            </td>
                            <td colspan="2">
                                <p>berangkat</p>
                            </td>
                            <td colspan="2">
                                <p>kembali</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="tgl">tgl</p>
                            </td>
                            <td>
                                <p>ttd</p>
                            </td>
                            <td>
                                <p class="tgl">tgl</p>
                            </td>
                            <td>
                                <p>ttd</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Denpasar</p>
                            </td>
                            <td>
                                <p>6-7-2023</p>
                            </td>
                            <td class="cel">
                                <p>a.n kepala satuan polisi pamong praja provinsi bali</p>
                                <p>sekretaris</p><br><br><br>
                                <u>nama</u>
                                <p>Pembina TK I</p>
                                <p>NIP</p>
                            </td>
                            <td>
                                <p>6-7-2023</p>
                            </td>
                            <td class="cel">
                                <p>a.n kepala satuan polisi pamong praja provinsi bali</p>
                                <p>sekretaris</p><br><br><br>
                                <u>nama</u>
                                <p>Pembina TK I</p>
                                <p>NIP</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>