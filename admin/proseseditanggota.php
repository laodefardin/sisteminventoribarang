<?php
include '../koneksi.php';
session_start();
$id = $_GET['id'];
$namalengkap = $_POST['namalengkap'];
$gender = $_POST['gender'];
$telp = $_POST['telp'];

    $update = "UPDATE anggota SET namalengkap = '".$namalengkap."', gender = '".$gender."', telp = '".$telp."' WHERE id_anggota = '".$id."' ";
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./anggota';</script>";
