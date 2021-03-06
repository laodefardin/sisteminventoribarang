<?php 
$halaman = 'Tambah Barang Masuk';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Tambah Barang</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <select class="form-control" name="kodebarang" id="kodebarang">
                                            <option>Pilih Kode Barang</option>
                                            <?php
                                            $sql = query("SELECT * FROM barang");
                                            foreach ($sql as $data) :
                                            ?>
                                            <option value="<?= $data['kodebarang']?>"><?= $data['kodebarang']?> -
                                                <?= $data['namabarang']?></option>
                                            <?php
                                                endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input class="form-control" name="jumlah" id="jumlah" type="number"
                                            placeholder="Masukkan jumlah Barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Peminjam</label>
                                        <input class="form-control" name="peminjam" id="peminjam" type="text"
                                            placeholder="Peminjam">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input name="tahun" type="text" class="form-control datetimepicker-input"
                                                data-target="#reservationdate">
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <!-- <input class="form-control" name="jml_jam" id="jml_jam" type="text"> -->
                                    </div>
                                    <div class="form-group form-actions">
                                        <input class="btn btn-primary" name="tambah" type="submit"
                                            value="Tambah Barang Masuk">
                                        <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                            onclick="self.history.back()">
                                        <!-- <button class="btn btn-primary" name="submit" type="submit">
                                    <i class="fa fa-dot-circle-o"></i> Tambah Kelas</button> -->
                                        <!-- <button class="btn btn-danger" type="reset">
                                    <i class="fa fa-ban"></i> Reset</button> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
            <?php
            if (isset($_POST['tambah'])){
                $kodebarang = $_POST['kodebarang'];
                $jumlah = $_POST['jumlah'];
                $peminjam = $_POST['peminjam'];
                $tahun  = $_POST['tahun'];

                $sql = "SELECT * FROM barang WHERE kodebarang = '$kodebarang'";
                $query = mysqli_query($koneksi, $sql);
                $sto = mysqli_fetch_assoc($query);
                $stok = $sto['stoksisa'];

                $sisa = $stok + $jumlah;
                    $query = 'INSERT INTO barangmasuk (kodebarang, peminjam, jumlah, tanggal) VALUES ("'.$kodebarang.'","'.$peminjam.'","'.$jumlah.'","'.$tahun.'")';
                    $proses = $koneksi->query($query);
                    if($proses){
                        //update stok
                        $update = "UPDATE barang SET stoksisa='".$sisa."' WHERE kodebarang= '$kodebarang' " ;
                        $sql = mysqli_query($koneksi, $update);
                    if ($sql){
                    $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="hilang">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di tambah</h6></div>';
                    echo "<script> document.location.href='./barangkeluar';</script>";
                    }
                    }
            }
            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>