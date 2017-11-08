<?php
require_once 'cabecalho.php';

$cliente = new Cliente();
$cliente->setID($_POST['id']);
$cliente->setNome($_POST['nome']);
$cliente->setDataNasc($_POST['dataNasc']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setEmail($_POST['email']);

$cDAO = new ClienteDAO($conexao);

if($cDAO->alteraCliente($cliente)) { 
	$_SESSION["success"] = "Cliente {$cliente->getNome()} alterado com sucesso!";
	header("Location: Cliente-lista.php");
	die();
} else { 
	$_SESSION["danger"] = "Erro ao alterar o Cliente!";
	header("Location: Cliente-lista.php");
	die();
} 
require_once 'rodape.php';
?>
