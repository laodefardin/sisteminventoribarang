<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjaman Barang</title>
</head>

<body onload="window.print()">
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            /* margin: 20px auto; */
            border-collapse: collapse;
        }

        table th,
        table td {
            /* border: 1px solid #3c3c3c; */
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <table width=100%>
    <?php
        include ('../../koneksi.php');
        $query = $koneksi->query("SELECT * FROM datasekolah WHERE id_sekolah  = '1'");
        foreach ($query as $data) {
        ?>
        <tr>
            <td align="center" rowspan='3' width='88px'><img width='90px' src='../../img/<?= $data['logo'] ?>'>
            </td>
        </tr>
        <tr>
            <td align="center"><text style='margin-bottom:-5px; font-family: initial; font-size:15px'
                    align=center><?= $data['provinsi'] ?></text> <br> <b style='font-size:25px; text-transform: uppercase;' ><?= $data['nama_sekolah'] ?> </b> <br> <text
                    style='font-family: initial; font-size:11px'><?= $data['program'] ?></text></td>
            <td align="center" rowspan='3' width='88px'></td>
        </tr>
        <?php } ?>
        <!-- <tr>
    <td align="center"><h6  style='margin-bottom:-23px' align=center> Alamat : Jl. Dg. Tata Raya Parang Tambung Makassar 90224 Telp : (0411) 861935 – 861507</h6></td>
</tr> -->
    </table>
    <hr>
    <center>
        <h3>Bukti Peminjaman Barang
            <br /><br /><br /></h3>

    </center>

    <table width="98%" border="1" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <?php 
		// koneksi database
        require_once('../../assets/bacadata/phpqrcode/qrlib.php'); 
        include "../../koneksi.php";
        
        $id = $_GET['id'];
        $level = $_SESSION['level'];
        $nama_lengkap = $_SESSION['nama_lengkap'];
        $jurusan = $_SESSION['nama_lengkap'];

        // menampilkan data
        if ($level === 'Administrator'){
            $query = "SELECT barangkeluar.*, barang.*, anggota.* FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota WHERE idbarangkeluar = '$id'";
            $data = mysqli_query($koneksi,$query);
        }elseif ($level === 'GURU') {
            $query = "SELECT barangkeluar.*, barang.*, anggota.* FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota WHERE idbarangkeluar = '$id'";
            $data = mysqli_query($koneksi,$query);
        }else{
            $query = "SELECT barangkeluar.*, barang.*, anggota.* FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota WHERE barangkeluar.jurusan = '$jurusan' AND idbarangkeluar = '$id'";
            $data = mysqli_query($koneksi,$query);
        }
        $no = 1;
		while($d = mysqli_fetch_array($data)){
		?>

        <tr>
            <td><strong>Hari & Tanggal Peminjaman</strong></td>
            <td><?= $d['tanggal']; ?></td>
        </tr>
        <tr>
            <td><strong>Nama Peminjam</strong></td>
            <td><?= $d['namalengkap']; ?></td>
        </tr>
        <tr>
            <td><strong>No HP</strong></td>
            <td><?= $d['telp']; ?></td>
        </tr>
        <tr>
            <td><strong>Tujuan</strong></td>
            <td><?= $d['tujuan']; ?></td>
        </tr>
        <tr>
            <td style="width: 250px;"><strong>Perlengkapan yang dipinjam & kondisi</strong> <em>(Jumlah, Deskripsi &
                    Kondisi)</em></td>
            <td>Nama : <?= $d['namabarang']; ?> <br><br>
                Kode Barang : <?= $d['kodebarang']; ?> <br><br>
                Jumlah : <?= $d['jumlah']; ?> <br><br>
                Kondisi : <?= $d['kondisibarang']; ?><br><br>
                Deskirpsi : <?= $d['keterangan']; ?><br><br>
            </td>
        </tr>


        <!-- 
        
        <tr>
            <td><?= $no++; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php
            $status = $d['status'];
            if ($status == '1'){
                echo "Sudah Dikembalikan";
            }else{
                echo "Belum Dikembalikan";
            }
            ?></td>
        </tr> -->


    </table>
    <br>

    <em>Peminjam setuju untuk mengembalikan semua pinjaman setelah kerja sama berakhir atau diputuskan dari satu atau
        kedua belah pihak dalam keadaan baik. Peminjam menyanggupi penggantian bila terjadi kehilangan dan
        kerusakan.</em>
    <br> <br> <br>

    <table width="98%" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <tr>
            <td><br></td>
            <td style="padding-left: 200px;"> Papalang, <?= $d['tanggal']; ?></td>
        </tr>
        <tr>
            <td><br></td>
            <td style="padding-left: 200px;"> Mengetahui :</td>
        </tr>
        <tr>
            <td> <strong>Peminjam</strong></td>
            <?php
            if ($level === 'Administrator') { ?>
            <td style="padding-left: 200px;"><strong>Administrator</strong></td>
            <?php }else{  ?>
            <td style="padding-left: 200px;"><strong>Kepala Jurusan </strong></td>
            <?php } ?>
        </tr>
        <tr>
            <td>
            <?php
            $nama_file = $d['jurusan'].$d['tanggal'].$d['namalengkap'];
            $qrvalue = "Tanggal".' '.$d['tanggal'].' '.$d['namalengkap'].' Telah meminjam barang di Lab '.$d['jurusan'].' Nama Barang : '.$d['namabarang']. 'Jumlah : '.$d['jumlah'].' Kondisi Barang : '.$d['kondisibarang'].' Tujuan Peminjaman : '.$d['tujuan'];
            $tempDir = "../../assets/bacadata/pdfqrcodes/"; 
            $codeContents = $qrvalue; 
            $fileName = $nama_file.'.png'; 
            $pngAbsoluteFilePath = $tempDir.$fileName; 
            $urlRelativeFilePath = $tempDir.$fileName; 
            if (!file_exists($pngAbsoluteFilePath)) { 
                QRcode::png($codeContents, $pngAbsoluteFilePath); 
            }
            ?>
            <img src="<?php echo $tempDir.$nama_file.'.png' ?> " style="width: 100px;">
            <br>
            </td>

            <td style="padding-left: 200px;">
            
            <?php
            $sql = $koneksi->query("SELECT * FROM user WHERE nama_lengkap = '$d[jurusan]'");
            $akun1 = $sql->fetch_assoc();   
            $nama_file1 = $d['jurusan'].$d['tanggal'].$akun1['nama_kajur'];
            $qrvalue1 = 'Kepala Jurusan '.$akun1['nama_lengkap'].':'.$akun1['nama_kajur'];
            $tempDir1 = "../../assets/bacadata/pdfqrcodes/"; 
            $codeContents1 = $qrvalue1; 
            $fileName = $nama_file1.'.png'; 
            $pngAbsoluteFilePath1 = $tempDir1.$fileName; 
            $urlRelativeFilePath1 = $tempDir1.$fileName; 
            if (!file_exists($pngAbsoluteFilePath1)) { 
                QRcode::png($codeContents1, $pngAbsoluteFilePath1); 
            }
            ?>
            <img src="<?php echo $tempDir1.$nama_file1.'.png' ?> " style="width: 100px;">
            <br>
            </td>
            <br></td>
            <td style="padding-left: 200px;"><br></td>
        </tr>
        <tr>
            <td><?= $d['namalengkap']; ?></td>
            <?php
            $sql = $koneksi->query("SELECT * FROM user");
            $akun = $sql->fetch_assoc();
            $h = $akun['nama_lengkap'];
            $j =  $d['jurusan'];

            if($j === 'Administrator'){ ?>
            <td style="padding-left: 200px;"><?= $nama_lengkap; ?></td>

            <?php }else{
             $sql = $koneksi->query("SELECT * FROM user WHERE nama_lengkap = '$j'");
            $akun1 = $sql->fetch_assoc();    
                ?>
            <td style="padding-left: 200px;"><?= $akun1['nama_kajur']; ?></td>
            <?php } ?>

        </tr>
        <tr>
            <td></td>
            <?php
            $sql = $koneksi->query("SELECT * FROM user");
            $akun = $sql->fetch_assoc();
            $h = $akun['nama_lengkap'];
            $j =  $d['jurusan'];

            if($j === 'Administrator'){ ?>
            <td style="padding-left: 200px;"><?= $nama_lengkap; ?></td>

            <?php }else{
             $sql = $koneksi->query("SELECT * FROM user WHERE nama_lengkap = '$j'");
            $akun1 = $sql->fetch_assoc();    
                ?>
            <!-- <td style="padding-left: 200px;">Nip.<?= $akun1['nip_kajur']; ?></td> -->
            <?php } ?>

        </tr>

    </table><br>

    <?php 
		}
		?>
</body>

</html>