<?php 
$halaman = 'Edit Barang';
include "global_header.php"; ?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Edit Barang</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM barang WHERE id_barang = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="prosesedit.php?id=<?= $_GET['id'];?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input class="form-control" name="kodebarang" id="kodebarang" type="text"
                                            value="<?= $data['kodebarang']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input class="form-control" name="namabarang" id="nama" type="text"
                                            value="<?= $data['namabarang']; ?>" placeholder="Masukkan Nama Barang">
                                    </div>

                                    <div class="form-group">
                                        <label>Kondisi Barang</label>
                                        <input class="form-control" name="kondisibarang" id="harga" type="text"
                                            value="<?= $data['kondisibarang']; ?>"
                                            placeholder="Masukkan kondisi barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Pengadaan</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input name="tahun" type="text" class="form-control datetimepicker-input"
                                                value="<?= $data['tahun']; ?>" data-target="#reservationdate">
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <!-- <input class="form-control" name="jml_jam" id="jml_jam" type="text"> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Merek</label>
                                        <input class="form-control" name="merek" id="harga" type="text"
                                            value="<?= $data['merek']; ?>" placeholder="Masukkan merek barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Unit Awal</label>
                                        <input class="form-control" name="stok" id="stok" type="number"
                                            value="<?= $data['stok']; ?>" placeholder="Masukkan jumlah stok">
                                    </div>
                                    <div class="form-group">
                                        <label>Unit Sisa</label>
                                        <input class="form-control" name="stoksisa" id="stok" type="number"
                                            value="<?= $data['stoksisa']; ?>" placeholder="Masukkan jumlah stok">
                                    </div>
                                    <div class="form-group">
                                        <label>Sumber Pengadaan</label>
                                        <select class="form-control select2" name='sumberdana' style="width: 100%;">
                                            <option>Pilih Sumber Pengadaan</option>
                                            <option value='APBN' <?= $data['sumberdana'] == 'APBN' ? 'selected' : ' ' ?>>APBN</option>
                                            <option value='APBD' <?= $data['sumberdana'] == 'APBD' ? 'selected' : ' ' ?>>APBD</option>
                                            <option value='DAK' <?= $data['sumberdana'] == 'DAK' ? 'selected' : ' ' ?>>DAK</option>
                                            <option value='BOS' <?= $data['sumberdana'] == 'BOS' ? 'selected' : ' ' ?>>BOS</option>
                                            <option value='BOS AFIRMASI' <?= $data['sumberdana'] == 'BOS AFIRMASI' ? 'selected' : ' ' ?>>BOS AFIRMASI</option>
                                            <option value='BOS KINERJA' <?= $data['sumberdana'] == 'BOS KINERJA' ? 'selected' : ' ' ?>>BOS KINERJA</option>
                                            <option value='SUMBER LAINNYA' <?= $data['sumberdana'] == 'SUMBER LAINNYA' ? 'selected' : ' ' ?>>SUMBER LAINNYA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <img src="./img/barang/<?= $data['gambar']; ?>" style=" width: 100px;" alt="">
                                    <div class="form-group">
                                        <label for="foto">Ganti Foto Barang</label>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile"
                                                accept="image/jpeg">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>

                                    </div>

                                    <div class="form-group form-actions">
                                        <input class="btn btn-primary" type="submit" value="Update">
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