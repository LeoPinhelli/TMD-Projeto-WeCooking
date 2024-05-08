<?php
require_once('./conn.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$foto = $_POST['foto'];

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

$sql = "UPDATE users SET user_name = '$nome', user_email = '$email', user_password = '$encryptedPassword', user_photo = '$foto' WHERE user_id = '$id'";
if (mysqli_query($conn, $sql)) {
    echo "Sucesso";
} else {
    echo "Erro no upload do banco!";
} 

?>