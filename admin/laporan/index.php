<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>
    <!-- Button trigger modal -->

<div class="text-center" style="color: red;">
<h1> LAPORAN</h1>
</div>

    <table class="tabel container">
      <tr>
        <th>no</th>
        <th>id</th>
        <th>nama file</th>
        <th>aksi</th>
      </tr>
<?php
include "../koneksi.php";
$i= 1;
$query = mysqli_query($koneksi,"SELECT * FROM berkaslap ORDER BY idlaporan desc");
while ($f = mysqli_fetch_assoc($query)) {
?>
      <tr>
        <td><?=$i?></td>
        <td><?=$f['idlaporan']?></td>
        <td><?=$f['nama']?></td>
        <td><a href="download.php?nama=<?=$f['nama']?>"><i data-feather="download"></i></a></td>
      </tr>
<?php
$i++;
}
?>
    </table>
<?php include "../template/footer.php"; ?>