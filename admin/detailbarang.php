<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $sql = "SELECT * FROM barang WHERE id_barang = $id";

    $result = $koneksi->query($sql);
    foreach ($result as $data) :
?>
<center><img src="./img/barang/<?= $data['gambar']; ?>" style="
    width: 500px;
" alt=""></center>

<?php endforeach; ?>
<?php } ?>
<?php
$koneksi->close();
?>