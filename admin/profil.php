<?php 
$halaman = 'profil';
include "global_header.php"; 
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    
    $update = "UPDATE user SET 
    nama_lengkap = '$nama',
    username     = '$username',
    level        = '$level'
    WHERE user_id = '$_SESSION[id_user]'";

    mysqli_query($koneksi, $update) or die (mysqli_error());
}
?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="card">
                <?php
                $profil = $koneksi->query("SELECT * FROM user WHERE user_id = '".$_SESSION['id_user']."'");
                foreach ($profil as $data){
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-sm-2 " align="center" style="margin-bottom: 25px">
                            <?php
            $foto = $data["gambar"];
            if($foto===''){?>
                            <img style="height: 200px" src="../img/anonim.png">
                            <?php } else {?>
                            <img style="height: 200px" src="./img/user/<?php echo $data['gambar']; ?>"> <?php }; ?>
                            <center><a href="uploadfoto" class="btn btn-primary btn-xs" role="button">Ganti Foto</a>
                            </center>
                        </div>

                        <div class="col-md-9">
                            <form action="" method="post" class="form-horizontal"
                                enctype="multipart/form-data">
                                <div class="row" style="margin-bottom: 15px;">
                                    <span class="col-lg-2">Nama Lengkap</span>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value='<?php echo $data['nama_lengkap']; ?>'
                                            placeholder="contoh : Masukkan nama anda">
                                    </div>
                                    <span class="col-lg-2">Username</span>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="<?php echo $data['username']; ?>">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 15px;">
                                    <span class="col-lg-2">Level</span>
                                    <div class="col-lg-4">
                                        <select class="form-control select2" name="level" id="level" readonly>
                                            <option value="Administrator" <?php if($data['level'] == 'Administrator'){echo 'selected';} ?>>Administrator</option>
                                            <option value="Karyawan" <?php if($data['level'] == 'Karyawan'){echo 'selected';} ?>>Karyawan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" name="submit" class="btn btn-success btn-md pull-right"><i
                                            class="fa fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
                <?php }?>

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