<?php
require_once('./conn.php');

$sql = "SELECT * FROM receipts WHERE receipt_status = 0 AND receipt_name LIKE '%(user)%'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    echo '<table id="tabela_receitas"><thead class="table_row" style="background-color: #FF9A00; border-radius: 1vh 1vh 0 0;">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tempo de Preparo</th>
            <th>Dificuldade</th>
            <th>Link</th>
            <th>Excluir</th>
        </tr>
        </thead><tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr class="table_row" id="' . $row['receipt_id'] . '">';
        echo '<td>' . $row['receipt_id'] . '</td>';
        echo '<td>' . $row['receipt_name'] . '</td>';

        echo '<td>' . $row['receipt_time'] . ' minutos</td>';
        //echo '<br>' . $row['ingredientes'];
        echo '<td>' . $row['receipt_difficulty'] . '</td>';

        echo '<td><a href="https://wecooking.online/receipts_user/'. $row['receipt_id'] .'/index.php"><i class="fa-solid fa-square-up-right"></i></a></td>';
        echo '<td><i class="fa-solid fa-trash"></i></td>';
        echo '</tr>';

    }
    echo '</tbody></table>';
}
;
?>