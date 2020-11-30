<?php
$halaman = 'Transaksi Barang Keluar';
include "global_header.php"; 
$level = $_SESSION['level'];

if ($level == 'Administrator'){
    $query = mysqli_query($koneksi, "SELECT barangkeluar.idbarangkeluar, barangkeluar.id_barang, barangkeluar.peminjam, barangkeluar.jumlah, barangkeluar.jumlah, barangkeluar.tanggal, barangkeluar.status, barang.namabarang, barang.kodebarang FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang");
}else{
$query = mysqli_query($koneksi, "SELECT barangkeluar.idbarangkeluar, barangkeluar.id_barang, barangkeluar.peminjam, barangkeluar.jumlah, barangkeluar.jumlah, barangkeluar.tanggal, barangkeluar.status, barang.namabarang, barang.kodebarang FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang WHERE barangkeluar.jurusan = '$level'");
}
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo $pesan = $_SESSION['pesan'];
                    
                }
                //mengatur session pesan menjadi kosong
                $_SESSION['pesan'] = '';
                ?>



                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang Keluar</h3>
                        <a style="text-align: right;" class="btn bg-yellow btn-sm offset-sm-8"
                            href="tambahbarangkeluar"> <i class="fa fa-plus"></i> Tambah</a>

                            <a style="text-align: right;" class="btn bg-green btn-sm" href="print/export_excel1.php" target="_blank"> <i class="fa fa-print"></i> Excel</a>
                        <a style="text-align: right;" class="btn bg-red btn-sm" href="print/export_pdf1.php" target="_blank"> <i class="fa fa-print"></i> PDF</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah (Unit)</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Nama Peminjam</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $nomor_urut = 1;
                        foreach ($query as $data) :
                                                ?>
                                <tr>
                                    <td><?= $nomor_urut; ?></td>
                                    <td><?= $data['kodebarang']; ?></td>
                                    <td><?= $data['namabarang']; ?></td>
                                    <td><?= $data['jumlah']; ?></td>
                                    <td><?= $data['tanggal']; ?></td>
                                    <td><?= $data['peminjam']; ?></td>
                                    <td>
                                        <span
                                            class="btn btn-xs btn-<?= $data['status'] == 1 ? 'success' : 'danger' ?>"><?= $data['status'] == 1 ? 'sudah dikembalikan' : 'belum dikembalikan'; ?></span>
                                    </td>
                                    <td>
                                        <?php
                                $status = $data['status'];
                                if($status==='1'){?>
                                        <!-- <a href="hapusbarangkeluar?id=<?= $data['idbarangkeluar']; ?>"
                                            class="btn btn-danger btn-xs"
                                            onclick="return confirm('Anda Yakin ingin menghapus?');"><i
                                                class="fa fa-trash"></i></a> -->
                                        <?php } else {?>
                                        <a href="editbarangkeluar?id=<?= $data['idbarangkeluar'];?>"
                                            class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                        <a href="hapusbarangkeluar?id=<?= $data['idbarangkeluar']; ?>"
                                            class="btn btn-danger btn-xs"
                                            onclick="return confirm('Anda Yakin ingin menghapus?');"><i
                                                class="fa fa-trash"></i></a>
                                        <?php }; ?>


                                    </td>
                                </tr>
                                <?php
                                                    $nomor_urut++;
                                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
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