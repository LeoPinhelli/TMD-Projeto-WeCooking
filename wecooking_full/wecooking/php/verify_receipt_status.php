<?php
require_once('./conn.php');

$receita = $_POST['receitaId'];
 
$sql = "SELECT * FROM receipts WHERE receipt_id = $receita";
$result = $conn->query($sql);
 
if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        if ($row['receipt_status'] == 0) {
            echo '0';
        } else {
            echo '1';
        }
    }
} 
?>