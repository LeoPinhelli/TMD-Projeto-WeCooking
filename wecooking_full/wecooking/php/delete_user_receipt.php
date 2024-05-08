<?php
require_once('./conn.php');

$receiptID = $_POST['id'];

$sql = "DELETE FROM receipts WHERE receipt_id = '$receiptID'";
$result = $conn->query($sql);

?>