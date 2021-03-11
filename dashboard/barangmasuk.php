<?php
$halaman = 'Transaksi Barang Masuk';
include "global_header.php"; 
$level = $_SESSION['level'];
if ($level === 'Administrator'){
$query = mysqli_query($koneksi, "SELECT barangmasuk.*, 
barang.*,
barangkeluar.*,
anggota.*
FROM barangmasuk 
INNER JOIN barang ON 
barangmasuk.id_barang=barang.id_barang 
INNER JOIN barangkeluar ON 
barangkeluar.idbarangkeluar=barangmasuk.idbarangkeluar 
INNER JOIN anggota ON
anggota.id_anggota=barangmasuk.peminjam
WHERE barangkeluar.status=1");    
}else{
$query = mysqli_query($koneksi, "SELECT barangmasuk.*, 
barang.*,
barangkeluar.*,
anggota.*
FROM barangmasuk 
INNER JOIN barang ON 
barangmasuk.id_barang=barang.id_barang 
INNER JOIN barangkeluar ON 
barangkeluar.idbarangkeluar=barangmasuk.idbarangkeluar 
INNER JOIN anggota ON
anggota.id_anggota=barangmasuk.peminjam
WHERE barangkeluar.status=1 AND barangkeluar.jurusan = '$level'");
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



                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang Pengembalian</h3>
                        <a style="text-align: right;" class="btn bg-green btn-sm offset-sm-8" href="print/export_excel.php" target="_blank"> <i class="fa fa-print"></i> Excel</a>
                        <a style="text-align: right;" class="btn bg-red btn-sm" href="print/export_pdf.php" target="_blank"> <i class="fa fa-print"></i> PDF</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Peminjam</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
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
                                    <td><?= $data['namalengkap']; ?></td>
                                    <td><?= $data['jumlah']; ?></td>
                                    <td><?= $data['tanggal']; ?></td>
                                    <td><?= $data['tanggal_kembali']; ?></td>
                                    
                                    <td>
                                        <!-- <a href="print/printbarangmasuk?id=<?= $data['idbarangmasuk'];?>"  target="_blank" class="btn btn-warning btn-xs"><i class="fa fa-print"></i></a> -->
                                        <a href="hapusbarangmasuk?id=<?= $data['idbarangmasuk']; ?>"
                                            class="btn btn-danger btn-xs" onclick="return confirm('Anda Yakin ingin menghapus?');" ><i class="fa fa-trash"></i></a>
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