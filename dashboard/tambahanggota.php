<?php 
$halaman = 'Tambah Anggota';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Tambah Anggota</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" name="namalengkap" id="namalengkap" type="text" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Telp/Hp</label>
                                        <input class="form-control" name="telp" id="telp" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="username" id="username" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="password" id="password" type="text">
                                    </div>

                                <input class="btn btn-primary" name="tambah" type="submit" value="Tambah">
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
            <?php
            if (isset($_POST['tambah'])){
                $namalengkap = $_POST['namalengkap'];
                $gender = $_POST['gender'];
                $telp  = $_POST['telp'];
                $username = $_POST['username'];
                $password = htmlentities(strip_tags(trim($_POST["password"])));
                $passwordbaru = md5(sha1(md5($password)));

                    $query = 'INSERT INTO anggota (namalengkap, username, password, gender, telp, gambar) VALUES ("'.$namalengkap.'","'.$username.'","'.$passwordbaru.'","'.$gender.'","'.$telp.'","")';
                    $proses = $koneksi->query($query);

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                    //     $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="hilang">
                    // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    // <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di tambah</h6></div>';
                        echo "<script> document.location.href='./anggota';</script>";
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