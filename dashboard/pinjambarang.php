<?php 
$halaman = 'Tambah Barang Keluar';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Pinjam Barang</div>
                    <div class="card-body">                    
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                <div class="form-group">
                                        <label>Kode Barang & Nama Barang</label>
                                        <select class="form-control" name="id_barang" id="id_barang" readonly>
                                            <?php
                                            $sql = $koneksi->query("SELECT * FROM barang WHERE id_barang = '$_GET[id]'");
                                            foreach ($sql as $data1) :
                                            if ($data1['id_barang'] == $data1['id_barang']){
                                                $select = "selected";
                                            }else{
                                                $select="";
                                            }
                                            echo "<option value='$data1[id_barang]' $select>".$data1['kodebarang'].' - '.$data1['namabarang']."</option>";
                                            ?>
                                            <input type="text" name='jurusan' value="<?= $data1['jurusan']; ?>" hidden>
                                            <?php
                                                endforeach; ?>
                                        </select>
                                    </div>
                    
                                    <div class="form-group">
                                        <label>Jumlah Unit</label>
                                        <input class="form-control" name="jumlah" id="jumlah" type="number"
                                            placeholder="Masukkan jumlah Barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Peminjam</label>
                                        <select class="form-control" name="peminjam" id="peminjam" readonly>
                                            <?php
                                            $id = $_SESSION['id_anggota'];
                                            $sql = $koneksi->query("SELECT * FROM anggota WHERE id_anggota = '$id'");
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
                echo $id_barang = $_POST['id_barang'];
                echo $jurusan = $_POST['jurusan'];
                echo $jumlah = $_POST['jumlah'];
                echo $peminjam = $_POST['peminjam'];
                echo $tahun  = $_POST['tahun'];
                echo $tujuan = $_POST['tujuan'];
                echo $keterangan = $_POST['keterangan'];

                echo $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
                $query = mysqli_query($koneksi, $sql);
                $sto = mysqli_fetch_assoc($query);
                $stok = $sto['stoksisa'];

                $sisa = $stok - $jumlah;

                if ($stok < $jumlah) {
                ?>
            <script language="JavaScript">
                alert('Oops! Jumlah pengeluaran lebih besar dari stok ... coba lagi periksa stok barang yang ingin dipinjam');
                document.location = './daftarbarang';
            </script>
            <?php
                //proses
                }else{
                    $query = 'INSERT INTO barangkeluar (id_barang, jurusan, id_anggota, keterangan, tujuan, jumlah, tanggal, status) VALUES ("'.$id_barang.'","'.$jurusan.'","'.$peminjam.'", "'.$keterangan.'", "'.$tujuan.'", "'.$jumlah.'","'.$tahun.'",2)';
                    $proses = $koneksi->query($query);
                    if($proses){
                        //update stok
                        $update = "UPDATE barang SET stoksisa='".$sisa."' WHERE id_barang= '$id_barang' " ;
                        $sql = mysqli_query($koneksi, $update);
                    if ($sql){
                    $_SESSION['pesan'] = 'Tambah';
                    echo "<script> document.location.href='./peminjaman';</script>";
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