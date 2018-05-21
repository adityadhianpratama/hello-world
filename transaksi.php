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
      <div class="badan">
          <?php
          include ("koneksi.php");
          $selectkereta = 'SELECT * FROM penumpang INNER JOIN kereta ON penumpang.no_kereta=kereta.no_kereta';
          $resultselectkereta = mysql_query($selectkereta)
                                or die ('error, load data penumpang failed.' . mysql.error());
          if (mysql_num_rows($resultselectkereta)==0){
            echo "Data tidak tersedia";
          }else{
            
            echo "
            <h1 align='center'><font face='Arial Narrow' color='#FF8C00'>
              Transaksi Penumpang Kereta Api Stasiun Senen</h1>
            <table width = '70%' align='center' border='1' cellspacing='0' cellpadding='1'>
            <tr bgcolor=#D3D3D3>
            <td align='center' width = '150'> No Identitas </td>
            <td align='center' width = '250'> Nama Penumpang </td>
			      <td align='center' width = '250'> No Kereta </td>
            <td align='center' width = '250'> Alamat </td>
            <td align='center' width = '250'> No Telpon </td>
            <td align='center' width = '250'> KodePesan </td>
            <td align='center' width = '250'> Konfirmasi </td>
            </tr>";
            while ($row = mysql_fetch_array ($resultselectkereta)){
            extract($row);
            echo "<tr>
            <td align='center'> ".$no_identitas." </td>
            <td align='center'> ".$nama_penumpang." </td>
			      <td align='center'> ".$no_kereta." </td>
            <td align='center'> ".$alamat." </td>
            <td align='center'> ".$no_telp." </td>
            <td align='center'> ".$code." </td>
            <td align='center'>
            <form method = 'POST' action = 'edit.php?a=$code'>
            
            <input type = 'submit' name = 'submit' value = 'Sukses'/>
</form>
            
            </td>
            </tr>";
            }
            echo "</table>";
          }

        ?>
        
      </div>
      </div>
    </div>
    <div id="footer">
      <p>Copyright kelompok 3 UMB - Fasilkom 2015</p>
    </div>
  </body>
</html>