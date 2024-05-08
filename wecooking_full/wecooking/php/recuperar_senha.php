<?php
require_once('./conn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
	// Store a string into the variable which
	// need to be Encrypted
	$cryptMail = $email;
	// Store the cipher method
	$ciphering = "AES-128-CTR";
	// Use OpenSSl Encryption method
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	// Non-NULL Initialization Vector for encryption
	$encryption_iv = '1234567891011121';
	// Store the encryption key
	$encryption_key = "weCooking";
	// Use openssl_encrypt() function to encrypt the data
	$encryptedEmail = openssl_encrypt(
		$email,
		$ciphering,
		$encryption_key,
		$options,
		$encryption_iv
	);
	while ($row = $result->fetch_assoc()) {
		require_once('./mail/src/PHPMailer.php');
		require_once('./mail/src/SMTP.php');
		require_once('./mail/src/Exception.php');
		$mail = new PHPMailer(true);
		try {
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'we.cooking.emails@gmail.com';
			$mail->FromName = 'WeCooking';
			$mail->Password = 'ndguytzeglnqauic';
			$mail->Port = 587;
			$mail->setFrom('we.cooking.emails@gmail.com');
			$mail->addAddress($email);
			$mail->addAddress('we.cooking.emails@gmail.com');
			$mail->isHTML(true);
			$mail->Subject = 'WeCooking | Recuperar Senha';
			$mail->Body = '
		<html lang="pt">
		<head>
			<link rel="stylesheet" href="../styles/email.css">
			<title>Recuperar Senha</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		</head>
		<body style="font-size: 1.8vh; color: #000">
			<div style="height: 100%;width: 100%;display: flex;flex-direction: column;align-items: center;justify-content: center;">
				<div style="height: auto;width: 40vw;align-items: center;">
					<div style="height: auto; width: 100%; background-color: orange; padding: 2vh;">
						<img src="http://wecooking.online/assets/logo.png" style="height: 10vh" />
					</div>
					<div style="padding: 3vh;">
						<p>Olá ' . $row['user_name'] . ',</p>
						<p style="margin: 0">Clique no botão abaixo para recuperar a senha de sua conta:</p>
						<a href="https://wecooking.online/redefinir_senha.php#' . $email . '" target="_blank" rel="noopener noreferrer" class="button-link">
							<button style="padding: 2vh 2.5vw;
							border-radius: 2vh;
							border: none;
							outline: none;
							font-size: 1.9vh;
							color: #000;
							font-weight: 700;
							text-transform: uppercase;
							background-color: orange;
							text-align: center;
							cursor: pointer;
							margin: 3vh 0;">Recuperar Senha</button>
						</a>
						<div class="link">
							<p style="margin: 0">Caso o botão não funcione, utilize o link abaixo:</p>
							<a href="https://wecooking.online/redefinir_senha.php#' . $email . '" target="_blank" rel="noopener noreferrer">
							http://wecooking.online/redefinir_senha.php#' . $encryptedEmail . '
							</a>
						</div>
						<p class="ignore">Se você não solicitou a alteração de sua senha, por favor ignore esse e-mail.</p>
						<p class="greetings">Obrigado, <br>Equipe WeCooking</p>
					</div>
					<div style="height: auto; width: 100%; background-color: orange; padding: 2vh;">
						<div class="contato">Entre em contato:</div>
						<div class="contatos">
							<a href="mailto:we.cooking.emails@gmail.com" target="_blank"
								rel="noopener noreferrer">we.cooking.emails@gmail.com</a><span> | </span>
							<a href="mailto:tiago.budziak@escola.pr.gov.br" target="_blank"
								rel="noopener noreferrer">tiago.budziak@escola.pr.gov.br</a><span> | </span>
							<a href="#" target="_blank"
								rel="noopener noreferrer">+55 (41) 9 9999-8888</a>
						</div>
					</div>
				</div>
			</div>
		</body>
		</html>
		';
			if ($mail->send()) {
				echo 'Email enviado com sucesso';
			} else {
				echo 'Email nao enviado';
			}
		} catch (Exception $e) {
			echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
		}
		echo json_encode('' . 1 . "*" . $email);
	}
} else {
	echo json_encode('' . 0);
}
?>