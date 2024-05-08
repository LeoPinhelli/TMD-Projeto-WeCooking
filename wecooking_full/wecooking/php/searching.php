<?php
require_once('./conn.php');

if (isset($_POST['searchValue'])) {
    $searchVal = $_POST['searchValue'];

    $values = explode("%20", $searchVal);
    $numValues = count($values);

    if ($numValues >= 2) {
        $searchValue = str_replace("%20", " ", $searchVal);

        $sql = "SELECT * FROM receipts WHERE receipt_status = '1' AND receipt_name LIKE '%$searchValue%' OR receipt_status = '1' AND receipt_tags LIKE '%$values[0]%' AND receipt_tags LIKE '%$values[1]%'";
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

                    echo '<span>' . round(($avalNum / strlen($avalLen)), 1) . ' <i class="fa-solid fa-star"></i></span>';
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
                echo '<i class="fa-regular fa-heart" id="fav' . $row['receipt_id'] . '"></i>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
        } else {
            echo '<span>Nenhum resultado encontrado.</span>';
        }
    } else if ($numValues = 1) {
        $sql = "SELECT * FROM receipts WHERE receipt_status = '1' AND receipt_tags LIKE '%$values[0]%' OR receipt_status = '1' AND receipt_name LIKE '%$values[0]%' ";
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

                    echo '<span>' . round(($avalNum / strlen($avalLen)), 1) . ' <i class="fa-solid fa-star"></i></span>';
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
                echo '<i class="fa-regular fa-heart" id="fav' . $row['receipt_id'] . '"></i>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
            ;
        } else {
            echo '<span>Nenhum resultado encontrado.</span>';
        }
        ;
    }
}

if (isset($_POST['consultaSql'])) {
    $querySql = $_POST['consultaSql'];

    if (isset($_POST['tag'])) {
        $tag = $_POST['tag'];

        $consulta = str_replace('$tag', "'%" . $tag . "%'", $querySql);

        $sql = $consulta;
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

                    echo '<span>' . round(($avalNum / strlen($avalLen)), 1) . ' <i class="fa-solid fa-star"></i></span>';
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
                echo '<i class="fa-regular fa-heart" id="fav' . $row['receipt_id'] . '"></i>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
            ;
        } else {
            echo '<span>Nenhum resultado encontrado.</span>';
        }
        ;
    } else if (isset($_POST['tags'])) {
        $nTags = $_POST['tags'];

        $tDeT = 0;

        if (isset($_POST['ingrsTags'])) {
            $ingrsTags = $_POST['ingrsTags'];
            //var_dump($ingrsTags);
        }
        if (isset($_POST['categTags'])) {
            $categTags = $_POST['categTags'];
            //var_dump($categTags);
        }

        if (isset($categTags) && isset($ingrsTags)) { // Se uma CATEGORIA e um INGREDIENTE estiverem selecionados
            $nCategs = count($categTags);
            $nIngrs = count($ingrsTags);

            if ($nCategs === $nIngrs) {

                if ($nCategs === 1) {

                    $consulta = str_replace('$tag', "'%" . $categTags[0] . "%' AND receipt_tags LIKE '%" . $ingrsTags[0] . "%'otherTags", $querySql);

                } else {

                    $consulta = str_replace('(receipt_tags LIKE $tag', "(otherTags", $querySql);

                    for ($i = 0; $i < $nCategs; $i++) {
                        $consulta = str_replace('otherTags', "receipt_tags LIKE '%" . $categTags[0] . "%' AND receipt_tags LIKE '%" . $ingrsTags[$i] . "%' OR otherTags", $consulta);
                    }

                    for ($i = 1; $tDeT < $nCategs; $tDeT++) {
                        $consulta = str_replace('otherTags', " receipt_tags LIKE '%" . $categTags[$i] . "%' AND receipt_tags LIKE '%" . $ingrsTags[$tDeT] . "%' ORotherTags", $consulta);
                    }

                    $consulta = str_replace('ORotherTags', "otherTags", $consulta);

                }

            } else if ($nCategs > $nIngrs) {

                $consulta = str_replace('$tag', "'%" . $categTags[0] . "%' AND receipt_tags LIKE '%" . $ingrsTags[0] . "%'otherTags", $querySql);

                for ($i = 1; $i < $nCategs; $i++) {
                    $consulta = str_replace('otherTags', " OR receipt_tags LIKE '%" . $categTags[$i] . "%' AND receipt_tags LIKE '%" . $ingrsTags[($i - 1)] . "%'otherTags", $consulta);
                }

            } else if ($nCategs < $nIngrs) {

                $consulta = str_replace('(receipt_tags LIKE $tag', "(otherTags", $querySql);

                for ($c = 0; $c < $nCategs; $c++) {

                    for ($i = 0; $i < $nIngrs; $i++) {

                        $consulta = str_replace('otherTags', " receipt_tags LIKE '%" . $categTags[$c] . "%' AND receipt_tags LIKE '%" . $ingrsTags[$i] . "%' ORotherTags", $consulta);

                    }

                }

                $consulta = str_replace('ORotherTags', "otherTags", $consulta);

            }

            $consulta = str_replace('otherTags', ") AND receipt_status = '1'", $consulta);

            $sql = $consulta;
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

                        echo '<span>' . round(($avalNum / strlen($avalLen)), 1) . ' <i class="fa-solid fa-star"></i></span>';
                    }
                    echo '</div>';

                    // Image selecting
                    if ($row['receipt_images']) {
                        $imageLink = explode(",", $row['receipt_images']);
                        echo '<img class="receipt_image" src="./receipts/' . $row['receipt_id'] . '/' . $imageLink[1] . '">';
                    }

                    echo '<p>' . $row['receipt_name'] . '</p>';
                    echo '<div class="info">';
                    echo '<p class="tempo">' . $row['receipt_time'] . ' MIN &nbsp;</p>';
                    echo '<i class="fa-regular fa-heart" id="fav' . $row['receipt_id'] . '"></i>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                }
                ;
            } else {
                echo '<span>Nenhum resultado encontrado.</span>';
            }
        }
        /*
        
        

        for ($i = 1; $i < $nTags; $i++) {
            $consulta = str_replace('otherTags', " OR receipt_tags LIKE '%" . $tags[$i] . "%'otherTags", $consulta);
        }
        ;

        $consulta = str_replace('otherTags', ") AND receipt_status = '1'", $consulta);

        
        */
    } else if (isset($_POST['avals'])) {
        $numAvals = $_POST['avals'];

        $sql = $querySql;
        $result = $conn->query($sql);

        if ($result->num_rows >= 1) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['receipt_id'];

                $sqlAvals = "SELECT * FROM ratings WHERE receipt_id = '$id'";
                $resultAvals = $conn->query($sqlAvals);

                if ($resultAvals->num_rows >= 1) {
                    $avalNum = 0;
                    $avalLen = '';

                    while ($rowAval = $resultAvals->fetch_assoc()) {
                        $avalLen = $rowAval['rating'] . $avalLen;
                        $avalNum = $rowAval['rating'] + $avalNum;
                    }

                    if (($avalNum / strlen($avalLen)) >= intval($numAvals) && ($avalNum / strlen($avalLen)) < (intval($numAvals) + 1)) { // Se a receita tiver a nota pediada
                        $sqlReceita = "SELECT * FROM receipts WHERE receipt_status = '1' AND receipt_id = '$id'";
                        $resultReceita = $conn->query($sqlReceita);

                        if ($resultReceita->num_rows >= 1) {
                            while ($rowReceita = $resultReceita->fetch_assoc()) {
                                $tagReceita = explode(",", $rowReceita['receipt_tags']);
                                $idReceita = $rowReceita['receipt_id'];
                                //echo $row['id_receita'];

                                echo '<a href="./receipts/' . $rowReceita['receipt_id'] . '/index.php">';
                                echo '<div class="receita" id="rec' . $rowReceita['receipt_id'] . '">';
                                echo '<div class="tag">';
                                echo '<p class="tag' . $rowReceita['receipt_id'] . '">' . $tagReceita[0] . '</p>';

                                $sqlAvals2 = "SELECT * FROM ratings WHERE receipt_id = '$idReceita'";
                                $resultAvals2 = $conn->query($sqlAvals2);

                                if ($resultAvals2->num_rows >= 1) {
                                    $avalNum2 = 0;
                                    $avalLen2 = '';

                                    while ($rowAval2 = $resultAvals2->fetch_assoc()) {
                                        $avalLen2 = $rowAval2['rating'] . $avalLen2;
                                        $avalNum2 = $rowAval2['rating'] + $avalNum2;
                                    }

                                    echo '<span>' . round(($avalNum2 / strlen($avalLen2)), 1) . ' <i class="fa-solid fa-star"></i></span>';
                                }
                                echo '</div>';

                                // Image selecting
                                if ($rowReceita['receipt_images']) {
                                    $imageLink = explode(",", $row['receipt_images']);
                                    echo '<img class="receipt_image" src="./receipts/' . $rowReceita['receipt_id'] . '/' . $imageLink[1] . '">';
                                }

                                echo '<p>' . $rowReceita['receipt_name'] . '</p>';
                                echo '<div class="info">';
                                echo '<p class="tempo">' . $rowReceita['receipt_time'] . ' MIN &nbsp;</p>';
                                echo '<i class="fa-regular fa-heart" id="fav' . $rowReceita['receipt_id'] . '"></i>';
                                echo '</div>';
                                echo '</div>';
                                echo '</a>';
                            }
                        }
                    }
                }
            }
        } else {
            echo '0';
        }
    }

}
?>