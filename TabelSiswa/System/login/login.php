<?php  

session_start();

require "../../functions.php";

if (isset($_POST["login"])) {

$username = $_POST["username"];
$password = $_POST["password"];

$result = mysqli_query($conn, "SELECT * FROM pengawas WHERE username = '$username'");

if ( mysqli_num_rows($result) === 1 ) {
	
	$row = mysqli_fetch_assoc($result);

	if (password_verify($password, $row["password"])) {

			// set SESSION
			$_SESSION["akses"]= $row["akses"];
			$_SESSION["username"] = $row["username"];

			if ( $_SESSION["akses"] == "Admin") {
				header("Location: ../../Data/admin/index.php");
				exit;
			}
			elseif ( $_SESSION["akses"] == "User") {
				header("Location: ../../Data/user/index.php");
				exit;
			}
			else {
				session_destroy();
			}

		}

	}

	$error = true;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login page</title>
	<style>
		
	</style>
</head>
<body>

<?php if (isset ($error) ) : ?>
	<p style="color: red; font-style: italic; font-size: 28px;">Username/Password anda salah</p>		
<?php endif ?>	

	<h1>Silahkan Login</h1>

	<form action="" method="post">
		
	<label for="username">Username :</label>
	<input type="text" name="username" id="username" placeholder="Username anda.." autofocus autocomplete="off" size="60" required>

<br>
<br>

	<label for="password">Password :</label>
	<input type="password" name="password" id="password" placeholder="Password anda.." autocomplete="off" size="60" required>

<br>
<br>

	<a href="../registrasi/registrasi.php">Blum punya Akun?? Daftar sekarang!!</a>

<br>
<br>

	<button type="submit" name="login">Login</button>

	</form>
</body>
</html>