<?php
require_once('./conn.php');

$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
	echo '0';
} else {
	echo '1';
}
?>