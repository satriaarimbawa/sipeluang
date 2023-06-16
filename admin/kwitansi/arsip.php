<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Upload file
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Berkas Arsip</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="prosesarsip.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
            <label for="formFileSm" class="form-label">Input Berkas</label>
            <input class="form-control form-control-sm" name="file" id="formFileSm" type="file">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn-kwi">Upload</button>
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

<div class="text-center" style="color: red;">
<h1> DAFTAR ARSIP</h1>
</div>

    <table class="tabel">
      <tr>
        <th>no</th>
        <th>nama file</th>
        <th>aksi</th>
      </tr>
<?php
include "../koneksi.php";
$i= 1;
$query = mysqli_query($koneksi,"SELECT * FROM arsip ORDER BY idarsip desc");
while ($f = mysqli_fetch_assoc($query)) {
?>
      <tr>
        <td><?=$i?></td>
        <td><?=$f['namaberkas']?></td>
        <td><a href="download.php?namaberkas=<?=$f['namaberkas']?>"><i data-feather="download"></i></a></td>
      </tr>
<?php
$i++;
}
?>
    </table>
<?php include "../template/footer.php"; ?>