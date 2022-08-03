<?php  
session_start();

if ( !isset($_SESSION["akses"]) ) {
	header("Location: ../../System/login/login.php");
	exit;
}




   require "../../functions.php";

$Dataperhalaman = 5;
$Jumlahdata = count( query("SELECT * FROM siswa") );
$Jumlahhalaman = ceil($Jumlahdata / $Dataperhalaman);
$Halamanaktif = (isset($_GET["page"]) ) ? $_GET["page"] : 1;
$Awaldata = ( $Halamanaktif *  $Dataperhalaman ) - $Dataperhalaman;
$posisi = ($Halamanaktif - 1) * $Dataperhalaman;
if ($Halamanaktif == '') {
	die("<script>
			alert('Harap masukkan halaman data dengan benar');
			document.location.href = 'index.php?page=1';
		</script>");
}

$siswa = query("SELECT * FROM siswa LIMIT $Awaldata, $Dataperhalaman");

if ( isset($_POST["cari"]) ) {
	$siswa = cari($_POST['keyword']);
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
</head>
<body>
	<h1>Selamat datang, <?= $_SESSION["username"]; ?></h1>

	<a href="opsi/tambah.php">Tambahkan siswa baru</a>

<br>
<br>

<form action="" method="post">
<input type="text" name="keyword" size="40" placeholder="Cari siswa..." autofocus>
<button type="submit" name="cari">Cari</button>
</form>

<br>

	<table border="2" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Email</th>
			<th>Jenis kelamin</th>
			<th>Agama</th>
			<th>OPSI</th>
		</tr>

		<tr>
	<?php $no = 1 + $posisi?>
	<?php foreach ( $siswa as $sw ): ?>
			<td> <?= $no; ?> </td>
			<td> <?= $sw["nama"]; ?> </td>
			<td> <?= $sw["alamat"]; ?> </td>
			<td> <?= $sw["email"]; ?> </td>
			<td> <?= $sw["gender"]; ?> </td>
			<td> <?= $sw["agama"]; ?> </td>
			<td>
				<a href="opsi/ubah.php?no=<?= $sw['no']; ?>">UPDATE</a>  | 
				<a href="opsi/hapus.php?no=<?= $sw['no']; ?>" onclick="return confirm('Apakah anda ingin meghapus siswa dengan nama <?= $sw['nama']; ?>');">DELETE</a>
			</td>
		</tr>
	<?php $no++ ?>
	<?php endforeach ?>
	
	</table>

	<br>

<?php if ( $Halamanaktif > 1): ?>
	<a href="?page=<?= $Jumlahhalaman - $Jumlahhalaman + 1 ?>"> First </a>
	<a href="?page=<?= $Halamanaktif - 1 ?>"> &laquo; </a>
<?php endif ?>


<?php for ($i=1; $i <= $Jumlahhalaman; $i++) : ?> 
	<?php if ( $i == $Halamanaktif): ?>
		<a href="?page=<?= $i; ?>" style="color: red; font-weight: bold;"><?= $i; ?></a>
		<?php else: ?>
		<a href="?page=<?= $i; ?>"><?= $i; ?></a>
	<?php endif ?>
<?php endfor; ?>


<?php if ( $Halamanaktif < $Jumlahhalaman): ?>
	<a href="?page=<?= $Halamanaktif + 1 ?>"> &raquo; </a>
	<a href="?page=<?= $Jumlahhalaman - $Jumlahhalaman + $Jumlahhalaman ?>"> Last</a>
<?php endif ?>

<br>
<br>

<a href="../../logout.php">&laquo;Logout</a>

</body>
</html>