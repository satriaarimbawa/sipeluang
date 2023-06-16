<?php include "../template/header.php" ?>
<?php include "../template/navbar.php" ?>

<button class="btn-new btn"> <a href="insert.php">tambah data</a> </button>

<?php
include "../../koneksi.php";
$i=1;
$query = mysqli_query($koneksi,"SELECT * FROM petugas")

?>

<div class="text-center" style="color: red;">
<h1> DAFTAR PETUGAS</h1>
</div>

        <table class="table tabel" width="12">
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>nip</th>
                <th>norek</th>
                <th>telp</th>
                <th>golongan</th>
                <th>jabatan</th>
                <th>aksi</th>
            </tr>
            <?php
            $key = 'saTpoLpp';
            $iv = 'pEmeRinThpEmeRin';
            while ($pet = mysqli_fetch_assoc($query)) {
            $rek = openssl_decrypt($pet['nip'], 'AES-256-CBC', $key, 0, $iv);   
            $nip = openssl_decrypt($pet['norek'], 'AES-256-CBC', $key, 0, $iv);   
            $telp = openssl_decrypt($pet['telp'], 'AES-256-CBC', $key, 0, $iv);   
            $gol = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT *  FROM gol INNER JOIN petugas ON petugas.gol = gol.idgol where idpetugas = '$pet[idpetugas]'"));
            ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$pet['nama']?></td>
                <td><?=$rek?></td>
                <td><?=$nip?></td>
                <td><?=$telp?></td>
                <td><?=$gol['golongan']?></td>
                <td><?=$pet['jabatan']?></td>
                <td><i data-feather="edit"></td>
            </tr>
            <?php
            $i++;
            }
            ?>

        </table>




<?php include "../template/footer.php" ?>