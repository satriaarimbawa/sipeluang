<?php
include "../template/header.php";
include "../template/navbar.php";
?>
    <div class="text-center" style="color: red;">
        <h1> DAFTAR SPPD</h1>
    </div>

    <a href="tambah.php" class="btn-kwi">tambah</a>

    <div class="wrap">
    <table border="1" class="tabel">
        <tr>
            <th>no</th>
            <th>id</th>
            <th>tgl</th>
            <th>tempat</th>
            <th>aksi</th>
        </tr>
        <?php
        include "../koneksi.php";
        $i = 1;
        // $cek = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT DISTINCT angkatan FROM `daftar` "));
        $query = mysqli_query($koneksi,"SELECT * FROM sppd ORDER BY idsppd desc");
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
            <td><a href="../admin/sppd/laporan_sppd.php?page=<?=$dat['idsppd']?>"><i data-feather="download"></i></a></td>
            <?php
            }elseif ($dat['status'] == 'ditolak') {
            $cek = mysqli_query($koneksi,"SELECT * FROM sppd where idsppd ='$dat[idsppd]'");
            $ck = mysqli_num_rows($cek);
            ?>
            <td><a href="update.php?page=<?=$dat['angkatan']?>&banyak=<?=$ck?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></a></td>
            <?php
            } else {
            ?>
                <td><i data-feather="clock"></i></td>
            <?php
            }
            ?>
        </tr>
        <?php
        $i++;
        // var_dump($query);
        }
        ?>
    </table>
    </div>
<?php include "../template/footer.php"; ?>