<?php
require_once('./conn.php');

$email = $_POST['userEmail'];

$sql = "SELECT * FROM users WHERE user_email = '$email' ";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        echo $row['user_id'];
    }
}
;

?>