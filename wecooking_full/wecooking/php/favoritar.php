<?php
require_once('./conn.php');

$userId = $_POST['userId'];
$receitaId = $_POST['receitaId'];
$data = date("Y-m-d H:i:s"); 

$sql = "SELECT * FROM favorites WHERE user_id = '$userId' AND receipt_id = '$receitaId'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    $sql = "DELETE FROM favorites WHERE user_id = '$userId' AND receipt_id = '$receitaId'";
    if (mysqli_query($conn, $sql)) {
        echo "Removido dos favoritos!";
    } else {
        echo "Erro no upload do banco!";
    }
} else {
    $sql = "INSERT INTO favorites (user_id, receipt_id, favorite_date_added) VALUES ('$userId', '$receitaId', '$data')";
    if (mysqli_query($conn, $sql)) {
        echo "Adicionado aos favoritos!";
    } else {
        echo "Erro no upload do banco!";
    }
};
?>