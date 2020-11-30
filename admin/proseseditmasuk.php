<?php
include '../koneksi.php';
session_start();
$id = $_GET['id'];
$kodebarang = $_POST['kodebarang'];
$jumlah = $_POST['jumlah'];
$peminjam = $_POST['peminjam'];
$tahun = $_POST['tahun'];

    $update = "UPDATE barangmasuk SET kodebarang='".$kodebarang."', jumlah='".$jumlah."', peminjam='".$peminjam."', tanggal='".$tahun."' WHERE idbarangmasuk = '".$id."' ";

    $sql = mysqli_query($koneksi, $update);
    $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="hilang">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di Ubah</h6></div>';
    echo "<script> document.location.href='./barangmasuk';</script>";
