<?php

session_start();
session_id();

if (isset($_POST['login'])) {
   $class = new Masuk;
   $class->login();
}elseif (isset($_POST['register'])) {
   $class = new Masuk;
   $class->register();
}

class Masuk{
   
   private $koneksi;

public function __construct()
{
   $this->koneksi = mysqli_connect('localhost','root','','sipetugas');

   if (!$this->koneksi) {
      echo"koneksi gagal";
   }
}

public function login(){
   $user = $_POST['username'];
   $pass = $_POST['password'];

   $query = mysqli_query($this->koneksi,"SELECT * FROM login WHERE username = '$user' AND level = 'admin'");
   $qA = mysqli_query($this->koneksi,"SELECT * FROM login WHERE username = '$user' AND level = 'bidang'");
   $qB = mysqli_query($this->koneksi,"SELECT * FROM login WHERE username = '$user' AND level = 'bidangB'");
   $qC = mysqli_query($this->koneksi,"SELECT * FROM login WHERE username = '$user' AND level = 'bidangC'");


   if (mysqli_num_rows($query) > 0) {
      $dat = mysqli_fetch_assoc($query);
      if (password_verify($pass,$dat['password'])) {
         $_SESSION['username'] = $dat['username'];
         $_SESSION['level'] = $dat['level'];
         $session_id = session_id();
         setcookie("session_id", $session_id, time() + 3600, "/");
         echo "
         <script>
         alert('selamat datang $dat[username]');
         document.location.href = '../admin/';
         </script>";
      }else {
      echo "
         <script>
         alert('password yang anda masukan salah');
         document.location.href = 'index.php';
         </script>";
      }
      
   }elseif (mysqli_num_rows($qA) > 0) {
      $dat = mysqli_fetch_assoc($qA);
         if (password_verify($pass,$dat['password'])) {
         $_SESSION['username'] = $dat['username'];
         $_SESSION['level'] = $dat['level'];
         $session_id = session_id();
         setcookie("session_id", $session_id, time() + 3600, "/");

         
         echo "
         <script>
         alert('selamat datang $dat[username]');
         document.location.href = '../index.php';
         </script>";
      }else {
      echo "
         <script>
         alert('password yang anda masukan salah');
         document.location.href = 'index.php';
         </script>";
      }
   }elseif (mysqli_num_rows($qB) > 0) {
      $dat = mysqli_fetch_assoc($qB);
      if (password_verify($pass,$dat['password'])) {
         $_SESSION['username'] = $dat['username'];
         $_SESSION['level'] = $dat['level'];
         $session_id = session_id();
         setcookie("session_id", $session_id, time() + 3600, "/");

         echo "
         <script>
         alert('selamat datang $dat[username]');
         document.location.href = '../admin/spj/index.php';
         </script>";
      }else {
      echo "
         <script>
         alert('password yang anda masukan salah');
         document.location.href = 'index.php';
         </script>";
      }
   }elseif (mysqli_num_rows($qC) > 0) {
      $dat = mysqli_fetch_assoc($qC);
      if (password_verify($pass,$dat['password'])) {
         $_SESSION['username'] = $dat['username'];
         $_SESSION['level'] = $dat['level'];
         $session_id = session_id();
         setcookie("session_id", $session_id, time() + 3600, "/");

         
         echo "
         <script>
         alert('selamat datang $dat[username]');
         document.location.href = '../admin/spj/index.php';
         </script>";
      }else {
      echo "
         <script>
         alert('password yang anda masukan salah');
         document.location.href = 'index.php';
         </script>";
      }
   }else {
      echo"gagal melakukan login".mysqli_error($this->koneksi);
   }

}

public function register(){


// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$level = $_POST['level'];
$password = $_POST['password'];

// Encrypt password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into database
$sql = "INSERT INTO `login`(`username`, `password`, `level`, `idkaryawan`, `email`) VALUES ('$name','$hashed_password','$level',null,'$email')";

if (mysqli_query($this->koneksi, $sql)) {
    echo "<script>
         alert('berhasil melakukan registrasi');
         document.location.href = '../admin/'
         </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($this->koneksi);
}


}

}


