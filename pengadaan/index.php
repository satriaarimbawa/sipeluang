<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>
    <!-- Button trigger modal -->

<div class="text-center" style="color: red;">
<h1> DATA PENGADAAN</h1>
</div>

<button type="button" class="btn-kwi" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Upload file
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Berkas Pengadaan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses.php" method="post" enctype="multipart/form-data">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jumlah" id="exampleRadios1" value="< 5.000.000,00" checked>
                <label class="form-check-label" for="exampleRadios1">
                  < 5.000.000,00
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input " type="radio" name="jumlah" id="exampleRadios2" value=" 2.000.000,00">
                <label class="form-check-label" for="exampleRadios2">
                  5.000.000,00
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input " type="radio" name="jumlah" id="exampleRadios3" value="> 5.000.000,00">
                <label class="form-check-label" for="exampleRadios3">
                  > 5.000.000
                </label>
              </div>
              <div id="form-container">
                <div id="input-container" class="input-group">
                <input type="file" class="form-control" name="input_files[]" aria-label="Upload" multiple>
                <!-- <button class="btn btn-outline-secondary" type="button" onclick="removeInput(1)" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg></button> -->
              </div>
              </div>
              <button type="button" onclick="addInput()" class="btn-kwi">Tambah Input</button>

          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class=" btn-kwi">Upload</button>
      </div>
        </form>
    </div>
  </div>
</div>



<script src="script.js"></script>



    <table class=" tabel">
      <tr>
        <th>no</th>
        <th>nama file</th>
        <th>aksi</th>
      </tr>
<?php
include "../koneksi.php";
$i= 1;
$query = mysqli_query($koneksi,"SELECT * FROM pengadaan ORDER BY idpengadaan desc");
while ($f = mysqli_fetch_assoc($query)) {
?>
      <tr>
        <td><?=$i?></td>
        <td><?=$f['berkas1']?></td>
        <td><a href="download.php?id=<?=$f['idpengadaan']?>"><i data-feather="download"></i></a></td>
      </tr>
<?php
$i++;
}
?>
    </table>
<?php include "../template/footer.php"; ?>