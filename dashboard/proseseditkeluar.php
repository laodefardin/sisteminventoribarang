<?php
include '../koneksi.php';
session_start();
$id = $_GET['id'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];
$peminjam = $_POST['peminjam'];
$tahun = $_POST['tahun'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];
$tujuan = $_POST['tujuan'];

$update = "UPDATE barangkeluar SET id_barang='".$id_barang."', jumlah='".$jumlah."', id_anggota='".$peminjam."', tujuan='".$tujuan."', keterangan='".$keterangan."', tanggal='".$tahun."', status='".$status."' WHERE idbarangkeluar = '".$id."' ";
$ganti = $koneksi->query($update);

if ($status == 1){
    $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $query = mysqli_query($koneksi, $sql);
    $sto = mysqli_fetch_assoc($query);
    $stok = $sto['stoksisa'];
    $sisa = $stok + $jumlah;
        
    $tgl_kembali = date('d-m-Y');
    $query = 'INSERT INTO barangmasuk (id_barang, peminjam, jumlah, tanggal_kembali, idbarangkeluar) VALUES ("'.$id_barang.'","'.$peminjam.'","'.$jumlah.'","'.$tahun.'","'.$id.'")';
    $proses = $koneksi->query($query) or die('gagal menambah data pengembalian');
    if($proses){
    //update stok
    $update = "UPDATE barang SET stoksisa='".$sisa."' WHERE id_barang= '$id_barang' " ;
    $sql = mysqli_query($koneksi, $update);
    }
    }


if($ganti){
    $_SESSION['pesan'] = 'Edit';
                    echo "<script> document.location.href='./barangkeluar';</script>";
echo "<script> document.location.href='./barangkeluar';</script>";
}else{
    echo $update;
    echo "gagal mengubah data";
}
?>