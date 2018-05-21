<?php
include 'koneksi.php';
if(isset($_POST['log'])) {
	$user = mysql_real_escape_string($_POST['user']);
	$pass = mysql_real_escape_string($_POST['pass']);
    $pass = md5($pass);	
	$sql = mysql_query("SELECT * FROM tbl_user where username='$user' and password='$pass'");
	$data = mysql_fetch_array($sql);
	$username = $data['username'];
	
	
	$password = $data['password'];
	
	if ($user==$username && $pass==$password) {
		session_start();
		$_SESSION['username']=$username;
			echo "<meta http-equiv='refresh' content='0; url=index1.php'>";
		
	} else {
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
			echo "<script>alert('Username dan password anda salah, Silahkan login kembali !');</script>";
	}
}
?>