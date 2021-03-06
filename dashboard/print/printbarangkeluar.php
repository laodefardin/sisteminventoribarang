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
        <tr>
            <td align="center" rowspan='3' width='88px'><img width='90px' src='../../img/SMK-Papalang Transparan.png'>
            </td>
        </tr>
        <tr>
            <td align="center"><text style='margin-bottom:-5px; font-family: initial; font-size:15px'
                    align=center>PEMERINTAH PROVINSI SULAWESI BARAT<br> DINAS PENDIDIKAN DAN KEBUDAYAAN </text> <br> <b
                    style='font-size:25px'>SMK NEGERI 1 PAPALANG </b> <br> <text
                    style='font-family: initial; font-size:11px'> PROGRAM KEAHLIAN: TEKNIK ELEKTRONIKA, TEKNIK MESIN,
                    TEKNIK OTOMOTIF, TEKNIK KOMPUTER DAN INFORMATIKA, DAN AGRIBISNIS HASIL PERTANIAN, DESAIN PEMODELAN
                    DAN INFORMASI BANGUNAN </text></td>
            <td align="center" rowspan='3' width='88px'></td>
        </tr>
        <!-- <tr>
    <td align="center"><h6  style='margin-bottom:-23px' align=center> Alamat : Jl. Dg. Tata Raya Parang Tambung Makassar 90224 Telp : (0411) 861935 – 861507</h6></td>
</tr> -->
    </table>
    <hr>
    <center>
        <h3>Form Peminjaman Barang
            <br /><br /><br /></h3>

    </center>

    <table width="98%" border="1" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <?php 
		// koneksi database
        include "../../koneksi.php";
        session_start();
        $id = $_GET['id'];
        $level = $_SESSION['level'];
        $nama_lengkap = $_SESSION['nama_lengkap'];

        // menampilkan data
        if ($level === 'Administrator'){
            $data = mysqli_query($koneksi,"SELECT barangkeluar.*, barang.*, anggota.* FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota WHERE idbarangkeluar = '$id'");
        }elseif ($level === 'GURU') {
            $data = mysqli_query($koneksi,"SELECT barangkeluar.*, barang.*, anggota.* FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota WHERE idbarangkeluar = '$id'");
        }else{
            $data = mysqli_query($koneksi,"SELECT barangkeluar.*, barang.*, anggota.* FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota WHERE barangkeluar.jurusan = '$level' AND idbarangkeluar = '$id'");
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

    <table width="70%" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
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
            <td style="padding-left: 200px;"><strong>Kepala Lab</strong></td>
            <?php } ?>
        </tr>
        <tr>
            <td><br></td>
            <td style="padding-left: 200px;"><br></td>
        </tr>
        <tr>
            <td><br></td>
            <td style="padding-left: 200px;"><br></td>
        </tr>
        <tr>
            <td><br></td>
            <td style="padding-left: 200px;"><br></td>
        </tr>
        <tr>
            <td><u><?= $d['namalengkap']; ?></u></td>
            <?php
            $sql = $koneksi->query("SELECT * FROM user");
            $akun = $sql->fetch_assoc();
            $h = $akun['nama_lengkap'];
            $j =  $d['jurusan'];

            if($j === 'Administrator'){ ?>
            <td style="padding-left: 200px;"><u>( <?= $nama_lengkap; ?> )</u></td>

            <?php }else{
             $sql = $koneksi->query("SELECT * FROM user WHERE level = '$j'");
             $akun1 = $sql->fetch_assoc();    
                ?>
            <td style="padding-left: 200px;"><u>( <?= $akun1['nama_lengkap']; ?> )</u></td>
            <?php } ?>

        </tr>

    </table><br>

    <?php 
		}
		?>
</body>

</html>