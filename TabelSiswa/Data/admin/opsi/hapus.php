<?php  

session_start();

if ( !isset($_SESSION["akses"]) ) {
		header("location: ../../../System/login/login.php");
		exit;
	}


require "../../../functions.php";

$no = $_GET["no"];

if ( hapus($no) > 0) {
	echo 
		"
		<script>
			alert('Siswa baru telah dihapus');
			document.location.href = '../index.php';
		</script>
		
		";
		} else {

	echo 
		"
		<script>
			alert('Siswa baru gagal dihapus');
		</script>
		
		";
}

?>