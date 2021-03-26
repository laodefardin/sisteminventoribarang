<?php 
$halaman = 'Edit Pengguna';
include "global_header.php"; ?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM user WHERE user_id = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="prosesedituser.php?id=<?= $_GET['id'];?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="username" id="username" type="text"
                                            value="<?= $data['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" name="nama_lengkap" id="nama_lengkap" type="text"
                                            value="<?= $data['nama_lengkap']; ?>"
                                            placeholder='Masukkan nama Singkatan Jurusan dengan huruf kapital CONTOH = TKJ'>
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control" name="level" id="level">
                                            <option value="Administrator" <?= $data['level'] == 'Administrator' ? 'selected' : ' ' ?>>Administrator</option>
                                            <option value="Jurusan" <?= $data['level'] == 'Jurusan' ? 'selected' : ' ' ?>>Jurusan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input class="form-control" name="password" id="password" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kepala Jurusan</label>
                                        <input class="form-control" name="namakajur" value='<?= $data['nama_kajur']; ?>'
                                            id="namakajur" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Nip Kajur</label>
                                        <input class="form-control" value='<?= $data['nip_kajur']; ?>' name="nipkajur"
                                            id="nipkajur" type="text">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Konfirmasi Password </label>
                                        <input class="form-control" name="konfirmasipassword" id="konfirmasipassword" type="text">
                                    </div> -->


                                </div>
                                <div class="col-md-4">

                                    <img src="./img/user/<?= $data['gambar']; ?>" style="
    width: 250px;
" alt="">
                                    <div class="form-group">
                                        <label for="foto">Ganti Foto User</label>
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