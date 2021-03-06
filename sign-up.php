<?php
//buat koneksi ke mysql dari file config.php
if (isset($_POST["submit"])) {
  // form telah disubmit, proses data
  // ambil nilai form
    $namalengkap = htmlentities(strip_tags(trim($_POST["namalengkap"])));
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $telp = htmlentities(strip_tags(trim($_POST["telp"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));
    $konfirpassword = htmlentities(strip_tags(trim($_POST["konfirpassword"])));
    $jeniskelamin = htmlentities(strip_tags(trim($_POST["jeniskelamin"])));

    include ('koneksi.php');
    session_start();
    $username = $koneksi->escape_string($username);
    $password = $koneksi->escape_string($password);
    $password_sha1 = md5(sha1(md5($password)));
    
    if ($namalengkap && $username && $telp && $password && $konfirpassword && $jeniskelamin){
        if($password == $konfirpassword){
            $cek = $koneksi->query("SELECT * FROM anggota WHERE telp='$telp'");
            $num = $cek->num_rows;

            if($num == 0){
                $insert = "INSERT INTO anggota (namalengkap, username, password, gender, telp) VALUES ('$namalengkap', '$username', '$password_sha1', '$jeniskelamin', '$telp')";
                $proses = $koneksi->query($insert);

                if ($proses){
                    $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                    Selamat... Anda berhasil Register! Silahkan Login <a href="index">Disini</a>
                    </div>';
                }else{
                    $_SESSION['pesan'] = '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                    Gagal melakukan Register, coba lagi!
                    </div>';
                }
            }else{
                $_SESSION['pesan'] = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                No Hp Akun sudah terdaftar, Silahkan Login <a href="login-guru">Disini</a>
                </div>';
            }
        }else{
            $_SESSION['pesan'] = '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
            Ulangi Password yang sama
            </div>';
        }
    }else{
        $_SESSION['pesan'] = '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        Semua Kolom Wajib Anda Diisi
        </div>';
    }
}else{
$namalengkap = "";
$telp = "";
$username = "";
$password = "";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Peminjaman Barang</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>
<style>
    #iconeye {
        cursor: pointer;
    }
</style>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="index"><b>Data Pokok Peralatan </b>SMKN 1 PAPALANG</a>
        </div>

        <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo $pesan = $_SESSION['pesan'];
                    
                }
                //mengatur session pesan menjadi kosong
                $_SESSION['pesan'] = '';
                ?>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Buat Akun Untuk Guru</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap"  value="<?= $namalengkap ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" name="telp" class="form-control" placeholder="Nomor HandPhone" value="<?= $telp ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-plus-square"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $username ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="konfirpassword" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group-append">
                        <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <a href="index" class="text-center">Saya Sudah memiliki Akun</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>