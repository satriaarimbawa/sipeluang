<?php 
session_start();

include "../koneksi.php";
$kwit = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kwitansi WHERE idkwit = '$_GET[id]'"));
$idpet = $kwit['penerima'];
$pet = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM petugas where idpetugas = '$idpet'"));
$norek = $kwit['rek'];
$rek = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kantor where idrek = '$norek'"));
            $key = 'saTpoLpp';
            $iv = 'pEmeRinThpEmeRin';
            $nip = openssl_decrypt($pet['norek'], 'AES-256-CBC', $key, 0, $iv);  
?>
<html>
    <head>
        <title></title>
        <style>
            .kas{
                border: 2px solid black;
                width: 35%;
                padding-left: 10px;
                margin-left: 10px;
            }
            .dis{
                display: flex;
            }
            p u{
                margin-left: 10px;
            }
            .rek{
                border: 2px solid black;
                width: 35%;
                margin-left: 50px;
                padding: 10px;
            }
            .yy{
                display: flex;
                width: 20%;
                padding-top: 30px;
                margin-left: 30px;
            }
            .dev{
                display: flex;
                margin: 50px;
            }
            .jud{
                text-align: center;
                margin-top: 50px;
            }
            table, th, td{
                padding: 8px 20px;
            }
            .cel_1{
                width: 24%;
            }
            .cel_2{
                width: 5%;
            }
            .cel_3{
                width: auto;
            }
            .tabel{
                margin-left: 70px;
                margin-right: 70px;
            }
            .terbilang{
                height: 50px;
                width: auto; 
                background: #c0c0c0;
                -webkit-transform: skew(-20deg); 
                -moz-transform: skew(-20deg); 
                -o-transform: skew(-20deg);
                transform: skew(-20deg);
            }
            .t_5_1{
                width: 65%;
            }
            .t_1{
                width: 100%;
            }
            .angka{
                width: 30%;
            }
            hr{
                width: 40%;
                margin-left: 30px;
            }
            .gar{
                width: 100%;
                margin-left: 0px;
            }
            .jum{
                margin: 50px;
            }
        </style>
    </head>
    <body onclick="window.print()">
        <div class="dev">
            <div class="kas">
                <div class="dis">
                    <p>Kaspos No :</p> <p></p>
                </div>
                <hr class="gar" align="left">
                <div class="dis">
                    <p>Tanggal :</p><p><?=$kwit['tglkwit']?></p>
                </div>
            </div>
            <div class="rek">
                <p>Kode Rekening :</p><p><?= $rek['norek']?></p>
            </div>
            <div class="yy">
                <p>Tahun</p><p>2023</p>
            </div>
        </div>
        <div class="jud">
            <h1>
                KWITANSI
            </h1>
        </div>
        <div class="tabel">
            <table align="center">
                <tr>
                    <td class="cel_1">
                        Sudah Terima Dari
                    </td>
                    <td class="cel_2">
                        :
                    </td>
                    <td class="cel_3">
                        <?=$kwit['pemberi']?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Banyaknya
                    </td>
                    <td>
                        :
                    </td>
                    <td class="terbilang">
                        <?=$kwit['banyak']?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Untuk Pembayaran
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?= $kwit['ket']?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="jum">
            <table>
                <hr align="left">
                <tr >
                    <td>
                        Terbilang
                    </td>
                    <td>
                        Rp
                    </td>
                    <td class="terbilang angka" >
                        <?=$kwit['nom']?>
                    </td>
                </tr>
            </table>
            <hr align="left">
        </div>
        <div>
            <table class="t_5 t_1">
                <tr class="ttd">
                    <td class="t_5_1">
                        
                    </td>
                    <td>
                        <div class="dis">
                            <p>Bali,</p><p><?=$kwit['tgltrans']?></p>
                        </div>
                        <p>Yang Menerima dan membagikan</p><br><br><br>
                        <u><?=$pet['nama']?></u>
                        <p>NIP.<?=$nip?></p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>