<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>
    <!-- Button trigger modal -->

<div class="text-center" style="color: red;">
<h1> BUKTI BAYAR PENGADAAN</h1>
</div>

    <!-- <Form Action="proses.php" Method="Post" Enctype="Multipart/Form-Data">
        <B>Upload File :</B>
        <Input Type="File" Name="file">
        <Button Type="Submit">Upload File</Button>
    </Form> -->

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
$query = mysqli_query($koneksi,"SELECT * FROM buktipengadaan ORDER BY idbkpengadaan desc");
while ($f = mysqli_fetch_assoc($query)) {
?>
      <tr>
        <td><?=$i?></td>
        <td><?=$f['idbkpengadaan']?></td>
        <td><?=$f['nama']?></td>
        <td><a href="downloadpe.php?nama=<?=$f['nama']?>"><i data-feather="download"></i></a></td>
      </tr>
<?php
$i++;
}
?>
    </table>
<?php include "../template/footer.php"; ?>