<?php
require_once('./conn.php');

$nome = $_POST['nome']; // Nome da receita
$preparo = $_POST['tempo-preparo']; // Tempo de preparo

$num_ingrs = $_POST['ingredientes']; // Número de ingredientes
$num_passos = $_POST['passos-preparo']; // Número de passos no modo de preparo

$dificuldade = $_POST['dificuldade']; // Dificuldade da receita
$data = date("Y-m-d H:i:s"); // Data e horário na qual a receita foi adiciona

$ingredientes = "";
$modo_preparo = "";

$ingrs_cober = "";
$preparo_cober = "";

$ingrs_rech = "";
$preparo_rech = "";

$tags = $_POST['tagsSelected'];

for ($i = 1; $i <= $num_ingrs; $i++) {
	$ingrediente = $_POST['ingrediente'.$i];
	$ingredientes = $ingredientes . ',' . $ingrediente;
}

for ($a = 1; $a <= $num_passos; $a++) {
	$passo = $_POST['passo'.$a];
	$modo_preparo = $modo_preparo . '/' . $passo;
}

if ($_POST['recheio'] === 'sim'){
	$num_rech_ingrs = $_POST['ingredientes-recheio'];
	$num_passos_rech = $_POST['passos-recheio'];

	for ($i = 1; $i <= $num_rech_ingrs; $i++) {
		$ingr_rech = $_POST['ingrediente-rech'.$i];
		$ingrs_rech = $ingrs_rech . ',' . $ingr_rech;
	}

	for ($a = 1; $a <= $num_passos_rech; $a++) {
		$passo_rech = $_POST['passo-recheio'.$a];
		$preparo_rech = $preparo_rech . '/' . $passo_rech;
	}
}

if ($_POST['cobertura'] === 'sim'){
	$num_cober_ingrs = $_POST['ingredientes-cobertura'];
	$num_passos_cober = $_POST['passos-cobertura'];

	for ($i = 1; $i <= $num_cober_ingrs; $i++) {
		$ingr_cober = $_POST['ingrediente-cober'.$i];
		$ingrs_cober = $ingrs_cober . ',' . $ingr_cober;
	}

	for ($a = 1; $a <= $num_passos_cober; $a++) {
		$passo_cober = $_POST['passo-cobertura'.$a];
		$preparo_cober = $preparo_cober . '/' . $passo_cober;
	}
}


$sql = "INSERT INTO receipts (receipt_name, receipt_time, receipt_ingredients, receipt_date_added, receipt_difficulty, receipt_images, receipt_tags, receipt_status, receipt_entries, receipt_ingredients_filling, receipt_ingredients_coverage, receipt_preparation, receipt_filling_preparation, receipt_coverage_preparation) 
	VALUES ('$nome', '$preparo', '$ingredientes', '$data', '$dificuldade', '', '$tags', '1', '0', '$ingrs_rech', '$ingrs_cober', '$modo_preparo', '$preparo_rech', '$preparo_cober')";
if (mysqli_query($conn, $sql)) {
	echo "*" . json_encode(mysqli_insert_id($conn));
	$id = json_encode(mysqli_insert_id($conn));
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>