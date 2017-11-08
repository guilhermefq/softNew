<?php
require_once 'cabecalho.php';

$cDAO = new ClienteDAO($conexao);

if($cDAO->deletaCliente($_POST['id'])){
	$_SESSION["success"] = "Cliente deletado com sucesso!";
	header("Location: Cliente-lista.php");	
	die();
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Erro ao deletar o cliente! Erro: {$msg}";
	header("Location: Cliente-lista.php");
	die();	
}
