<?php 
session_start();
include '../koneksi.php';
if (!isset($_SESSION["username"])){
  echo "<script> document.location.href='../index'; </script>";
}

$user = $_SESSION['username'];
$level = $_SESSION['level'];

$query = $koneksi->query("SELECT * FROM user WHERE username = '$user'");
$row = $query->fetch_array();
//jika akun berlevel peserta mengakses page admin
if ($level === "Karyawan"){
  echo "<script> document.location.href='../user/index'; </script>";
  // echo "<script> alert('anda tidak memiliki akses untuk halaman ini!');window.location= '../user/index';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sistem Inventory Barang</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" href="../favicon.ico" type="image/x-icon" />
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="profil" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="../logout" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index" class="brand-link">
        <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">SIB</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="./img/user/<?= ucfirst($_SESSION['gambar']); ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="index" class="d-block"><?= ucfirst($_SESSION['nama_lengkap']); ?></a>
          </div>
        </div>
        <?php include 'global_navigasi.php';?>
     