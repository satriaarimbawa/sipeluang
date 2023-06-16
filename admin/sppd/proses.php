<?php



if (isset($_POST['komen'])) {
    $class = new myClass;
    $class->update();
}elseif (isset($_POST['cancel'])) {
    $class = new myClass;
    $class->cancel();
}

class myClass {

    private $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect('localhost','root','','sipetugas');

        if (!$this->koneksi) {
            echo "koeksi anda gagal";
        }

    }

    public function update(){
        $update = mysqli_query($this->koneksi,"UPDATE sppd SET note='$_POST[note]', status = 'ditolak' WHERE idsppd = $_POST[id]");

        if (!$update) {
            echo "terjadi kesalahan internal".mysqli_error($this->koneksi);
        }else {
            echo"<script>
            alert('data berhasil di report')
            document.location.href = 'index.php'
            </script>
            ";
        }
    }

    public function cancel(){
        $cancel = mysqli_query($this->koneksi,"UPDATE sppd SET status = 'verify' WHERE idsppd = $_POST[id]");
        
        if (!$cancel) {
            echo "terjadi kesalahan internal".mysqli_error($this->koneksi);
        }else {
            echo"<script>
            alert('data berhasil di verifikasi')
            document.location.href = 'index.php'
            </script>
            ";
        }
    }

}