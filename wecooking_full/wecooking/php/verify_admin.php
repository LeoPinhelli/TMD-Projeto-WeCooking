<?php
require_once('./conn.php');

$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo $row['user_admin'];

?>