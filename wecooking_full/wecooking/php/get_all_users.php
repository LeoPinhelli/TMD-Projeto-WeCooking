<?php
require_once('./conn.php');

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    echo '<table id="tabela_receitas"><thead class="table_row" style="background-color: #FF9A00; border-radius: 1vh 1vh 0 0;">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Status</th>
            <th>Admin</th>
        </tr>
        </thead><tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr class="table_row" id="' . $row['user_id'] . '">';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['user_name'] . '</td>';

        echo '<td>' . $row['user_email'] . '</td>';
        if ($row['user_status'] === '1') {
            echo '<td class="active" id="status_1_' . $row['user_id'] . '">Ativo</td>';
        } else {
            echo '<td class="inactive" id="status_0_' . $row['user_id'] . '">Inativo</td>';
        }
        if ($row['user_admin'] === '1') {
            echo '<td><div class="checkbox checked" id="check_1_' . $row['user_id'] .'"></div></td>';
        } else {
            echo '<td><div class="checkbox" id="check_0_' . $row['user_id'] .'"></div></td>';
        }
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