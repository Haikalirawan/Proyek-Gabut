<?php

// Session mulai dari sini
session_start();

if (!isset($_SESSION["akses"])) {
	header("location: ../../../System/login/login.php");
	exit;
}


// Eksekusi form dimulai dari sini
require "../../../functions.php";

if (isset($_POST["daftar"])) {

	if (tambah($_POST) > 0) {
		echo
		"
		<script>
			alert('Siswa baru telah didaftarkan');
			document.location.href = '../index.php';
		</script>
		
		";
	} else {

		echo
		"
		<script>
			alert('Siswa baru gagal didaftarkan');
		</script>
		
		";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Daftar siswa page </title>
</head>

<body>

	<h1>Silahkan daftarkan diri anda</h1>

	<form action="" method="post">

		<label for="Nama">Nama :</label>
		<input type="text" name="nama" id="Nama" placeholder="Nama anda.." autofocus autocomplete="off" size="60" required>

		<br>
		<br>

		<label for="Alamat">Alamat :</label>
		<input type="text" name="alamat" id="Alamat" placeholder="Alamat anda.." autocomplete="off" size="60" required>
		<br>
		<br>

		<label for="Email">Email :</label>
		<input type="text" name="email" id="Email" placeholder="Email anda.." autocomplete="off" size="60">

		<br>
		<br>

		<input type="radio" name="gender" id="laki" value="laki-laki" required><label for="laki">Laki laki</label>
		<input type="radio" name="gender" id="perempuan" value="perempuan" required><label for="perempuan">Perempuan</label>

		<br>
		<br>

		<label for="Agama">Agama :</label>
		<input type="text" name="agama" id="Agama" placeholder="Agama anda.." autocomplete="off" size="60" required>

		<br>
		<br>

		<button type="submit" name="daftar">Daftar sekarang</button>

	</form>

</body>

</html>