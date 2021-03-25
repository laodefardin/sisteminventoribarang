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
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
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

    <center>
        <h1>Data Peminjaman Barang<br /></h1>
    </center>

    <table width="98%" border="0" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Nama Peminjam</th>
            <th>Jumlah Unit</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
        </tr>
        <?php 
		// koneksi database
        include "../../koneksi.php";
        session_start();
        $level = $_SESSION['level'];
        $jurusan = $_SESSION['nama_lengkap'];

        // menampilkan data
        if ($level === 'Administrator'){
            $data = mysqli_query($koneksi, "SELECT barangkeluar.idbarangkeluar, barangkeluar.id_barang, barangkeluar.jumlah, barangkeluar.jumlah, barangkeluar.tanggal, barangkeluar.status, barangkeluar.keterangan, barang.namabarang, barang.kodebarang, barang.kondisibarang, anggota.telp, anggota.namalengkap FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota");
        }else{
            $data = mysqli_query($koneksi, "SELECT barangkeluar.idbarangkeluar, barangkeluar.id_barang, barangkeluar.jumlah, barangkeluar.jumlah, barangkeluar.tanggal, barangkeluar.status, barangkeluar.keterangan, barang.namabarang, barang.kodebarang, barang.kondisibarang, anggota.telp, anggota.namalengkap FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota WHERE barangkeluar.jurusan = '$jurusan'");
        }
        $no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['kodebarang']; ?></td>
            <td><?= $d['namabarang']; ?></td>
            <td><?= $d['namalengkap']; ?></td>
            <td><?= $d['jumlah']; ?></td>
            <td><?= $d['tanggal']; ?></td>
            <td><?php
            $status = $d['status'];
            if ($status == '1'){
                echo "Sudah Dikembalikan";
            }elseif($status == '2'){
                echo "barang belum diambil";
            }elseif($status == '0'){
                echo "belum dikembalikan";
            }
            ?></td>
        </tr>
        <?php 
		}
		?>
    </table>
</body>

</html>