<?php
require_once('./conn.php');

$userId = $_POST['user_id'];

$sql = "SELECT * FROM favorites WHERE user_id = '$userId'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {

    while ($row = $result->fetch_assoc()) {
        $id = $row['receipt_id'];

        $sql = "SELECT * FROM receipts WHERE receipt_id = '$id'";
        $result2 = $conn->query($sql);

        if ($result2->num_rows >= 1) {
            while ($row2 = $result2->fetch_assoc()) {
                $tag = explode(",", $row2['receipt_tags']);
                $id = $row2['receipt_id'];

                echo '<a href="./receipts/' . $row2['receipt_id'] . '/index.php">';
                echo '<div class="receita" id="rec' . $row2['receipt_id'] . '">';
                echo '<div class="tag">';
                echo '<p class="tag' . $row2['receipt_id'] . '">' . $tag[0] . '</p>';
                echo '</div>';

                //echo '<br>' . $row['ingredientes'];
                //echo '<p class="receipt_difficulty">' . $row['receipt_difficulty'] . '</p></span></div>';
                //echo '<br>' . $row['data_adicionada'];

                // Image selecting
                if ($row2['receipt_images']) {
                    $imageLink = explode(",", $row2['receipt_images']);
                    echo '<img class="receipt_image" src="./receipts/' . $row2['receipt_id'] . '/' . $imageLink[1] . '">';
                }

                echo '<p>' . $row2['receipt_name'] . '</p>';
                echo '<div class="info">';
                echo '<p class="tempo">' . $row2['receipt_time'] . ' MIN &nbsp;</p>';
                echo '<i class="fa-solid fa-heart" id="fav' . $row2['receipt_id'] . '"></i>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
        }
    }
} else {
    echo '0';
}
;
?>