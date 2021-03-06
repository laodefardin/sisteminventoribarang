<?php 
$halaman = 'Edit Anggota';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Edit Anggota</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM anggota WHERE id_anggota = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="proseseditanggota.php?id=<?= $_GET['id'];?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" name="namalengkap" id="namalengkap" type="text"
                                            onkeyup="this.value = this.value.toUpperCase()"
                                            value="<?= $data['namalengkap']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Laki-laki"
                                                <?php if($data['gender'] == 'Laki-laki'){echo 'selected';} ?>>Laki-laki
                                            </option>
                                            <option value="Perempuan"
                                                <?php if($data['gender'] == 'Perempuan'){echo 'selected';} ?>>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Telp/Hp</label>
                                        <input class="form-control" name="telp" id="telp" type="text" value="<?= $data['telp'];?>">
                                    </div>

                                    <input class="btn btn-primary" name="tambah" type="submit" value="Update">
                                    <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                        onclick="self.history.back()">
                                    <!-- <button class="btn btn-primary" name="submit" type="submit">
                                    <i class="fa fa-dot-circle-o"></i> Tambah Kelas</button> -->
                                    <!-- <button class="btn btn-danger" type="reset">
                                    <i class="fa fa-ban"></i> Reset</button> -->
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