<?php
require_once('./conn.php');

$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        echo $row['user_id'];
        echo "/";
        echo $row['user_photo'];

        //echo $row['id_receita'];

        //echo '<a href="./receipts/' . $row['id_receita'] . '/index.php"><div class="receita"><div class="receipt_info"><p class="nome">' . $row['nome'] . '</p>';
        //echo '<span><p>' . $row['tempo_preparo'] . ' minutos &nbsp;</p>';

        //echo '<br>' . $row['ingredientes'];

        //echo '<p class="receipt_difficulty">' . $row['dificuldade'] . '</p></span></div>';

        //echo '<br>' . $row['data_adicionada'];

        /* Multiple image selecting
        //if ($row['images']) {
        //    $nImgs = count(explode(",", $row['images']));
        //    $imageLink = explode(",", $row['images']);
        //    for ($i = 1; $i < $nImgs; $i++) {
        //        echo '<img class="receipt_image" src="./receipts/'. $row['id_receita'] . '/' . $imageLink[$i] . '">';
        //    }
        //    echo '</div></a>';
        //} */

        // Image selecting
        //if ($row['images']) {
        //    $imageLink = explode(",", $row['images']);
        //    echo '<img class="receipt_image" src="./receipts/' . $row['id_receita'] . '/' . $imageLink[1] . '"></div></a>';
        //}
    }
}
;
?>	