<?php
session_start();
include 'koneksi.php';

$username = $_POST['Username'];
$password = $_POST['Password'];


$data = mysqli_query($koneksi, "SELECT * FROM kiki WHERE username = '$username' AND password = '$password'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {

    $_SESSION['username'] = $username; 
    header("location:admin.php");
} else {

    header("location:index.php?pesan=gagal");
}
?>
