<?php
include 'koneksi.php';
session_start();

if(isset($_POST['komentar'])) {
    // Ambil data yang dikirim melalui formulir
    $komentar = $_POST['komentar'];
    $fotoID = $_GET['fotoid']; // Ambil FotoID dari parameter URL

    // Escape input untuk mencegah SQL Injection
    $komentar = mysqli_real_escape_string($koneksi, $komentar);

    // Ambil userID dari session
    $userID = $_SESSION['userid'];

    // Query untuk menyimpan komentar ke dalam database
    $query = "INSERT INTO komentarfoto (FotoID, UserID, Komentar) VALUES ('$fotoID', '$userID', '$komentar')";
    $result = mysqli_query($koneksi, $query);

    if($result) {
        // Komentar berhasil disimpan, redirect ke halaman yang sama untuk menghindari pengiriman ulang formulir
        header("Location: gambar.php?FotoID=$fotoID");
        exit();
    } else {
        // Jika terjadi kesalahan dalam query
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
