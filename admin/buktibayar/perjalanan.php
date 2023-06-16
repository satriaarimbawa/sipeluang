<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>
    <!-- Button trigger modal -->

<div class="text-center" style="color: red;">
<h1> BUKTI BAYAR PERJALANAN</h1>
</div>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Upload file
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Perjalanan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
            <label for="formFileSm" class="form-label">Input file</label>
            <input class="form-control form-control-sm" name="file" id="formFileSm" type="file">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" name="perjalanan" class="btn btn-danger">Upload</button>
      </div>
        </form>
    </div>
  </div>
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
$query = mysqli_query($koneksi,"SELECT * FROM bkperjalanan ORDER BY idbkperjalanan desc");
while ($f = mysqli_fetch_assoc($query)) {
?>
      <tr>
        <td><?=$i?></td>
        <td><?=$f['idbkperjalanan']?></td>
        <td><?=$f['nama']?></td>
        <td><a href="download.php?nama=<?=$f['nama']?>"><i data-feather="download"></i></a></td>
      </tr>
<?php
$i++;
}
?>
    </table>
<?php include "../template/footer.php"; ?>