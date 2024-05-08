<?php
require_once('./conn.php');

$userId = $_POST['userId'];
$receitaId = $_POST['receitaId'];

$sql = "SELECT * FROM favorites WHERE user_id = '$userId' AND receipt_id = '$receitaId'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    echo '1';
} else {
    echo '0';
};
?>