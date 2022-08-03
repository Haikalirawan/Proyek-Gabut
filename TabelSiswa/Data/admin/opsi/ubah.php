<?php

session_start();

if ( !isset($_SESSION["akses"]) ) {
		header("location: ../../../System/login/login.php");
		exit;
	}



// Eksekusi form dimulai dari sini
require "../../../functions.php";

$no = $_GET['no'];
$sw = query("SELECT * FROM siswa WHERE no = $no")[0];

	if ( isset($_POST["ubah"]) ) {
		if ( update($_POST) > 0 ) {
		echo 
		"
		<script>
			alert('Data siswa telah diperbarui');
			document.location.href = '../index.php';
		</script>
		
		";
		}
		else {

		echo 
		"
		<script>
			alert('Data siswa gagal diperbarui');
		</script>
		
		";
		}
	
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ubah data page </title>
 </head>
 <body>

 	<h1>Ubah data siswa</h1>
   	
  <form action="" method="post" enctype="multipart/form-data">

  	<input type="hidden" name="no" value="<?= $sw['no']; ?>">
   		
   	<label for="Nama">Nama :</label>
	<input type="text" name="nama" id="Nama" placeholder="Nama anda.." autofocus autocomplete="off" size="60" required value="<?= $sw['nama']; ?>">

<br>
<br>

	<label for="Alamat">Alamat :</label>
	<input type="text" name="alamat" id="Alamat" placeholder="Alamat anda.." autocomplete="off" size="60" required value="<?= $sw['alamat']; ?>">
<br>
<br>

	<label for="Email">Email :</label>
	<input type="text" name="email" id="Email" placeholder="Email anda.." autocomplete="off" size="60" value="<?= $sw['email']; ?>">

<br>
<br>

	<label for="gender">Jenis Kelamin :</label>
	<input type="text" name="gender" id="gender" placeholder="Jenis kelamin anda.." autocomplete="off" size="60" value="<?= $sw['gender']; ?>">

<br>
<br>

	<label for="Agama">Agama :</label>
	<input type="text" name="agama" id="Agama" placeholder="Agama anda.." autocomplete="off" size="60" required value="<?= $sw['agama']; ?>">
   	
<br>
<br>

	<button type="submit" name="ubah">Ubah data</button>	

  </form>

</body>
</html>