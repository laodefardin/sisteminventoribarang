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

echo ' idbarang';
echo $id_barang = $data[1];
echo ' jumlah';
echo $jumlah = $data[6];
$sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
$query = mysqli_query($koneksi, $sql);
$sto = mysqli_fetch_assoc($query);
echo ' stok';
echo $stok = $sto['stoksisa'];
echo ' sisa';
echo $sisa = $stok + $jumlah;

echo $update = "UPDATE barang SET stoksisa='".$sisa."' WHERE id_barang= '$id_barang'";
$proses1 = $koneksi->query($update);

echo $hapus = "DELETE FROM barangkeluar WHERE idbarangkeluar = '$id'";
$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = 'Hapus';
}
echo "<script> document.location.href='./peminjaman';</script>";
die();
