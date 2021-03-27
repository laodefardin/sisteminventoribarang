<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $sql = "SELECT * FROM barang WHERE id_barang = $id";

    $result = $koneksi->query($sql);
    foreach ($result as $data) :
?>
<!-- <img src="./img/barang/<?= $data['gambar']; ?>" style="margin: auto;width: 500px;display: block;"> -->
<img src="./img/barang/<?= $data['gambar']; ?>" style="margin: auto; width: 100%; height: 100%; display: block; ">

<?php endforeach; ?>
<?php } ?>
<?php
$koneksi->close();
?>