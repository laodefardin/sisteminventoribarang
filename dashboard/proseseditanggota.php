<?php
include '../koneksi.php';
session_start();
$id = $_GET['id'];
$namalengkap = $_POST['namalengkap'];
$gender = $_POST['gender'];
$telp = $_POST['telp'];
$username = $_POST['username'];
$password = htmlentities(strip_tags(trim($_POST["password"])));
$passwordbaru = md5(sha1(md5($password)));

    $update = "UPDATE anggota SET namalengkap = '".$namalengkap."', username='".$username."', password='".$passwordbaru."', gender = '".$gender."', telp = '".$telp."' WHERE id_anggota = '".$id."' ";
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./anggota';</script>";
