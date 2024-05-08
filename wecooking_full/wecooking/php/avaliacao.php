<?php
require_once('./conn.php');

$avaliacao = $_POST['avaliacao'];
$userId = $_POST['userId'];
$receitaId = $_POST['receitaId'];


$sql = "SELECT * FROM ratings WHERE user_id = '$userId' AND receipt_id = '$receitaId'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    $sql = "UPDATE ratings SET rating = '$avaliacao' WHERE user_id = '$userId' AND receipt_id = '$receitaId'";
    if (mysqli_query($conn, $sql)) {
        echo "Avaliação atualizada!";
    } else {
        echo "Erro no upload do banco!";
    }
} else {
    $sql = "INSERT INTO ratings (rating, user_id, receipt_id) VALUES ('$avaliacao', '$userId', '$receitaId')";
    if (mysqli_query($conn, $sql)) {
        echo "Avaliação salva!";
    } else {
        echo "Erro no upload do banco!";
    }
};
?>