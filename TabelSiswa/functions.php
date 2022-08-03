<?php 

$conn = mysqli_connect("localhost", "root", "", "rpl1");

// Query DaBes
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

// Tambah data
function tambah($post)
{
	global $conn;

	// data user
	$nama = htmlspecialchars($post["nama"]);
	$alamat = htmlspecialchars($post["alamat"]);
	$email = htmlspecialchars($post["email"]);
	$gender = htmlspecialchars($post["gender"]);
	$agama = htmlspecialchars($post["agama"]);

	// update ke database
	$tambah = "INSERT INTO siswa VALUES ('','$nama','$alamat','$email','$gender','$agama')";

	// simpan ke database
	mysqli_query($conn, $tambah);

	// kembalikan nilai
	return mysqli_affected_rows($conn);

}

// Update data
function update($post)
{
	global $conn;

	// data user
	$no = $post['no'];
	$nama = htmlspecialchars($post["nama"]);
	$alamat = htmlspecialchars($post["alamat"]);
	$email = htmlspecialchars($post["email"]);
	$gender = strtolower(htmlspecialchars($post["gender"]));
	$agama = htmlspecialchars($post["agama"]);

	// update ke database
	$update = "UPDATE siswa SET
				no = $no,
				nama = '$nama',
				alamat = '$alamat',
				email = '$email',
				gender = '$gender',
				agama = '$agama' 
			   WHERE 
			   	no = $no";

	// simpan ke database
	mysqli_query($conn, $update);

	// kembalikan nilai
	return mysqli_affected_rows($conn);

}

// Hapus data
function hapus($no)
{

	global $conn;
	
	// update ke database
	$hapus = "DELETE FROM siswa WHERE no = $no";

	// simoan ke database
	mysqli_query($conn, $hapus);

	// kembalikan nilai
	return mysqli_affected_rows($conn);
}

	
// Cari data
function cari($keyword)
{
	$cari = "SELECT * FROM siswa WHERE
										nama LIKE '%$keyword%' OR
										alamat LIKE '%$keyword%' OR
										email LIKE '%$keyword%' OR
										agama LIKE '%$keyword%' 
			";

	return query($cari);
}


// Registrasi form
function registrasi($post)
{
	global $conn;

	// Data user
	$username = strtolower(stripslashes($post["username"]));
	$password = $post["password"];
	$password2 = $post["password2"];
	$akses = $post["akses"];

	// cek username sudah ada / tidak
	$result = mysqli_query($conn, "SELECT username FROM pengawas WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo
			"
		<script>
			alert('Username telah tersedia');
		</script>
		
		";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo
			"
		<script>
			alert('Konfirmasi Passoword tidak sesuai');
		</script>
		
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// update database
	$tambah = "INSERT INTO pengawas VALUES('', '$username', '$password', '$akses')";

	// simpan ke database
	mysqli_query($conn, $tambah);

	// kembalikan nilai
	return mysqli_affected_rows($conn);

}
