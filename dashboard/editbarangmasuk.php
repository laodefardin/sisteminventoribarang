<?php 
$halaman = 'Edit Barang Masuk';
include "global_header.php"; ?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Edit Barang Masuk</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM barangmasuk WHERE idbarangmasuk = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="proseseditmasuk.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Kode Barang </label>
                                        <select class="form-control" name="kodebarang" id="kodebarang">
                                            <option>Pilih Kode Barang </option>
                                            <?php
                                            
                                            $sql = $koneksi->query("SELECT * FROM barang");
                                            foreach ($sql as $data1) :
                                            if ($data['kodebarang'] == $data1['kodebarang']){
                                                $select = "selected";
                                            }else{
                                                $select="";
                                            }
                                            echo "<option value='$data1[kodebarang]' $select>".$data1['kodebarang'].' - '.$data1['namabarang']."</option>";
                                            ?>
                                            <?php
                                                endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input class="form-control" name="jumlah" id="jumlah" type="number" value="<?= $data['jumlah']; ?>"
                                            placeholder="Masukkan jumlah Barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Peminjam</label>
                                        <input class="form-control" name="peminjam" id="peminjam" type="text" value="<?= $data['peminjam']; ?>"
                                            placeholder="Peminjam">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input name="tahun" type="text" class="form-control datetimepicker-input" value="<?= $data['tanggal']; ?>"
                                                data-target="#reservationdate">
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <!-- <input class="form-control" name="jml_jam" id="jml_jam" type="text"> -->
                                    </div>
                                    <div class="form-group form-actions">
                                        <input class="btn btn-primary" name="tambah" type="submit" value="Update Barang Masuk">
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