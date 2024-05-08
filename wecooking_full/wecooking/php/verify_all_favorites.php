<?php
require_once('./conn.php');

$userId = $_POST['userId'];

$sql = "SELECT * FROM favorites WHERE user_id = '$userId'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        echo $row['receipt_id'];
        echo '<br>';
    }
} else {
    echo '0';
};
?>