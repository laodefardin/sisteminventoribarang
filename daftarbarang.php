<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Daftar Barang - Sistem Inventory Barang</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="" class="navbar-brand">
                    <span class="brand-text font-weight-light">SIB - SMKN 1 PAPALANG</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Daftar Barang <small>Informasi Data Barang</small></h1>
                        </div>

                    </div><!-- /.row -->
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-info"></i>Tip!</h5>
                        Selamat datang di Sistem Inventory Barang (SIB) SMKN 1 Papalang, Anda bisa melihat dan mencari
                        informasi barang
                    </div>


                </div><!-- /.container-fluid -->

            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Barang</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merek</th>
                                        <th>Jumlah</th>
                                        <th>Sisa Stok</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $query = $koneksi->query("SELECT * FROM barang");
                        $nomor_urut = 1;
                        foreach ($query as $data) :
                                                ?>
                                    <tr>
                                        <td><?= $nomor_urut; ?></td>
                                        <td><?= $data['kodebarang']; ?></td>
                                        <td><?= $data['namabarang']; ?></td>
                                        <td><?= $data['merek']; ?></td>
                                        <td><?= $data['stok']; ?></td>
                                        <td><?= $data['stoksisa']; ?></td>
                                        <td>
                                            <?php echo "<a  class='btn btn-primary btn-sm' href='#largeModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_barang'] . "><i class='fa fa-eye'></i> Lihat</a>"; ?>
                                        </td>
                                    </tr>
                                    <?php
                                                    $nomor_urut++;
                                                endforeach; ?>
                                </tbody>
                                <!-- <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Merek</th>
                                    <th>Stok</th>
                                    <th>Tahun Masuk</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot> -->
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Gambar Barang</h4>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="fetched-data"  style="width: 100%; height: 400px;"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Close</button>
                                        <!-- <button class="btn btn-primary" type="button">Save changes</button> -->
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        <footer class="main-footer">
            <div class='container'>
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2020 <a href="">SIB - Sistem Inventory Barang</a>.</strong> All rights
                reserved.
            </div>
        </footer>
        </div>
  </div>  
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


    <!-- AdminLTE -->
    <script src="assets/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="assets/plugins/chart.js/Chart.min.js"></script>
    <script src="assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/dist/js/pages/dashboard3.js"></script>
    <script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#largeModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'post',
                    url: 'detailbarang.php',
                    data: 'rowid=' + rowid,
                    success: function (data) {
                        $('.fetched-data').html(data); //menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>