<?php 
$halaman = 'dashboard';
include "global_header.php"; 
$level = $_SESSION['level'];
?>
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="alert alert-success alert-dismissible">
      <h5><i class="icon fas fa-check"></i> Selamat Datang</h5>
      SISTEM PEMINJAMAN BARANG DAN PERALATAN LAB JURUSAN SMKN 1 PAPALANG
    </div>
    <div class="row">
      <?php 
    if ($level === 'Administrator'){ ?>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <?php
              $sql = "SELECT count(id_barang) as a FROM barang";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <h3><?= $data['a']; ?></h3>
            <p>Barang</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <?php
              $sql = "SELECT count(idbarangkeluar) as a FROM barangkeluar WHERE status=0";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <h3><?= $data['a']; ?></h3>
            <p>Belum Mengembalikan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="barangkeluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <?php
              $sql = "SELECT count(idbarangkeluar) as a FROM barangkeluar WHERE status=1";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <h3><?= $data['a']; ?></h3>
            <p>Sudah Dikembalikan</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>

          </div>
          <a href="barangkeluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <?php } elseif($level === 'GURU') { ?>

      <?php }else{ ?>
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <?php
              $sql = "SELECT count(id_barang) as a FROM barang WHERE jurusan = '$level'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <h3><?= $data['a']; ?></h3>
            <p>Barang</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <?php
              $sql = "SELECT count(idbarangkeluar) as a FROM barangkeluar WHERE status=0 AND jurusan = '$level'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <h3><?= $data['a']; ?></h3>
            <p>Belum Mengembalikan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="barangkeluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <?php
              $sql = "SELECT count(idbarangkeluar) as a FROM barangkeluar WHERE status=1 AND jurusan = '$level'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <h3><?= $data['a']; ?></h3>
            <p>Sudah Dikembalikan</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>

          </div>
          <a href="barangkeluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <?php } ?>



      <?php 
      if ($level === 'Administrator'){?>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <?php
              $sql = "SELECT count(id_anggota) as a FROM anggota";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <h3><?= $data['a']; ?></h3>
            <p>Total Anggota</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Barang TKJ</span>
            <?php
              $sql = "SELECT count(id_barang) as a FROM barang WHERE jurusan = 'TKJ'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <span class="info-box-number"><?= $data['a']; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Barang TAV</span>
            <?php
              $sql = "SELECT count(id_barang) as a FROM barang WHERE jurusan = 'TAV'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <span class="info-box-number"><?= $data['a']; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Barang TPHP</span>
            <?php
              $sql = "SELECT count(id_barang) as a FROM barang WHERE jurusan = 'TPHP'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <span class="info-box-number"><?= $data['a']; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Barang TBSM</span>
            <?php
              $sql = "SELECT count(id_barang) as a FROM barang WHERE jurusan = 'TBSM'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <span class="info-box-number"><?= $data['a']; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Barang TKR</span>
            <?php
              $sql = "SELECT count(id_barang) as a FROM barang WHERE jurusan = 'TKR'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <span class="info-box-number"><?= $data['a']; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-black elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Barang TLAS</span>
            <?php
              $sql = "SELECT count(id_barang) as a FROM barang WHERE jurusan = 'TLAS'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <span class="info-box-number"><?= $data['a']; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Barang DPIB</span>
            <?php
              $sql = "SELECT count(id_barang) as a FROM barang WHERE jurusan = 'DPIB '";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
            <span class="info-box-number"><?= $data['a']; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <?php } else { }?>

    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>