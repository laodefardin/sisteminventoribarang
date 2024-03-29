<?php
//buat koneksi ke mysql dari file config.php
if (isset($_POST["submit"])) {
  // form telah disubmit, proses data
  // ambil nilai form
  $username = htmlentities(strip_tags(trim($_POST["username"])));
  $password = htmlentities(strip_tags(trim($_POST["password"])));

  // siapkan variabel untuk menampung pesan error
  // $pesan_error = "";

  // //cek apakah username sudah diisi atau tidak
  // if (empty($username)) {
  //   $pesan_error .= "Username belum diisi <br>";
  // }

  // //cek apakah password sudah diisi atau tidak
  // if (empty($password)) {
  //   $pesan_error .= "Password belum diisi <br>";
  // }
  include("koneksi.php");
  session_start();
//filter dengan mysqli_real_escape_string
  $username = $koneksi->escape_string($username);
  $password = $koneksi->escape_string($password);

//generate hashing
  $password_sha1 = md5(sha1(md5($password)));
//   $password_sha1 = sha1($password);
  
// cek apakah username dan password ada di tabel 
  $query = "SELECT * FROM anggota WHERE username = '$username' AND password = '$password_sha1'";
  $result = $koneksi->query($query);
  $row = $result->num_rows;
  $sql = $koneksi->query("SELECT * FROM anggota WHERE username = '$username'");
  $akun = $sql->fetch_assoc();

  if ($row > 0 ){ // jika data ada
    $akun = $result->fetch_assoc();
     // bebaskan memory 
    mysqli_free_result($result);
    
      // tutup koneksi dengan database MySQL
    mysqli_close($koneksi);
    $_SESSION["username"] = $akun["username"];
    $_SESSION['nama_lengkap'] = $akun['namalengkap'];
    $_SESSION["level"] = "GURU";
    // $_SESSION["id_user"] = $akun['user_id'];
    $_SESSION['gambar'] = $akun['gambar'];
    $_SESSION['id_anggota'] = $akun['id_anggota'];

    // $level = $akun["level"];

        echo "<script> document.location.href='dashboard/index'; </script>";

  }else{
    $_SESSION['pesan'] = '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
    Username dan Password Tidak ditemukan
    </div>';
 }
}
else{
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

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
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
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Login Guru disini.</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="username" class="form-control" placeholder="Username" name="username" id="username"
                            value="<?php echo $username ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password"
                            value="<?php echo $password ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="iconeye" onclick="show()">
                                    <i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="text-center text-muted mt-3">
                    Belum mempunyai akun? <a href="./sign-up" tabindex="-1">Sign up</a>
                </div>
                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="daftarbarang" class="btn btn-block btn-danger btn-sm">
                        Lihat Daftar Barang
                    </a>
                </div>
<!--                 
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <script>
        function show() {
            var nilai = document.getElementById('password').type;
            if (nilai == 'password') {
                document.getElementById('password').type = 'text';
                document.getElementById('iconeye').innerHTML = '<i class= "fas fa-eye-slash"></i>';
            } else {
                document.getElementById('password').type = 'password';
                document.getElementById('iconeye').innerHTML = '<i class= "fas fa-eye"></i>';
            }
        }
    </script>
</body>

</html>