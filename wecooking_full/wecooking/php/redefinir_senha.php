<?php
require_once('./conn.php');

$email = $_POST['email'];
$senha = $_POST['nova_senha'];

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

$sql = "UPDATE users SET user_password = '$encryptedPassword' WHERE user_email = '$email'";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Erro no upload do banco!";
}
?>