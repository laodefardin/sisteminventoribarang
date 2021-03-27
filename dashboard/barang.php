<?php
$halaman = 'barang';
include "global_header.php"; 
// $query = query("SELECT * FROM barang");
$level = $_SESSION['level'];
$jurusan = $_SESSION['nama_lengkap'];
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {

                    $pesan = $_SESSION['pesan'];

                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                //mengatur session pesan menjadi kosong

                $_SESSION['pesan'] = '';
                // unset($_SESSION['pesan']);
                // $cetak_pesan = '';
                ?>



                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang</h3>
                        <a style="text-align: right;" class="btn bg-yellow btn-sm offset-md-9" href="tambahbarang"> <i
                                class="fa fa-plus"></i> Tambah Barang</a>

                        <a style="text-align: right;" class="btn bg-green btn-sm" href="print/recapbarangexcel.php"
                            target="_blank"> <i class="fa fa-print"></i> Excel</a>
                        <a style="text-align: right;" class="btn bg-red btn-sm" href="print/recapbarangpdf.php"
                            target="_blank"> <i class="fa fa-print"></i> PDF</a>
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
                                    <th>Tahun Pengadaan</th>
                                    <th>Sumber Pengadaan</th>
                                    <th>Kondisi Barang</th>
                                    <th>Unit Awal</th>
                                    <th>Unit Sisa</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($level === 'Administrator'){
                                    $query = $koneksi->query("SELECT * FROM barang");
                                }else{
                                    $query = $koneksi->query("SELECT * FROM barang WHERE jurusan = '$jurusan'");
                                }
                        $nomor_urut = 1;
                        foreach ($query as $data) : ?>
                                <tr>
                                    <td><?= $nomor_urut; ?></td>
                                    <td><?= $data['kodebarang']; ?></td>
                                    <td><?= $data['namabarang']; ?></td>
                                    <td><?= $data['merek']; ?></td>
                                    <td><?= $data['tahun']; ?></td>
                                    <td><?= $data['sumberdana']; ?></td>
                                    <td><?= $data['kondisibarang']; ?></td>
                                    <td><?= $data['stok']; ?></td>
                                    <td><?= $data['stoksisa']; ?></td>
                                    <td>
                                        <?php echo "<a  class='btn btn-primary btn-sm' href='#largeModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_barang'] . "><i class='fa fa-eye'></i> Lihat Gambar</a>"; ?>
                                    </td>
                                    <td>
                                        <a href="editbarang?id=<?= $data['id_barang'];?>"
                                            class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                                        <a href="hapusbarang?id=<?= $data['id_barang']; ?>"
                                            class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Hapus"><i
                                                class="fa fa-trash"></i></a>


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
                    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Gambar Barang</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
<<<<<<< HEAD
                                    <!-- <div class="fetched-data" style="max-height: 500px;overflow: hidden;position: relative;padding-left: 25px;padding-right: 25px;"> -->
=======
                                <!-- <div class="fetched-data" style="max-height: 500px;overflow: hidden;position: relative;padding-left: 25px;padding-right: 25px;"> -->
>>>>>>> 32ad088f60cfb8a802fd349deab0b28bea55bc95
                                    <div class="fetched-data" style="width: 100%; height: 400px;"></div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    <!-- <button class="btn btn-primary" type="button">Save changes</button> -->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "global_footer.php"; ?>