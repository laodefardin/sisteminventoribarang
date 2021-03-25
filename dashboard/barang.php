<?php
$halaman = 'barang';
include "global_header.php"; 
// $query = query("SELECT * FROM barang");
$level = $_SESSION['level'];
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
                                    <th>Kondisi Barang</th>
                                    <th>Unit Awal</th>
                                    <th>Unit Sisa</th>
                                    <th>Tahun Pengadaan</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($level === 'Administrator'){
                                    $query = $koneksi->query("SELECT * FROM barang");
                                }else if($level === 'TKJ'){
                                    $query = $koneksi->query("SELECT * FROM barang WHERE jurusan = 'TKJ'");
                                }else if($level === 'TAV'){
                                    $query = $koneksi->query("SELECT * FROM barang WHERE jurusan = 'TAV'");
                                }else if($level === 'TPHP'){
                                    $query = $koneksi->query("SELECT * FROM barang WHERE jurusan = 'TPHP'");
                                }else if($level === 'TBSM'){
                                    $query = $koneksi->query("SELECT * FROM barang WHERE jurusan = 'TBSM'");
                                }else if($level === 'TKR'){
                                    $query = $koneksi->query("SELECT * FROM barang WHERE jurusan = 'TKR'");
                                }else if($level === 'TLAS'){
                                    $query = $koneksi->query("SELECT * FROM barang WHERE jurusan = 'TLAS'");
                                }else if($level === 'DPIB'){
                                    $query = $koneksi->query("SELECT * FROM barang WHERE jurusan = 'DPIB'");
                                }
                        $nomor_urut = 1;
                        foreach ($query as $data) : ?>
                                <tr>
                                    <td><?= $nomor_urut; ?></td>
                                    <td><?= $data['kodebarang']; ?></td>
                                    <td><?= $data['namabarang']; ?></td>
                                    <td><?= $data['merek']; ?></td>
                                    <td><?= $data['kondisibarang']; ?></td>
                                    <td><?= $data['stok']; ?></td>
                                    <td><?= $data['stoksisa']; ?></td>
                                    <td><?= $data['tahun']; ?></td>
                                    <td>
                                        <?php echo "<a  class='btn btn-primary btn-sm' href='#largeModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_barang'] . "><i class='fa fa-eye'></i> Lihat Gambar</a>"; ?>
                                    </td>
                                    <td>
                                        <a href="editbarang?id=<?= $data['id_barang'];?>"
                                            class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                                        <a href="hapusbarang?id=<?= $data['id_barang']; ?>"
                                            class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Hapus"><i class="fa fa-trash"></i></a>


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
                                    <div class="fetched-data"></div>
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