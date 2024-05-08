<?php
require_once('./conn.php');

$user = $_POST['userId'];
$receita = $_POST['receitaId'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comments (comment, user_id, receipt_id) 
	VALUES ('$comment', '$user', '$receita')";
if (mysqli_query($conn, $sql)) {

} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>