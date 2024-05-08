<?php
require_once('./conn.php');

$currentStatus = $_POST['status'];
$id = $_POST['id'];

if ($currentStatus === '0'){
    $status = '1';
} else {
    $status = '0';
}
 
$sql = "UPDATE receipts SET receipt_status = '$status' WHERE receipt_id = '$id'";
if (mysqli_query($conn, $sql)) {
    echo "Sucesso";
} else {
    echo "Erro no upload do banco!";
} 
 
?>