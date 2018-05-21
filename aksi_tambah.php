<?php
error_reporting(E_ALL ^ E_NOTICE);
include "koneksi.php";

// file submit.php
// menangkap data yang dikirimkan dari file tambah.php mwnggunakan method = POST

$no_kereta = $_POST['no_kereta'];
$nama_kereta = $_POST['nama_kereta'];
$kelas = $_POST['kelas'];
$stasiun_asal = $_POST['stasiun_asal'];
$stasiun_tujuan = $_POST['stasiun_tujuan'];
$waktu_berangkat = $_POST['waktu_berangkat'];
$waktu_tiba = $_POST['waktu_tiba'];
$harga = $_POST['harga'];


// perintah SQL
$query="INSERT INTO kereta VALUES ('$no_kereta',' $nama_kereta','$kelas','$stasiun_asal','$stasiun_tujuan','$waktu_berangkat','$waktu_tiba','$harga') " ;

$hasil=mysql_query($query);

if ($hasil){
//header ('location:view.php');
echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
 <meta http-equiv='refresh' content='2; url= index1.php'/>  ";
} else { echo "Data gagal disimpan
	<meta http-equiv='refresh' content='2; url= tambah.php'/> ";
}
?>


