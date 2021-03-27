<?php 
$halaman = 'Data Sekolah';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {

                    $pesan = $_SESSION['pesan'];

                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                //mengatur session pesan menjadi kosong

                $_SESSION['pesan'] = '';
                // unset($_SESSION['pesan']);
                // $cetak_pesan = '';
                ?>

                <div class="card">
                    <div class="card-header"><?= $halaman ?></div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM datasekolah WHERE id_sekolah  = '1'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nama Sekolah</label>
                                        <input class="form-control" name="namasekolah" id="namasekolah" type="text" value="<?= $data['nama_sekolah']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Provinsi Sekolah</label>
                                        <textarea class="form-control" name="provinsi" id="provinsi" cols="10" rows="3"><?= $data['provinsi']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Program Keahlian Sekolah</label>
                                        <textarea class="form-control" name="program" id="program" cols="10" rows="5"><?= $data['program']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="foto">Ganti Foto Barang</label>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <img src="../img/<?= $data['logo']; ?>" style="width: 100%;margin-top: 20px;padding: 50px;border: 1px solid #d6d6d6;" alt="logo sekolah">
                                    </div>
                                </div>

                            </div>
                            <input class="btn btn-primary" name="tambah" type="submit" value="Update">
                            <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                onclick="self.history.back()">
                        </form>
                        <?php }} ?>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->
    </div>

<?php
if (isset($_POST['tambah'])){
$namasekolah = $_POST['namasekolah'];
$img = $_FILES['foto']['name'];
if(empty($img)){
    $update = "UPDATE datasekolah SET nama_sekolah='".$namasekolah."' WHERE id_sekolah = '1' ";

    $sql = mysqli_query($koneksi, $update);
    $_SESSION['pesan'] = 'Ubah';
    // $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="hilang">
    //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    //                 <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di Ubah</h6></div>';
    echo "<script> document.location.href='./datasekolah';</script>";
}else{
    $query = $koneksi->query("SELECT * FROM datasekolah WHERE id_sekolah = '1' ");
    $data = mysqli_fetch_array($query);
    $lokasi = $data['logo'];
    $hapus_gbr = "../img/".$lokasi;
    unlink($hapus_gbr);

    move_uploaded_file($_FILES['foto']['tmp_name'], '../img/'.$img);

    $update = "UPDATE datasekolah SET nama_sekolah = '".$namasekolah."', logo = '".$img."' WHERE id_sekolah = '1' ";
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./datasekolah';</script>";
}
}
?>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>