<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$query = "SELECT * FROM barangmasuk WHERE idbarangmasuk = '$id'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

$hapus = "DELETE FROM barangmasuk WHERE idbarangmasuk = '$id'";
$proses = $koneksi->query($hapus);
if ($proses) {
     $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di hapus</h6></div>';
}
echo "<script> document.location.href='./barangmasuk';</script>";
die();
