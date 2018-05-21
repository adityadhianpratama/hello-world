<!DOCTYPE html>
<html>
<head>
  <title>Kereta Api | E-Ticketting</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="jquery.js"></script>
</head>
  <body>
    <div class="content">
        <div class="img_responsive">
          <a href="index1.php"><img src="image/header.jpg"  width="600" height="300" alt="Make Image responsive"/></a>
        </div>
        <div class="menu">
          <ul>
            <li><a href="index1.php?page=home"><b>Daftar Harga Tiket</b></a></li>
            <li><a href="data.php?page=data"><b>Data Pesan Tiket</b></a></li>
            <li><a href="transaksi.php?page=transaksi"><b>Transaksi</b></a></li>
            <li><a href="kelompok.php?page=kelompok"><b>Kelompok</b></a></li>
          </ul>
        </div>
        <div class="atas">
        </div>
        <div class="badan">
          <?php
          include ("koneksi.php");
          $selectkereta = 'SELECT *FROM kereta ORDER BY no_kereta ASC';
          $resultselectkereta = mysql_query($selectkereta)
                                or die ('error, load data tiket failed.' . mysql.error());
          if (mysql_num_rows($resultselectkereta)==0){
            echo "Data tidak tersedia";
          }else{
            
            echo "
            <h1 align='center'><font face='Arial Narrow' color='#FF8C00'>
              Jadwal Keberangkatan Kereta Api Stasiun Senen</h1>
              <h4 align='center'><a href='inputdata.php'><input type = 'reset' name = 'Reset' value = 'Tambah' /></a></h4>
            <table width = '70%' align='center' border='1' cellspacing='0' cellpadding='1'>
            <tr bgcolor=#D3D3D3>
            <td align='center' width = '150'> No. Kereta </td>
            <td align='center' width = '250'> Nama Kereta </td>
            <td align='center' width = '250'> Kelas </td>
            <td align='center' width = '250'> Stasiun Asal </td>
            <td align='center' width = '250'> Stasiun Tujuan </td>
            <td align='center' width = '250'> Jam Berangkat </td>
            <td align='center' width = '250'> Jam Tiba </td>
            <td align='center' width = '250'> Harga </td>
            <td align='center' width = '250'> PESAN </td>
            </tr>";
            while ($row = mysql_fetch_array ($resultselectkereta)){
            extract($row);
            echo "<tr>
            <td align='center'> ".$no_kereta." </td>
            <td align='center'> ".$nama_kereta." </td>
            <td align='center'> ".$kelas." </td>
            <td align='center'> ".$stasiun_asal." </td>
            <td align='center'> ".$stasiun_tujuan." </td>
            <td align='center'> ".$waktu_berangkat." </td>
            <td align='center'> ".$waktu_tiba." </td>
            <td align='center'> ".$harga." </td>
            <td align='center'><a href ='tiket.php?no_kereta=$no_kereta'><input type = 'reset' name = 'Reset' value = 'Pesan' /></a></td>
            </tr>";
            }
            echo "</table>";
          }
        ?>
      </div>
    </div>
    <div id="footer">
      <p>Copyright kelompok 3 UMB - Fasilkom 2015</p>
    </div>
  </body>
</html>