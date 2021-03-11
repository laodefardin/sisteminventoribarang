<?php
 $dbhost = 'localhost';  //host untuk database, biasanya localhost
 $dbuser = 'root';  //username untuk mengakses database, jika dilokal biasanya 'root'
 $dbpass = '';  //password untuk mengakses databae, jika dilokal biasanya kosong
<<<<<<< HEAD
 $dbname = 'sistembarangg';  //nama database yang akan digunakan
=======
 $dbname = 'sistembarang';  //nama database yang akan digunakan
>>>>>>> 2103ebba7c57f97a4cafc6141fc3f352df6089da


 $koneksi = new mysqli($dbhost,$dbuser,$dbpass,$dbname) ;  //koneksi Database

 //Check koneksi, berhasil atau tidak
if( $koneksi->connect_errno ){
echo "Oops!! Koneksi Gagal!".$koneksi->connect_error;
}

// function query($query)
// {
//     global $koneksi;
//     $result = mysqli_query($koneksi, $query);
//     $row = [];
//     while ($row = mysqli_fetch_assoc($result)){
//         $rows[] = $row;
//     }
//     return $rows;
// }
// ?>