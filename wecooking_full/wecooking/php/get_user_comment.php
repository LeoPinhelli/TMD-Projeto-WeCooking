<?php
require_once('./conn.php');

$id = $_POST['userId'];

$sql = "SELECT * FROM users WHERE user_id = '$id' ";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        //echo $row['user_id'] . ",";
        echo $row['user_name'] . ",";
        //echo $row['user_email'] . ",";
        
        echo $row['user_photo'];
    }
}
;

?>