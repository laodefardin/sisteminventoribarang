<!DOCTYPE html>
<html>

<head>
    <title>Data Pengembalian Barang</title>
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
        <h1>Data Pengembalian Barang<br /> </h1>
    </center>

    <table width="98%" border="0" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Nama Peminjam</th>
            <th>Jumlah Unit</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
        </tr>
                <?php 
        // koneksi database
        include "../../koneksi.php";
		session_start();
        $level = $_SESSION['level'];

		// menampilkan data
		if ($level === 'Administrator'){
$query = mysqli_query($koneksi, "SELECT barangmasuk.*, 
barang.id_barang, 
barang.namabarang, 
barangkeluar.idbarangkeluar, 
barangkeluar.tanggal, 
barangkeluar.status,
barang.kodebarang 
FROM barangmasuk 
INNER JOIN barang ON 
barangmasuk.id_barang=barang.id_barang 
INNER JOIN barangkeluar ON 
barangkeluar.idbarangkeluar=barangmasuk.idbarangkeluar 
WHERE barangkeluar.status=1");  
}else{
$query = mysqli_query($koneksi, "SELECT barangmasuk.*, 
barang.id_barang, 
barang.namabarang, 
barangkeluar.idbarangkeluar, 
barangkeluar.tanggal, 
barangkeluar.status,
barang.kodebarang 
FROM barangmasuk 
INNER JOIN barang ON 
barangmasuk.id_barang=barang.id_barang 
INNER JOIN barangkeluar ON 
barangkeluar.idbarangkeluar=barangmasuk.idbarangkeluar 
WHERE barangkeluar.status=1 AND barangkeluar.jurusan = '$level'");
}
		$no = 1;
		while($d = mysqli_fetch_array($query)){
		?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['kodebarang']; ?></td>
            <td><?= $d['namabarang']; ?></td>
            <td><?= $d['peminjam']; ?></td>
            <td><?= $d['jumlah']; ?></td>
            <td><?= $d['tanggal']; ?></td>
            <td><?= $d['tanggal_kembali']; ?></td>
        </tr>
        <?php 
		}
		?>
    </table>
</body>

</html>