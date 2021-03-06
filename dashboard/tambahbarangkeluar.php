<?php 
$halaman = 'Tambah Barang Keluar';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Tambah Barang Keluar</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                <?php
                                if ($level === 'Administrator'){?>
                                <label>Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-control">
                                    <option value="TKJ">TKJ</option>
                                    <option value="TAV">TAV</option>
                                    <option value="TPHP">TPHP</option>
                                    <option value="TBSM">TBSM</option>
                                    <option value="TKR">TKR</option>
                                    <option value="TLAS">TLAS</option>
                                    <option value="DPIB">DPIB</option>
                                    </select>
                                <?php }else{?>
                                <input type="text" name='jurusan' value="<?= $_SESSION['level']; ?>" hidden>
                                <?php } ?>
                                <?php 
                                if ($level === 'Administrator' ){ ?>
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <select class="form-control" name="id_barang" id="id_barang">
                                            <option>Pilih Kode Barang</option>
                                            <?php
                                            $sql = $koneksi->query("SELECT * FROM barang");
                                            foreach ($sql as $data) :
                                            ?>
                                            <option value="<?= $data['id_barang']?>"><?= $data['kodebarang']?> -
                                                <?= $data['namabarang']?></option>
                                            <?php
                                                endforeach; ?>
                                        </select>
                                    </div>
                                    <?php } else { $level = $_SESSION['level'];?>
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <select class="form-control" name="id_barang" id="id_barang">
                                        <option>Pilih Kode Barang</option> 
                                    <?php
                                    $sql = $koneksi->query("SELECT * FROM barang WHERE jurusan = '$level'");
                                    foreach ($sql as $data) :
                                    ?>
                                    <option value="<?= $data['id_barang']?>"><?= $data['kodebarang']?> -
                                                <?= $data['namabarang']?></option>
                                                <?php
                                                endforeach; ?>
                                                </select>
                                    </div>
                                <?php } ?>
                                    <div class="form-group">
                                        <label>Jumlah Unit</label>
                                        <input class="form-control" name="jumlah" id="jumlah" type="number"
                                            placeholder="Masukkan jumlah Barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Peminjam</label>
                                        <select class="form-control" name="peminjam" id="peminjam">
                                            <option>Pilih Anggota</option>
                                            <?php
                                            $sql = $koneksi->query("SELECT * FROM anggota");
                                            foreach ($sql as $data) :
                                            ?>
                                            <option value="<?= $data['id_anggota']?>"><?= $data['namalengkap']?></option>
                                            <?php
                                                endforeach; ?>
                                        </select>
                                        <!-- <input class="form-control" name="peminjam" id="peminjam" type="text"
                                            placeholder="Peminjam"> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Tujuan</label>
                                        <textarea class="form-control" name="tujuan" id="tujuan" cols="30" rows="2"></textarea>
                                        <!-- <input class="form-control" name="jml_jam" id="jml_jam" type="text"> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pinjam</label>
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
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                                        <!-- <input class="form-control" name="jml_jam" id="jml_jam" type="text"> -->
                                    </div>
                                    <div class="form-group form-actions">
                                        <input class="btn btn-primary" name="tambah" type="submit"
                                            value="Tambah Barang Keluar">
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
                $id_barang = $_POST['id_barang'];
                $jurusan = $_POST['jurusan'];
                $jumlah = $_POST['jumlah'];
                $peminjam = $_POST['peminjam'];
                $tahun  = $_POST['tahun'];
                $tujuan = $_POST['tujuan'];
                $keterangan = $_POST['keterangan'];

                $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
                $query = mysqli_query($koneksi, $sql);
                $sto = mysqli_fetch_assoc($query);
                $stok = $sto['stoksisa'];

                $sisa = $stok - $jumlah;

                if ($stok < $jumlah) {
                ?>
            <script language="JavaScript">
                alert('Oops! Jumlah pengeluaran lebih besar dari stok ...');
                document.location = './tambahbarangkeluar';
            </script>
            <?php
                //proses
                }else{
                    $query = 'INSERT INTO barangkeluar (id_barang, jurusan, id_anggota, keterangan, tujuan, jumlah, tanggal, status) VALUES ("'.$id_barang.'","'.$jurusan.'","'.$peminjam.'", "'.$keterangan.'", "'.$tujuan.'", "'.$jumlah.'","'.$tahun.'",0)';
                    $proses = $koneksi->query($query);
                    if($proses){
                        //update stok
                        $update = "UPDATE barang SET stoksisa='".$sisa."' WHERE id_barang= '$id_barang' " ;
                        $sql = mysqli_query($koneksi, $update);
                    if ($sql){
                    $_SESSION['pesan'] = 'Tambah';
                    echo "<script> document.location.href='./barangkeluar';</script>";
                    }
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