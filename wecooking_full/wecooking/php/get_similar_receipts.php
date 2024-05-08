<?php
require_once('./conn.php');

$receiptID = $_POST['receiptId'];

$sql = "SELECT * FROM receipts WHERE receipt_id = '$receiptID'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {

        $tag = explode(",", $row['receipt_tags']);
        $nTags = count($tag);

        switch ($nTags) {
            case 1:
                $sqlReceipts = "SELECT * FROM receipts WHERE (receipt_tags LIKE '%$tag[0]%') AND receipt_status = '1' AND receipt_id != '$receiptID' LIMIT 4";
                break;
            case 2:
                $sqlReceipts = "SELECT * FROM receipts WHERE (receipt_tags LIKE '%$tag[0]%' OR receipt_tags LIKE '%$tag[1]%') AND receipt_status = '1' AND receipt_id != '$receiptID' LIMIT 4";
                break;
            case 3:
                $sqlReceipts = "SELECT * FROM receipts WHERE (receipt_tags LIKE '%$tag[0]%' OR receipt_tags LIKE '%$tag[1]%' OR receipt_tags LIKE '%$tag[2]%') AND receipt_status = '1' AND receipt_id != '$receiptID' LIMIT 4";
                break;
            case 4:
                $sqlReceipts = "SELECT * FROM receipts WHERE (receipt_tags LIKE '%$tag[0]%' OR receipt_tags LIKE '%$tag[1]%' OR receipt_tags LIKE '%$tag[2]%' OR receipt_tags LIKE '%$tag[3]%') AND receipt_status = '1' AND receipt_id != '$receiptID' LIMIT 4";
                break;
            case 5:
                $sqlReceipts = "SELECT * FROM receipts WHERE (receipt_tags LIKE '%$tag[0]%' OR receipt_tags LIKE '%$tag[1]%' OR receipt_tags LIKE '%$tag[2]%' OR receipt_tags LIKE '%$tag[3]%' OR receipt_tags LIKE '%$tag[4]%') AND receipt_status = '1' AND receipt_id != '$receiptID' LIMIT 4";
                break;
            default:
                break;
        }

        $resultReceipts = $conn->query($sqlReceipts);

        if ($resultReceipts->num_rows >= 1) {
            while ($rowReceipts = $resultReceipts->fetch_assoc()) {
                $tag = explode(",", $rowReceipts['receipt_tags']);
                $id = $rowReceipts['receipt_id'];
                //echo $row['id_receita'];

                echo '<a href="https://wecooking.online/receipts/' . $rowReceipts['receipt_id'] . '/index.php">';
                echo '<div class="receita" id="rec' . $rowReceipts['receipt_id'] . '">';
                echo '<div class="tag">';
                echo '<p class="tag' . $rowReceipts['receipt_id'] . '">' . $tag[0] . '</p>';

                $sqlAvals = "SELECT * FROM ratings WHERE receipt_id = '$id'";
                $resultAvals = $conn->query($sqlAvals);

                if ($resultAvals->num_rows >= 1) {
                    $avalNum = 0;
                    $avalLen = '';

                    while ($rowAval = $resultAvals->fetch_assoc()) {
                        $avalLen = $rowAval['rating'] . $avalLen;
                        $avalNum = $rowAval['rating'] + $avalNum;
                    }

                    echo '<span>' . round(($avalNum / strlen($avalLen)), 1) . ' <i class="fa-solid fa-star"></i></span>';
                }

                echo '</div>';

                //echo '<br>' . $row['ingredientes'];
                //echo '<p class="receipt_difficulty">' . $row['receipt_difficulty'] . '</p></span></div>';
                //echo '<br>' . $row['data_adicionada'];

                // Image selecting
                if ($rowReceipts['receipt_images']) {
                    $imageLink = explode(",", $rowReceipts['receipt_images']);
                    echo '<img class="receipt_image" src="https://wecooking.online/receipts/' . $rowReceipts['receipt_id'] . '/' . $imageLink[1] . '">';
                }

                echo '<p>' . $rowReceipts['receipt_name'] . '</p>';
                echo '<div class="info">';
                echo '<p class="tempo">' . $rowReceipts['receipt_time'] . ' MIN &nbsp;</p>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
        }

        /*
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

         $sqlFavs = "SELECT * FROM favorites WHERE receipt_id = '$id'";
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
        } 

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
        */
    }
}
;
?>