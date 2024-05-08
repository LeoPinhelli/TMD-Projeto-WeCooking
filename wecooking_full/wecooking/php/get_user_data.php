<?php
require_once('./conn.php');

$email = $_POST['userEmail'];

$sql = "SELECT * FROM users WHERE user_email = '$email' ";
$result = $conn->query($sql);

// Store the cipher method
$ciphering = "AES-128-CTR";
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';
// Store the encryption key
$encryption_key = "weCooking";


if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        echo $row['user_id'] . ",";
        echo $row['user_name'] . ",";
        echo $row['user_email'] . ",";

        // Use openssl_encrypt() function to encrypt the data
        $decryptedPassword = openssl_decrypt(
            $row['user_password'],
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );
        echo $decryptedPassword . ",";
        
        echo $row['user_photo'];
    }
}
;

?>