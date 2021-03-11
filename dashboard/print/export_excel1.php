<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjaman Barang</title>
</head>

<body>
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

    <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Peminjaman Barang.xls");
	?>

    <center>
        <h1>Data Peminjaman Barang<br /></h1>
    </center>

    <table border="1">
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

        // menampilkan data
        if ($level === 'Administrator'){
            $data = mysqli_query($koneksi, "SELECT barangkeluar.idbarangkeluar, barangkeluar.id_barang, barangkeluar.jumlah, barangkeluar.jumlah, barangkeluar.tanggal, barangkeluar.status, barangkeluar.keterangan, barang.namabarang, barang.kodebarang, barang.kondisibarang, anggota.telp, anggota.namalengkap FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota");
        }else{
            $data = mysqli_query($koneksi, "SELECT barangkeluar.idbarangkeluar, barangkeluar.id_barang, barangkeluar.jumlah, barangkeluar.jumlah, barangkeluar.tanggal, barangkeluar.status, barangkeluar.keterangan, barang.namabarang, barang.kodebarang, barang.kondisibarang, anggota.telp, anggota.namalengkap FROM barangkeluar INNER JOIN barang ON barangkeluar.id_barang = barang.id_barang INNER JOIN anggota ON barangkeluar.id_anggota = anggota.id_anggota WHERE barangkeluar.jurusan = '$level'");
        }
        $no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['kodebarang']; ?></td>
            <td><?= $d['namabarang']; ?></td>
            <td><?= $d['peminjam']; ?></td>
            <td><?= $d['jumlah']; ?></td>
            <td><?= $d['tanggal']; ?></td>
            <td><?php
            $status = $d['status'];
            if ($status == '1'){
                echo "Sudah Dikembalikan";
            }else{
                echo "Belum Dikembalikan";
            }
            ?></td>
        </tr>
        <?php 
		}
		?>
    </table>
</body>

</html>