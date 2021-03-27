<!DOCTYPE html>
<html>

<head>
    <title>Recap Data Barang</title>
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

        /* a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        } */
    </style>

    <center>
        <h1>Rekap Data Barang<br /></h1>
    </center>

    <table width="98%" border="0" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Merek</th>
            <th>Tahun Pengadaan</th>
            <th>Sumber Pengadaan</th>
            <th>Kondisi Barang</th>
            <th>Unit Awal</th>
            <th>Unit Sisa</th>
            <th>Gambar</th>
        </tr>
        <?php 
		// koneksi database
        include "../../koneksi.php";
        session_start();
        $level = $_SESSION['level'];
        $jurusan = $_SESSION['nama_lengkap'];

        // menampilkan data
        if ($level === 'Administrator'){
            $data = mysqli_query($koneksi, "SELECT * FROM barang");
        }else{
            $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE jurusan = '$jurusan' DESC");
        }
        $no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['kodebarang']; ?></td>
            <td><?= $d['namabarang']; ?></td>
            <td><?= $d['merek']; ?></td>
            <td><?= $d['tahun']; ?></td>
            <td><?= $d['sumberdana']; ?></td>
            <td><?= $d['kondisibarang']; ?></td>
            <td><?= $d['stok']; ?></td>
            <td><?= $d['stoksisa']; ?></td>
            <td>
            <a href="http://smknpapalang.ip-dynamic.com:8980/sib/dashboard/img/barang/<?= $d['gambar']; ?>" target="_blank" rel="noopener noreferrer">Klik Link</a></td>
        </tr>
        <?php 
		}
		?>
    </table>
</body>

</html>