<?php
require_once('./conn.php');

if (isset($_POST['consulta'])) {
    $sql = $_POST['consulta'];
    $tipo = $_POST['tipo'];
} else {
    $sql = "SELECT * FROM receipts WHERE receipt_status = '1'";
}

$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    if ($tipo === 'entries') {
        echo '<table id="tabela_receitas"><thead class="table_row" style="background-color: #FF9A00; border-radius: 1vh 1vh 0 0;">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de envio</th>
<th>Tags</th>
            <th>Número total de acessos<i class="fa-solid fa-chevron-down"></i></th>
            <th>Link</th>
        </tr>
        </thead><tbody>';
    }

    while ($row = $result->fetch_assoc()) {
        $id = $row['receipt_id'];

        if ($tipo === 'entries') {
            echo '<tr class="table_row" id="' . $row['receipt_id'] . '">';
            echo '<td>' . $row['receipt_id'] . '</td>';
            echo '<td>' . $row['receipt_name'] . '</td>';
            echo '<td>' . $row['receipt_date_added'] . '</td>';
echo '<td>' . $row['receipt_tags'] . '</td>';
            echo '<td>' . $row['receipt_entries'] . '</td>';
            echo '<td><a href="https://wecooking.online/receipts/' . $row['receipt_id'] . '/index.php"><i class="fa-solid fa-square-up-right"></i></a></td>';
            echo '</tr>';

        }
    }
    echo '</tbody></table>';
}
;
?>