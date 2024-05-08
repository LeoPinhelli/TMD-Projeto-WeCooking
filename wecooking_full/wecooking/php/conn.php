<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<?php
	$servidor = 'mysql.wecooking.online'; // nome do servidor = localhost
	$usuario = 'wecooking'; //nome do usuário de acesso ao banco
	$senha = 'Wecooking123'; //senha do usuário: em branco e sem espaço
	$bd = "wecooking"; //nome do banco de dados que será aberto
	$conn = mysqli_connect($servidor, $usuario, $senha, $bd);

	// Check connection
	if (!($conn)) {
		die("Connection failed: " . mysqli_connect_error());
	}

	?>
</body>

</html>