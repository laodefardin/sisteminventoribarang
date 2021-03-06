<?php
session_start();
include '../koneksi.php';
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    
    $update = "UPDATE user SET 
    nama_lengkap = '$nama',
    username     = '$username',
    level        = '$level'
    WHERE user_id = '$_SESSION[id_user]'";

    mysqli_query($koneksi, $update) or die (mysqli_error());
    
}

?>