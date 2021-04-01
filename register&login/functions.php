<?php
$conn = mysqli_connect("localhost", "root", "", "portopolio");

	
function query($sql) {
	global $conn;
	$result = mysqli_query($conn, $sql);

	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}


function register($data) {
	global $conn;

	$username = htmlspecialchars($_POST["username"]);
	$password = htmlspecialchars($_POST["password"]);

	// cek username sudah pernah ada atau belum
	$cek_username = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_num_rows($cek_username) === 1 ) {
		echo "<script>
				alert('username sudah terpakai!');
				document.location.href = '';
			  </script>";
		return false;
	}

	// tambahkan user baru ke database
	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// insert ke DB
	$sql = "INSERT INTO user VALUES ('', '$username', '$password', CURRENT_TIMESTAMP)";
	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}