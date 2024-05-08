<?php
require_once('./conn.php');

$receitaId = $_POST['receitaId'];

$sql = "SELECT * FROM receipts WHERE receipt_id = '$receitaId'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        $acessos = $row['receipt_entries'] + 1;

        $sql = "UPDATE receipts SET receipt_entries = '$acessos' WHERE receipt_id = '$receitaId'";
        if (mysqli_query($conn, $sql)) {
            echo "Avaliação atualizada!";
        } else {
            echo "Erro no upload do banco!";
        }
    }
} else {
}
;
?>