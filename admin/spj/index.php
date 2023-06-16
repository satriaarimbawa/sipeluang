<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="text-center" style="color: red;">
<h1> DAFTAR SPJ</h1>
</div>

    <table class=" table tabel">
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
        // $cek = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT DISTINCT angkatan FROM `daftar` "));
        $query = mysqli_query($koneksi,"SELECT * FROM daftar WHERE status IN ('PENDING', 'verify') GROUP BY angkatan DESC");
        while ($dat = mysqli_fetch_assoc($query)) {
            // var_dump($query);
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$dat['angkatan']?></td>
            <td><?=$dat['tglbuat']?></td>
            <td><?=$dat['tempat']?></td>
            <?php
            if ($dat['status'] == 'verify') {
            ?>
            <td><a href="laporan_admin.php?id=<?=$dat['angkatan']?>"><i data-feather="download"></i></a></td>
            <?php
            }else {
            ?>
                <td><a href="laporan_admin.php?page=<?=$dat['angkatan']?>"><i data-feather="eye"></i></a><i data-feather="clock" style="margin-left: 20px;"></i></td>

            <?php
            }
            ?>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>




<?php include "../template/footer.php"; ?>