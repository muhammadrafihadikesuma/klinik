<?php
session_start();
require "../api/koneksi.php";
if (isset($_COOKIE['login'])) {
	# code...
	if ($_COOKIE['login'] == 'true') {
		# code...
		$_SESSION['id'] == true;
	}
}

$username = $_POST['username'];
$password = $_POST['password'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username'");
$h = mysqli_num_rows($query);

if ($h > 0) {
	# code...
	$pw = mysqli_fetch_array($query);
	$pwnow = $pw['password'];

	if (password_verify($password, $pwnow)) {

		$_SESSION['id'] = $pw['id'];
		$_SESSION['username'] = $pw['username'];
		$_SESSION['nama'] = $pw['nama'];
		$_SESSION['level'] = $pw['level'];
		header("location: ../pages/home.php");

		if (isset($_POST['remember'])) {
			# code...
			setcookie('login', 'true', time() + 30);
		}

	} else {
		echo '<script>
		window.alert ("USERNAME & PASSWORD YANG ANDA MASUKKAN SALAH, HARAP DIPERIKSA KEMBALI..!!");
		window.location.href="../index.php";
		</script>';
	}
} else {
	echo '<script>
	window.alert ("GAGAL LOGIN");
	window.location.href="../index.php";
	</script>';
}
