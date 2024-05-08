<?php
require_once('./conn.php');

$receitaId = $_POST['receitaId'];

$sql = "SELECT * FROM ratings WHERE receipt_id = '$receitaId'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    echo $result->num_rows;
    echo "*";
    while ($row = $result->fetch_assoc()) {
        echo $row['rating'];
        echo ",";
    }
}
;
?>