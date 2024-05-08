<?php
require_once('./conn.php');

$receita = $_POST['receiptId'];
 
$sql = "SELECT * FROM comments WHERE receipt_id = $receita";
$result = $conn->query($sql);
 
if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        echo $row['comment'];
        echo ";";
        echo $row['user_id'];
        echo "/";

        /*echo $row['id_receita'];
 
        echo '<a href="./receipts/' . $row['receipt_id'] . '/index.php"><div class="receita"><div class="receipt_info"><p class="nome">' . $row['receipt_name'] . '</p>';
        echo '<span><p>' . $row['receipt_time'] . ' minutos &nbsp;</p>';
 
        //echo '<br>' . $row['ingredientes'];
 
        echo '<p class="receipt_difficulty">' . $row['receipt_difficulty'] . '</p></span></div>';
 
        //echo '<br>' . $row['data_adicionada'];
 
        // Image selecting
        if ($row['receipt_images']) {
            $imageLink = explode(",", $row['receipt_images']);
            echo '<img class="receipt_image" src="./receipts/' . $row['receipt_id'] . '/' . $imageLink[1] . '"></div></a>';
        }*/
    }
} else {
    echo 'Nenhum comentário encontrado.';
}

?>