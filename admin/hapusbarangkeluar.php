<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$query = "SELECT * FROM barangkeluar WHERE idbarangkeluar = '$id'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);


echo $id_barang = $data[1];
echo $jumlah = $data[4];
$sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
$query = mysqli_query($koneksi, $sql);
$sto = mysqli_fetch_assoc($query);
$stok = $sto['stoksisa'];
$sisa = $stok + $jumlah;

$update = "UPDATE barang SET stoksisa='".$sisa."' WHERE id_barang= '$id_barang'";
$proses1 = $koneksi->query($update);

$hapus = "DELETE FROM barangkeluar WHERE idbarangkeluar = '$id'";
$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di hapus</h6></div>';
}
echo "<script> document.location.href='./barangkeluar';</script>";
die();
