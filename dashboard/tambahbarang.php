<?php 
$halaman = 'Tambah Barang';
include "global_header.php";
$level = $_SESSION['level'];
?>

<?php
// mengambil data barang dengan kode paling besar
    if ($level === 'Administrator'){
    $query = mysqli_query($koneksi, "SELECT max(kodebarang) as kodeTerbesar FROM barang");
    $huruf = "BRG";
    }else if ($level === 'TKJ'){
    $query = mysqli_query($koneksi, "SELECT max(kodebarang) as kodeTerbesar FROM barang WHERE jurusan = 'TKJ'");
    $huruf = "TKJ";
    }else if ($level === 'TAV'){
    $query = mysqli_query($koneksi, "SELECT max(kodebarang) as kodeTerbesar FROM barang WHERE jurusan = 'TAV'");
    $huruf = "TAV";
    }else if ($level === 'TKR'){
    $query = mysqli_query($koneksi, "SELECT max(kodebarang) as kodeTerbesar FROM barang WHERE jurusan = 'TKR'");
    $huruf = "TKR";
    }else if ($level === 'TBSM'){
    $query = mysqli_query($koneksi, "SELECT max(kodebarang) as kodeTerbesar FROM barang WHERE jurusan = 'TBSM'");
    $huruf = "TBSM";
    }else if ($level === 'TLAS'){
    $query = mysqli_query($koneksi, "SELECT max(kodebarang) as kodeTerbesar FROM barang WHERE jurusan = 'TLAS'");
    $huruf = "TLAS";
    }else if ($level === 'TPHP'){
    $query = mysqli_query($koneksi, "SELECT max(kodebarang) as kodeTerbesar FROM barang WHERE jurusan = 'TPHP'");
    $huruf = "TPHP";
    }else if ($level === 'DPIB'){
    $query = mysqli_query($koneksi, "SELECT max(kodebarang) as kodeTerbesar FROM barang WHERE jurusan = 'DPIB'");
    $huruf = "DPIB";
    }
	
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
    if($level === 'TKJ' && 'TAV' && 'TKR'){
    $urutan = (int) substr($kodeBarang, 3, 3);
    }else{
        $urutan = (int) substr($kodeBarang, 4, 3);
    }
	

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;

    // membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
    

    
    
    $kodeBarang = $huruf . sprintf("%03s", $urutan);
    
	?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Tambah Barang <?php echo $level ?></div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php 
                                if ($level === 'Administrator' ){ ?>
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <select name="jurusan" id="jurusan" class="form-control">
                                            <option value="TKJ">TKJ</option>
                                            <option value="TAV">TAV</option>
                                            <option value="TPHP">TPHP</option>
                                            <option value="TBSM">TBSM</option>
                                            <option value="TKR">TKR</option>
                                            <option value="TLAS">TLAS</option>
                                            <option value="DPIB">DPIB</option>
                                        </select>
                                    </div>
                                    <?php } else { $level = $_SESSION['level'];?>
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                    <input class="form-control" name="jurusan" id="jurusan" type="text"
                                        value="<?php echo $level ?>" readonly>
                                    <?php } ?>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input class="form-control" name="namabarang" id="nama" type="text"
                                            placeholder="Masukkan Nama Barang">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Kondisi Barang</label>
                                        <input class="form-control" name="kondisibarang" id="harga" type="text"
                                            placeholder="Masukkan kondisi barang">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tahun Pengadaan</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input name="tahun" type="text" class="form-control datetimepicker-input"
                                                data-target="#reservationdate">
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
                                        <label>Kode Barang</label>
                                        <input class="form-control" name="kodebarang" id="kodebarang" type="text"
                                            value="<?php echo $kodeBarang ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Merek</label>
                                        <input class="form-control" name="merek" id="harga" type="text"
                                            placeholder="Masukkan merek barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Unit</label>
                                        <input class="form-control" name="stok" id="stok" type="number"
                                            placeholder="Masukkan jumlah stok">
                                    </div>
                                    <div class="form-group">
                                        <label>Sumber Pengadaan</label>
                                        <select class="form-control select2" name='sumberdana' style="width: 100%;">
                                            <option>Pilih Sumber Pengadaan</option>
                                            <option value='APBN'>APBN</option>
                                            <option value='APBD'>APBD</option>
                                            <option value='DAK'>DAK</option>
                                            <option value='BOS'>BOS</option>
                                            <option value='BOS AFIRMASI'>BOS AFIRMASI</option>
                                            <option value='BOS KINERJA'>BOS KINERJA</option>
                                            <option value='SUMBER LAINNYA'>SUMBER LAINNYA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="foto">Masukkan Foto Barang</label>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile"
                                                accept="image/jpeg" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>

                                    </div>

                                    <div class="form-group form-actions">
                                        <input class="btn btn-primary" name="tambah" type="submit" value="Tambah">
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
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
            <?php
            if (isset($_POST['tambah'])){
                $kodebarang = $_POST['kodebarang'];
                $jurusan = $_POST['jurusan'];
                $namabarang = $_POST['namabarang'];
                $kondisibarang = $_POST['kondisibarang'];
                $merek  = $_POST['merek'];
                $sumberdana = $_POST['sumberdana'];
                $stok = $_POST['stok'];
                $tahun  = $_POST['tahun'];
                $img = $_FILES['foto']['name'];
                $tmp = $_FILES['foto']['tmp_name'];

                $gambar_baru = $level.date('dYHiS').$img;

                $path = "./img/barang/".$gambar_baru;

                if (move_uploaded_file($tmp, $path)){

                    $query = 'INSERT INTO barang (kodebarang, jurusan, namabarang, kondisibarang,sumberdana, merek, stok, stoksisa, tahun, gambar) VALUES ("'.$kodebarang.'","'.$jurusan.'","'.$namabarang.'", "'.$kondisibarang.'","'.$sumberdana.'","'.$merek.'","'.$stok.'","'.$stok.'","'.$tahun.'","'.$gambar_baru.'")';

                    $proses = $koneksi->query($query);

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';

                    //     $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="hilang">
                    // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    // <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di tambah</h6></div>';
                        echo "<script> document.location.href='./barang';</script>";
                    }
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