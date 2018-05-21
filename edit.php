<?php
error_reporting(E_ALL ^ E_NOTICE);
include "koneksi.php";

 $query = "update penumpang set status ='sukses' where code ='$_GET[a]'";
$hasil = mysql_query($query);
 ?>


<meta http-equiv='refresh' content='2 url=index1.php'>
