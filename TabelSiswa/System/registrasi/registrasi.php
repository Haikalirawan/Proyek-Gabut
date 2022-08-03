<?php  

require '../../functions.php';

if (isset($_POST["daftar"])) {
	
	if ( registrasi($_POST) > 0) {
		echo 
		"
		<script>
			alert('Data anda berhasil ditambahkan');
			document.location.href = '../login/login.php';
		</script>
		
		";
	}
	else {
		echo 
		"
		<script>
			alert('Data anda gagal ditambahkan');
		</script>
		
		";
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrasion page</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
	<h1>Silahkan daftarkan diri anda!!!</h1>

	<form action="" method="post">
		
		<label for="username">Username :</label>
		<input type="text" name="username" id="username" placeholder="Username anda.." autofocus autocomplete="off" size="60" required>

<br>
<br>

		<label for="password">Password :</label>
		<input type="password" name="password" id="password" placeholder="Password anda.." autocomplete="off" size="60" required >

<br>
<br>

		<label for="password2">Konfirmasi Password :</label>
		<input type="password" name="password2" id="password2" placeholder="Konfirmasi Password anda.." autocomplete="off" size="60" required >

<br>
<br>
		<input type="radio" name="akses" value="User"><label for="user">User</label>
		
<br>

		<button type="submit" name="daftar">Daftar</button>
	</form>

</body>
</html>