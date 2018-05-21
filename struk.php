<?php
 Include ("koneksi.php");
 $no_ka=$_GET['no_kereta'];
 $selectkereta = "SELECT * FROM kereta WHERE no_kereta='$no_ka'"; 
 $resultselectkereta = mysql_query($selectkereta) or die ('Error, load data kereta failed.'.mysql_error()); 
 $rowkereta = mysql_fetch_assoc($resultselectkereta);
 
 $no_penumpang=$_GET['no_identitas'];
 $selectpenumpang = "SELECT * FROM penumpang WHERE no_identitas='$no_penumpang'" ;
 $resultselectpenumpang = mysql_query($selectpenumpang) or die ('error, load data tiket failed.' . mysql.error());
 $rowpenumpang = mysql_fetch_assoc($resultselectpenumpang);
?>
<!DOCTYPE html>
<html>
<head> <title> Struk Pemesanan Tiket </title> </head>
<body>
 <form method="post">
 <fieldset>
 <h1 align="center"><font face='Arial'>PT. KERETA API INDONESIA (PERSERO)</h1>
 <h2 align="center">Struk Pemesanan Tiket Kereta Api</h2>
 <table width="60%" align='center' border='0'>
  <tr>
    <td colspan="7">=========================================================================================</td>
  </tr>
  
  <tr>
    <td>No. Kereta</td>
    <td>:</td>
    <td><?php echo $rowkereta['no_kereta']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Tanggal Pemesanan</td>
    <td>:</td>
    <td><?php echo date ("d M y");?></td>
  </tr>
  
  <tr>
    <td>Nama Kereta</td>
    <td>:</td>
    <td><?php echo $rowkereta['nama_kereta']; ?></td>
    <td width="150" align="center"> | </td>
    <td>No. Identitas</td>
    <td>:</td>  
    <td><?php echo $rowpenumpang['no_identitas']; ?></td>
  </tr>
  
  <tr>
    <td>Kelas</td>
    <td>:</td>
    <td><?php echo $rowkereta['kelas']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Nama Penumpang</td>
    <td>:</td>
    <td><?php echo $rowpenumpang['nama_penumpang']; ?></td>
  </tr>
  
  <tr>
    <td>Stasiun Asal</td>
    <td>:</td>
    <td><?php echo $rowkereta['stasiun_asal']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $rowpenumpang['alamat']; ?></td>
  </tr>
  
  <tr>
    <td>Stasiun Tujuan</td>
    <td>:</td>
    <td><?php echo $rowkereta['stasiun_tujuan']; ?></td>
    <td width="150" align="center"> | </td>
    <td>No. Telp</td>
    <td>:</td>
    <td><?php echo $rowpenumpang['no_telp']; ?></td>
  </tr>
  
  <tr>
    <td>Waktu Berangkat</td>
    <td>:</td>
    <td><?php echo $rowkereta['waktu_berangkat']; ?></td>
    <td width="150" align="center"> | </td>
    <td>Kode Pesan</td>
    <td>:</td>
    <td><?php echo $rowpenumpang['code']; ?></td>
  </tr>

  <tr>
    <td>Waktu Tiba</td>
    <td>:</td>
    <td><?php echo $rowkereta['waktu_tiba']; ?><?php echo $code['code']; ?></td>
    <td width="150" align="center"> | </td>
  </tr>
  
  <tr>
    <td>Harga</td>
    <td>:</td>
    <td>Rp. <?php echo $rowkereta['harga']; ?></td>
    <td width="150" align="center"> | </td>
  </tr>
  
  <tr>
    <td colspan="7">=========================================================================================</td>
  </tr>
 </table>
 <footer>
   <p align="center">Struk ini tidak berlaku sebagai tiket jika anda belum konfirmasi untuk pembayaran. 
   <br/> Struk harus ditukar dengan tiket di stasiun paling lambat 1 jam sebelum keberangkatan.
   </br> Pastikan nama & no identitas sudah sesuai dengan nama & no identitas
   </br> Perbedaan nama & no identitas dapat berakibat ditolaknya proses check-in di stasiun.
   </br> Dan tiket dinyatakan TIDAK BERLAKU LAGI.
   </br> Untuk Konfirmasi Perbayaran hubungi  KAI di 021-121.
   </br> Kirim Bukti Pembayaran ke email : transaksi@kai.go.id</p>
 </footer>
 </fieldset>
 <center>
 <?php
echo '<a href="javascript:window.print()"><img src="image/print.png" width="50" height="50"></a>';
?>
 <?php
 echo '<a href ="index1.php"><img src="image/home.png" height="50" width="50"></a></br>';
 ?>
 <?php 
 echo "<a href ='edit-tiket.php?no_kereta=$no_ka && no_identitas=$no_penumpang'>EDIT</a></br>";
 
 echo "<a href ='javascript:deleteTiket($no_penumpang)'></a>";
?>
 <script language="javascript" type="text/javascript"> 
 function deleteTiket(no_identitas){
    if (confirm('Are you sure to delete this tiket?')){
      window.location.href = '?delete&no_identitas=' + no_identitas;
    } 
 } 
</script>
<?php
 if(isset($_GET['delete']) && isset($_GET['no_identitas'])){ 
  $sqldelete = 'DELETE FROM penumpang  WHERE no_identitas= "'.$_GET['no_identitas'].'" ';
  mysql_query($sqldelete) or die('Delete tiket failed. ' . mysql_error());
  echo "<script>window.location.href='index.php';</script>";
 }
?>
</center>
</form> 
</body>
</html>