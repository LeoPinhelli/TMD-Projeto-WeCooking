<?php
require_once('./conn.php');

$recNome = $_POST['nome']; // Nome da receita
$nome = $recNome . '(user)';
$preparo = $_POST['tempo-preparo']; // Tempo de preparo

$ingrs = $_POST['ingredientes']; // Ingredientes
$modo_preparo = $_POST['modo-preparo']; // Número de passos no modo de preparo

$dificuldade = $_POST['dificuldade']; // Dificuldade da receita
$data = date("Y-m-d H:i:s"); // Data e horário na qual a receita foi adiciona

$ingredientes = preg_replace('/\s\s+/', ',', $ingrs);
$modo_de_preparo = preg_replace('/\s\s+/', ',', $modo_preparo);


$sql = "INSERT INTO receipts (receipt_name, receipt_time, receipt_ingredients, receipt_date_added, receipt_difficulty, receipt_images, receipt_tags, receipt_status, receipt_entries, receipt_ingredients_filling, receipt_ingredients_coverage, receipt_preparation, receipt_filling_preparation, receipt_coverage_preparation) 
	VALUES ('$nome', '$preparo', '$ingredientes', '$data', '$dificuldade', '', '', '0', '0', '', '', '$modo_de_preparo', '', '')";
if (mysqli_query($conn, $sql)) {
	echo "*" . json_encode(mysqli_insert_id($conn));
	$id = json_encode(mysqli_insert_id($conn));
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>