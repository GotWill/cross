<?php

// Inclui os arquivos do phpmailer localizados na pasta php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('Exception.php');
require_once('PHPMailer.php');

if($_POST){
 	$mailpincipal = "contato@crosspollination.com.br";
	//variáveis	
	$email		        = utf8_decode(filter_var($_POST['email'], FILTER_SANITIZE_STRING));
	$emailResponsavel   = utf8_decode(filter_var($_POST['email_responsavel'], FILTER_SANITIZE_STRING));
    $emailResponsavel1 = utf8_decode(filter_var($_POST['email_responsavel1'], FILTER_SANITIZE_STRING));
    $emailResponsavel2 = utf8_decode(filter_var($_POST['email_responsavel2'], FILTER_SANITIZE_STRING));
    $emailResponsavel3 = utf8_decode(filter_var($_POST['email_responsavel3'], FILTER_SANITIZE_STRING));
    $emailResponsavel4 = utf8_decode(filter_var($_POST['email_responsavel4'], FILTER_SANITIZE_STRING));

	$email_remetente    = "$email"; //recepient
	$nome_remetente 	= utf8_decode("Cross Pollination");
	
	require_once('corpo-email2.php');

	$mail = new PHPMailer();
	$mail->SMTPDebug = 2;
	$mail->isHTML(true);
	$mail->SetFrom($mailpincipal, $nome_remetente); //Name is optional
	$mail->Subject   = utf8_decode('E-mail de agradecimento');
	$mail->Body      = utf8_decode($corpoEmail);
	$mail->AddAddress($email_remetente);
	if (isset($emailResponsavel)) {
		$mail->addBCC($emailResponsavel);
	}
	if (isset($emailResponsavel1)) {
		$mail->addBCC($emailResponsavel1);
	}
	if (isset($emailResponsavel2)) {
		$mail->addBCC($emailResponsavel2);
	}
	if (isset($emailResponsavel3)) {
		$mail->addBCC($emailResponsavel3);
	}
	if (isset($emailResponsavel4)) {
		$mail->addBCC($emailResponsavel4);
	}
	if (isset($emailResponsavel5)) {
		$mail->addBCC($emailResponsavel5);
	}
	$email_enviado = $mail->Send();
	/**/


	if($email_enviado){
		$response_array['status'] = "success";
	}
	else{
		$response_array['status'] = "error";
	}
}
else{
	$response_array['status'] = "vazio";
}

header('Content-type: application/json');
echo json_encode($response_array);

?>