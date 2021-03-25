<?php 
$halaman = 'Tambah Jurusan';
include "global_header.php"; ?>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><?= $halaman ?></div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="username" id="username" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Jurusan</label>
                                        <input class="form-control" name="nama_lengkap" placeholder='Masukkan nama Singkatan Jurusan dengan huruf kapital CONTOH = TKJ' id="nama_lengkap" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kepala Jurusan</label>
                                        <input class="form-control" name="namakajur" id="namakajur" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <input class="form-control" name="level" id="level" type="text" value="Jurusan"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input class="form-control" name="password" id="password" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Nip Kajur</label>
                                        <input class="form-control" name="nipkajur" id="nipkajur" type="text">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="foto">Ganti Foto User</label>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile"
                                                accept="image/jpeg" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div> -->

                                </div>
                                <div class="form-group form-actions">
                                        <input class="btn btn-primary" type="submit" name='tambah' value="Tambah">
                                        <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                            onclick="self.history.back()">
                                        <!-- <button class="btn btn-primary" name="submit" type="submit">
                                    <i class="fa fa-dot-circle-o"></i> Tambah Kelas</button> -->
                                        <!-- <button class="btn btn-danger" type="reset">
                                    <i class="fa fa-ban"></i> Reset</button> -->
                                
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->

    <?php
            if (isset($_POST['tambah'])){
                $username = $_POST['username'];
                $nama_lengkap = $_POST['nama_lengkap'];
                $level = $_POST['level'];
                $namakajur = $_POST['namakajur'];
                $nipkajur = $_POST['nipkajur'];
                $password = htmlentities(strip_tags(trim($_POST["password"])));
                $passwordbaru = md5(sha1(md5($password)));

                $query = 'INSERT INTO user (username, password, nama_lengkap, nama_kajur, nip_kajur, level, gambar) VALUES ("'.$username.'","'.$passwordbaru.'","'.$nama_lengkap.'", "'.$namakajur.'","'.$nipkajur.'", "'.$level.'","")';

                $proses = $koneksi->query($query);

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';

                    //     $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="hilang">
                    // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    // <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di tambah</h6></div>';
                        echo "<script> document.location.href='./users';</script>";
                    }
                }        
            ?>

</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>