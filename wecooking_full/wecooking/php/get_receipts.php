<?php
require_once('./conn.php');

if (isset($_POST['querySql'])) {
    $sql = $_POST['querySql'];
} else {
    $sql = "SELECT * FROM receipts WHERE receipt_status = '1'";
}

$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        
        $tag = explode(",", $row['receipt_tags']);
        $id = $row['receipt_id'];
        //echo $row['id_receita'];

        echo '<a href="./receipts/' . $row['receipt_id'] . '/index.php">';
        echo '<div class="receita" id="rec' . $row['receipt_id'] . '">';
        echo '<div class="tag">';
        echo '<p class="tag' . $row['receipt_id'] . '">' . $tag[0] . '</p>';

        $sqlAvals = "SELECT * FROM ratings WHERE receipt_id = '$id'";
        $resultAvals = $conn->query($sqlAvals);

        if ($resultAvals->num_rows >= 1) {
            $avalNum = 0;
            $avalLen = '';

            while ($rowAval = $resultAvals->fetch_assoc()) {
                $avalLen = $rowAval['rating'] . $avalLen;
                $avalNum = $rowAval['rating'] + $avalNum;        
            }

            echo '<span>'. round(($avalNum / strlen($avalLen)), 1) .' <i class="fa-solid fa-star"></i></span>';
        }

        /* $sqlFavs = "SELECT * FROM favorites WHERE receipt_id = '$id'";
        $resultFavs = $conn->query($sqlFavs);

        if ($resultFavs->num_rows >= 1) {
            if ($resultAvals->num_rows >= 1) {
                echo '<span id="avalFav'.$id.'" class="avalFav">' . ($resultAvals->num_rows) . ',';
                echo ($resultFavs->num_rows) . '</span>';
            } else {
                echo '<span id="avalFav'.$id.'" class="avalFav">' . ($resultFavs->num_rows) . '</span>';
            }
        } else {
            echo '<span id="avalFav'.$id.'" class="avalFav">' . ($resultAvals->num_rows) . '</span>';
        } */

        echo '</div>';

        //echo '<br>' . $row['ingredientes'];
        //echo '<p class="receipt_difficulty">' . $row['receipt_difficulty'] . '</p></span></div>';
        //echo '<br>' . $row['data_adicionada'];

        // Image selecting
        if ($row['receipt_images']) {
            $imageLink = explode(",", $row['receipt_images']);
            echo '<img class="receipt_image" src="./receipts/' . $row['receipt_id'] . '/' . $imageLink[1] . '">';
        }

        echo '<p>' . $row['receipt_name'] . '</p>';
        echo '<div class="info">';
        echo '<p class="tempo">' . $row['receipt_time'] . ' MIN &nbsp;</p>';
        echo '<i class="fa-regular fa-heart" id="fav' . $row['receipt_id'] .'"></i>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
    }
}
;
?>