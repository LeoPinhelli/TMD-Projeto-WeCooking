<?php
require_once('./conn.php');

$sql = "SELECT * FROM receipts WHERE receipt_name NOT LIKE '%(user)%'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    echo '<table id="tabela_receitas"><thead class="table_row" style="background-color: #FF9A00; border-radius: 1vh 1vh 0 0;">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de envio</th>
            <th>Status</th>
            <th>Link</th>
        </tr>
        </thead><tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr class="table_row" id="' . $row['receipt_id'] . '">';
        echo '<td>' . $row['receipt_id'] . '</td>';
        echo '<td>' . $row['receipt_name'] . '</td>';

        //echo '<span><p>' . $row['tempo_preparo'] . ' minutos &nbsp;</p>';
        //echo '<br>' . $row['ingredientes'];
        //echo '<p class="receipt_difficulty">' . $row['dificuldade'] . '</p></span></div>';

        echo '<td>' . $row['receipt_date_added'] . '</td>';
        if ($row['receipt_status'] === '1') {
            echo '<td class="active" id="status_1_'. $row['receipt_id'] .'">Aprovada</td>';
        } else {
            echo '<td class="inactive" id="status_0_'. $row['receipt_id'] .'">Pendente</td>';
        }
        echo '<td><a href="https://wecooking.online/receipts/'. $row['receipt_id'] .'/index.php"><i class="fa-solid fa-square-up-right"></i></a></td>';
        echo '</tr>';

        /* Multiple image selecting
        if ($row['images']) {
            $nImgs = count(explode(",", $row['images']));
            $imageLink = explode(",", $row['images']);
            for ($i = 1; $i < $nImgs; $i++) {
                echo '<img class="receipt_image" src="./receipts/'. $row['id_receita'] . '/' . $imageLink[$i] . '">';
            }
            echo '</div></a>';
        } */

        /* Image selecting
        if ($row['images']) {
            $imageLink = explode(",", $row['images']);
            echo '<img class="receipt_image" src="./receipts/' . $row['id_receita'] . '/' . $imageLink[1] . '"></div></a>';
        } */
    }
    echo '</tbody></table>';
}
;
?>