<?php 
$halaman = 'Edit Barang Keluar';
include "global_header.php"; 
?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Edit Barang Keluar</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM barangkeluar INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota WHERE idbarangkeluar = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="proseseditkeluar.php?id=<?php echo $_GET['id'];?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Kode Barang & Nama Barang</label>
                                        <select class="form-control" name="id_barang" id="id_barang">
                                            <option>Pilih Kode Barang </option>
                                            <?php
                                            
                                            $sql = $koneksi->query("SELECT * FROM barang");
                                            foreach ($sql as $data1) :
                                            if ($data['id_barang'] == $data1['id_barang']){
                                                $select = "selected";
                                            }else{
                                                $select="";
                                            }
                                            echo "<option value='$data1[id_barang]' $select>".$data1['kodebarang'].' - '.$data1['namabarang']."</option>";
                                            ?>
                                            <?php
                                                endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Unit</label>
                                        <input class="form-control" name="jumlah" id="jumlah" type="text"
                                            value="<?= $data['jumlah']; ?>" placeholder="Masukkan jumlah Barang" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Peminjam</label>
                                        <select class="form-control" name="peminjam" id="peminjam" readonly>
                                            <option value="<?= $data['id_anggota']?>"><?= $data['namalengkap']?></option>
                                        </select>
                                        <!-- <input class="form-control" name="peminjam" id="peminjam" type="text"
                                            placeholder="Peminjam"> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Tujuan</label>
                                        <textarea class="form-control" name="tujuan" id="tujuan" cols="30" rows="2"><?= $data['tujuan']?></textarea>
                                        <!-- <input class="form-control" name="jml_jam" id="jml_jam" type="text"> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Peminjaman</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input name="tahun" type="text" class="form-control datetimepicker-input"
                                                value="<?= $data['tanggal']; ?>" data-target="#reservationdate">
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <!-- <input class="form-control" name="jml_jam" id="jml_jam" type="text"> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Status Peminjaman</label>
                                        <select class="form-control" name="status" id="status">
                                        <option value="2" <?= $data['status'] == 2 ? 'selected' : ' ' ?>>barang belum diambil</option>
                                            <option value="1" <?= $data['status'] == 1 ? 'selected' : ' ' ?>>Sudah Dikembalikan</option>
                                            <option value="0" <?= $data['status'] == 0 ? 'selected' : ' ' ?>>Belum Dikembalikan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"><?=$data['keterangan'];?></textarea>
                                    </div>
                                    <div class="form-group form-actions">
                                        <input class="btn btn-primary" name="tambah" type="submit"
                                            value="Update Barang Keluar">
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
                        <?php }} ?>
                    </div>
                </div>
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