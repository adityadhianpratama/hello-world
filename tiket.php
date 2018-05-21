<?php
Include ("koneksi.php"); 


function rand_string( $length ) {
 $chars = "ABCDEFGHJKLMNOPQRSTUVWXYZ23456789"; 
  $size = strlen( $chars );
 for( $i = 0; $i < $length; $i++ ) {
 $str .= $chars[ rand( 0, $size - 1 ) ];
 }
 
 return $str;
}
$code         = rand_string( 6 );

$no_ka=$_GET['no_kereta'];
$selectkereta = "SELECT * FROM kereta WHERE no_kereta='$no_ka'"; 
$resultselectkereta = mysql_query($selectkereta) or die ('Error, load data kereta failed.'.mysql_error()); 
$rowkereta = mysql_fetch_assoc($resultselectkereta); 
?>
<!DOCTYPE html>
<html>
<head> <title> Pemesanan Tiket </title> </head>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="jquery.js"></script>
  <body>
      <div class="content">
        <div class="img_responsive">
            <a href="index.php"><img src="image/headeR.jpg"  width="600" height="300" alt="Make Image responsive"/></a>
        </div>
        <div class="menu">
          <ul>
            <li><a href="index.php?page=home"><b>Daftar Harga Tiket</b></a></li>
            <li><a href="index.php?page=tiket"><b>Data Pesan Tiket</b></a></li>
            <li><a href="transaksi.php?page=transaksi"><b>Transaksi</b></a></li>
          </ul>
        </div>
      <div class="badan">
        <form method="post">
          <fieldset style="width: 730px; height: 300px;"><legend align="center"><b>Pemesanan Tiket Kereta Api</b></legend>
             <!-- tabel -->
             <table align="center">
               <tr>
                <td>No. Kereta</td>
                <td>:</td>
                <td><input type="text" name="nokereta" value="<?php echo $rowkereta['no_kereta']; ?>"></td>
                <td width="150" align="center">  </td>
                <td>Tanggal Pemesanan</td>
                <td>:</td>
                <!-- menampilkan tanggal saat ini -->
                <td><input type="text" name="Tanggal" value="<?php echo date("d M y");?>" disabled /></td>
               </tr>

               <tr>
                <td>Nama Kereta</td>
                <td>:</td>
                <td><input type="text" name="namakereta" value="<?php echo $rowkereta['nama_kereta']; ?>"></td>
                <td width="150" align="center">  </td>
                <td>No. Identitas</td> 
                <td>:</td>
                <td><input type="text" name="noidentitas" autofocus required placeholder="KTP / SIM / Passport"></td>
               </tr>
            
               <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input type="text" name="kelaskereta" value="<?php echo $rowkereta['kelas']; ?>"></td>
                <td width="150" align="center">  </td>
                <td>Nama Lengkap</td> 
                <td>:</td>
                <td><input type="text" name="namapenumpang" required placeholder="Masukkan nama anda"></td>
               </tr>
            
               <tr>
                <td>Stasiun Asal</td>
                <td>:</td>
                <td><input type="text" name="tujuan" value="<?php echo $rowkereta['stasiun_asal']; ?>"></td>
                <td width="150" align="center">  </td>
                <td>Alamat</td> 
                <td>:</td>
                <td><input type="text" name="alamat" required placeholder="Masukkan alamat anda"></td>
               </tr>
            
               <tr>
                <td>Stasiun Tujuan</td>
                <td>:</td>
                <td><input type="text" name="tujuan" value="<?php echo $rowkereta['stasiun_tujuan']; ?>"></td>
                <td width="150" align="center">  </td>
                <td>Nomor Telp.</td> 
                <td>:</td>
                <td><input type="tel" name="nomorTelp" required placeholder="+62XXXXXXXXXXXX"></td> 
               </tr>
            
               <tr>
                <td>Waktu Berangkat</td>
                <td>:</td>
                <td><input type="text" name="waktuberangkat" value="<?php echo $rowkereta['waktu_berangkat'];?>"></td>
               </tr>
            
               <tr>
                <td>Waktu Tiba</td>
                <td>:</td>
                <td><input type="text" name="waktutiba" value="<?php echo $rowkereta['waktu_tiba']; ?>"></td>
               </tr>
            
               <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="text" name="harga" value="<?php echo $rowkereta['harga']; ?>"></td>
               </tr>
               <tr>
                <td align="right" colspan="7"><input type="submit" name="submit" value="Submit"></td>
               </tr>
             </table>
             <?php
             if(isset ($_POST['submit'])){ //kondisi jika button submit di klik
                $no_identitas = $_POST['noidentitas'];
                $nama_penumpang = $_POST['namapenumpang'];
                $alamat = $_POST['alamat'];
                $no_telp = $_POST['nomorTelp'];
				$no_kereta = $_POST['nokereta'];
          $status = 'proses';
                $inserttiket ="INSERT INTO penumpang VALUES('$no_identitas','$nama_penumpang','$no_kereta', '$alamat','$no_telp','$code', '$status')";
             mysql_query($inserttiket) or die ('Error!!'.mysql_error());
             echo "<script>window.location.href='struk.php?no_kereta=$no_ka && no_identitas=$no_identitas';</script>";
            }
            ?>
          </fieldset>
        </form>
      </div>
    </div>
    <div id="footer">
          <p>Copyright kelompok 3 UMB - Fasilkom 2015</p>
        </div>
  </body>
</html>