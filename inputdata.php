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
          <center>
  <p> Penambahan Jadwal Kereta </p>
  
  <form method = 'POST' action = 'aksi_tambah.php'>
  <table border = '1' cellspacing = '1' cellpadding = '5'
  style = 'border : #aaa; color: #101; font-family : arial; fot-size : 12px;'>
  <tr>
    <td> No. Kereta </td>
    <td width = '5' align = 'center'> : </td>
    <td> <input type = 'text' placeholder='No. Kereta' name = 'no_kereta' /> </td>
  </tr>
  <tr>
    <td> Nama Kereta </td>
    <td align = 'center'> : </td>
    <td> <input type = 'text' placeholder='Nama Kereta' name = 'nama_kereta' /> </td>
  </tr>
  <tr>
    <td> Kelas </td>
    <td align = 'center'> : </td>
    <td> <input type = 'text' placeholder='Kelas' name = 'kelas' /> </td>
  </tr>
  <tr>
    <td> Stasiun Asal </td>
    <td align = 'center'> : </td>
    <td> <input type = 'text' placeholder='Stasiun Asal' name = 'stasiun_asal' /> </td>
    </tr>
    <tr>
    <td> Stasiun Tujuan </td>
    <td width = '5' align = 'center'> : </td>
    <td> <input type = 'text' placeholder='Stasiun Tujuan' name = 'stasiun_tujuan' /> </td>
    </tr>
    <tr>
    <td> Jam Berangkat </td>
    <td width = '5' align = 'center'> : </td>
    <td> <input type = 'text' placeholder='Jam Berangkat' name = 'waktu_berangkat' /> </td>
    </tr>
    <tr>
    <td> Jam Tiba </td>
    <td width = '5' align = 'center'> : </td>
    <td> <input type = 'text' placeholder='waktu_tiba' name = 'waktu_tiba' /> </td>
    </tr>
    <tr>
    <td> Harga </td>
    <td width = '5' align = 'center'> : </td>
    <td> <input type = 'text' placeholder='harga' name = 'harga' /> </td>
    </tr>
  <tr>
  <td colspan = '3' align = 'center'>
  <input type = 'submit' name = 'submit' value = 'Submit'/>
  <input type = 'reset' name = 'Reset' value = 'Reset' /> </td>
  </tr>
</table>
      </div>
    </div>
    <div id="footer">
      <p>Copyright kelompok 3 UMB - Fasilkom 2015</p>
    </div>
  </body>
</html>