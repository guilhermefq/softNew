<?php
session_start();
require_once 'cabecalho.php';
require_once '../softNew/vendors/PHPMailer/PHPMailerAutoload.php';

$nome     = $_POST['nome'];
$email    = $_POST['email'];
$mensagem = $_POST['mensagem'];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Username = "conferencia4470@gmail.com";
$mail->Password = "confd4470";
$mail->Port = 587;

$mail-> setFrom("conferencia4470@gmail.com","softNew");
$mail->addAddress($email);

$mail->Subject = "Email de contato!";
$mail->msgHTML("<html> De: {$nome}<br/>Email: {$email}<br/>Mensagem: {$mensagem}</html>");
$mail->AltBody = "De: {$nome}\nEmail:{$email}\nMensagem:{$mensagem}"; //Texto alternativo

if($mail->send()){
	$_SESSION["success"] = "Email enviado com sucesso";
	header("Location: contato.php");
} else {
	$_SESSION["danger"] = "Erro ao enviar o e-mail: ".$mail->ErrorInfo;
	header("Location: contato.php");
}

die();

?>