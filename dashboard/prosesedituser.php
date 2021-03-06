<?php
include '../koneksi.php';
session_start();
$id = $_GET['id'];
$username = $_POST['username'];
$nama_lengkap = $_POST['nama_lengkap'];
$level = $_POST['level'];
$password = htmlentities(strip_tags(trim($_POST["password"])));
$img = $_FILES['foto']['name'];

$passwordbaru = md5(sha1(md5($password)));

if(empty($img)){
    $update = "UPDATE user SET username='".$username."', nama_lengkap='".$nama_lengkap."', level='".$level."', password='".$passwordbaru."' WHERE user_id = '".$id."' ";
    $sql = mysqli_query($koneksi, $update);
    $_SESSION['pesan'] = 'Ubah';
    // $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="hilang">
    //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    //                 <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di Ubah</h6></div>';
    echo "<script> document.location.href='./users';</script>";
}else{
    $query = $koneksi->query("SELECT * FROM user WHERE user_id = '$_GET[id]' ");
    $data = mysqli_fetch_array($query);
    $lokasi = $data['gambar'];
    $hapus_gbr = "./img/user/".$lokasi;
    unlink($hapus_gbr);
    move_uploaded_file($_FILES['foto']['tmp_name'], './img/user/'.$img);

    $update = "UPDATE user SET username = '".$username."', nama_lengkap = '".$nama_lengkap."', level = '".$level."', password = '".$passwordbaru."', gambar = '".$img."' WHERE user_id = '".$id."' ";
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./users';</script>";
}