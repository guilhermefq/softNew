<?php
require_once 'cabecalho.php';

$rDAO = new RomaneioDAO($conexao);

if($rDAO->deletaRomaneio($_POST['id'])){
	$_SESSION["success"] = "Romaneio deletado com sucesso!";
	header("Location: Romaneio-lista.php");	
	die();
} else {
	$_SESSION["danger"] = "Erro ao deletar o romaneio!";
	header("Location: Romaneio-lista.php");
	die();	
}
