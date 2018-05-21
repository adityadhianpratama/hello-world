<?php
 Include ("koneksi.php");
 $no_ka=$_GET['no_kereta'];
 $selectkereta = "SELECT * FROM kereta WHERE no_kereta='$no_ka'";
 $resultselectkereta = mysql_query($selectkereta) or die ('Error, load data kereta failed.'.mysql_error());
 $rowkereta = mysql_fetch_assoc($resultselectkereta);
 
 $no_penumpang=$_GET['no_identitas'];
 $selectpenumpang = "SELECT * FROM penumpang WHERE no_identitas='$no_penumpang'" ;
 $resultselectpenumpang = mysql_query($selectpenumpang) or die ('error, load data tiket failed.'.mysql_error());
 $rowedit = mysql_fetch_assoc($resultselectpenumpang);
?>

<!DOCTYPE html>
<html>
<head> <title> Pemesanan Tiket </title> </head>
<body bgcolor="1ba0e2">
 <form method="post">
 <fieldset style="width: 730px; height: 300px;"><legend align="center"><b>Pemesanan Tiket Kereta Api</b></legend>
 <table align='center' border='0'>
   <tr>
     <td>No. Kereta</td>
     <td>:</td>
     <td><input type="text" name="nokereta" value="<?php echo $rowkereta['no_kereta']; ?>" disabled /></td>
     <td width="150" align="center">  </td>
     <td>Tanggal Pemesanan</td>
     <td>:</td>
     <td><input type="text" name="Tanggal" value="<?php echo date ("d M y");?>" disabled /></td>
   </tr>
  
   <tr>
     <td>Nama Kereta</td>
     <td>:</td>
     <td><input type="text" name="namakereta" value="<?php echo $rowkereta['nama_kereta']; ?>" disabled /></td>
     <td width="150" align="center">  </td>
     <td>No. Identitas</td> 
     <td>:</td>
     <td><input type="text" name="noidentitas" value="<?php echo $rowedit['no_identitas'];?>" autofocus required></td>
   </tr>
  
   <tr>
     <td>Kelas</td>
     <td>:</td>
     <td><input type="text" name="kelas" value="<?php echo $rowkereta['kelas']; ?>" disabled /></td>
     <td width="150" align="center">  </td>
     <td>Nama Lengkap</td> 
     <td>:</td>
     <td><input type="text" name="namapenumpang" value="<?php echo $rowedit['nama_penumpang'];?>" required></td>
   </tr>
   <tr>
     <td>Stasiun Asal</td>
     <td>:</td>
     <td><input type="text" name="tujuan" value="<?php echo $rowkereta['stasiun_asal']; ?>" disabled /></td>
     <td width="150" align="center">  </td>
     <td>Alamat</td> 
     <td>:</td>
     <td><input type="text" name="alamat" value="<?php echo $rowedit['alamat'];?>" required ></td>
   </tr>
  
   <tr>
     <td>Stasiun Tujuan</td>
     <td>:</td>
     <td><input type="text" name="tujuan" value="<?php echo $rowkereta['stasiun_tujuan']; ?>" disabled /></td>
     <td width="150" align="center">  </td>
     <td>Nomor Telp.</td> 
     <td>:</td>
     <td><input type="tel" name="nomorTelp" value="<?php echo $rowedit['no_telp'];?>"required ></td> 
   </tr>
  
   <tr>
     <td>Waktu Berangkat</td>
     <td>:</td>
     <td><input type="text" name="waktuberangkat" value="<?php echo $rowkereta['waktu_berangkat']; ?>" disabled /></td>
   </tr>
  
   <tr>
     <td>Waktu Tiba</td>
     <td>:</td>
     <td><input type="text" name="waktutiba" value="<?php echo $rowkereta['waktu_tiba']; ?>" disabled /></td>
   </tr>
  
   <tr>
     <td>Harga</td>
     <td>:</td>
     <td><input type="text" name="harga" value="<?php echo $rowkereta['harga']; ?>" disabled /></td>
   </tr>

   <tr>
     <td align="right" colspan="7"><input type="submit" name="edit" value="EDIT"></td>
   </tr>
 </table>
<?php
  if(isset ($_POST['edit'])){
   $noidentitas = $_POST['noidentitas'];
   $namapenumpang = $_POST['namapenumpang'];
   $alamat = $_POST['alamat'];
   $notelp = $_POST['nomorTelp'];
   //query untuk mengedit data 
   $updatetiket="UPDATE penumpang SET 
      no_identitas = '$noidentitas',
      nama_penumpang = '$namapenumpang',
      alamat = '$alamat',
      no_telp = $notelp 
      WHERE no_identitas = '$no_penumpang'";
  mysql_query($updatetiket) or die ('Error!!'.mysql_error());
  echo "<script>window.location.href='struk.php?no_kereta=$no_ka && no_identitas=$noidentitas';</script>";
  }
?>
</fieldset>
</form> 
</body>
</html>