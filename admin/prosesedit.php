<?php
include '../koneksi.php';
session_start();
$id = $_GET['id'];
$namabarang = $_POST['namabarang'];
$merek = $_POST['merek'];
$stok = $_POST['stok'];
$stoksisa = $_POST['stoksisa'];
$tahun = $_POST['tahun'];
$img = $_FILES['foto']['name'];
if(empty($img)){
    $update = "UPDATE barang SET namabarang='".$namabarang."', merek='".$merek."', stok='".$stok."', stoksisa='".$stoksisa."', tahun='".$tahun."' WHERE id_barang = '".$id."' ";

    $sql = mysqli_query($koneksi, $update);
    $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="hilang">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di Ubah</h6></div>';
    echo "<script> document.location.href='./barang';</script>";
}else{
    $query = $koneksi->query("SELECT * FROM barang WHERE id_barang = '$_GET[id]' ");
    $data = mysqli_fetch_array($query);
    $lokasi = $data['gambar'];
    $hapus_gbr = "./img/barang/".$lokasi;
    unlink($hapus_gbr);

    move_uploaded_file($_FILES['foto']['tmp_name'], './img/barang/'.$img);

    $update = "UPDATE barang SET namabarang = '".$namabarang."', merek = '".$merek."', stok = '".$stok."', stoksisa='".$stoksisa."', tahun = '".$tahun."', gambar = '".$img."' WHERE id_barang = '".$id."' ";
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="hilang">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di Ubah</h6></div>';
    echo "<script> document.location.href='./barang';</script>";
}