<?php
require_once('./conn.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

// Store the cipher method
$ciphering = "AES-128-CTR";
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';
// Store the encryption key
$encryption_key = "weCooking";
// Use openssl_encrypt() function to encrypt the data
$encryptedPassword = openssl_encrypt(
	$senha,
	$ciphering,
	$encryption_key,
	$options,
	$encryption_iv
);

$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
	while ($row = $result->fetch_assoc()) {
		if ($encryptedPassword === $row['user_password']){
			echo '1';
		} else {
			echo '0';
		}
	}
} else {
	echo '0';
}

/*
$bd_email = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$email'");
$bd_senha = mysqli_query($conn, "SELECT * FROM usuario WHERE senha = '$encryptedPassword'");

$sql = "SELECT user_status FROM usuario WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
	while ($row = $result->fetch_assoc()) {
		if ($row['user_status'] == 1) {
			if (mysqli_num_rows($bd_email) == 1 && mysqli_num_rows($bd_senha) >= 1) {
				echo json_encode('' . 1 . '*' . $email);
			} else {
				echo json_encode('' . 0);
			}
		} else {
			echo json_encode('' . 2);
		}
	}
} else {
	echo json_encode('' . 2);
}
*/
?>