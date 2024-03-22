<?php
session_start();
include 'koneksi.php';

$nama = $_POST['nama'];
$password = $_POST['password'];

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$nama' OR email='$nama' AND password='$password'");

$cek =mysqli_num_rows($sql);

if ($cek > 0) {
    $data = mysqli_fetch_array($sql);

    $_SESSION['nama'] = $data['username'];
    $_SESSION['userid'] = $data['UserID'];
    $_SESSION['status'] = 'login';
    echo "<script>
    alert('Login Berhasil');
    location.href='../index.php';
    </script>";
}else{
    echo "<script>
    alert('Nama Pengguna atau Password salah!');
    location.href='../login.php';
    </script>";
}

?>
