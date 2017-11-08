<?php
require_once 'cabecalho.php';

$cliente = new Cliente();

$cliente->setNome($_POST['nome']);
$cliente->setDataNasc($_POST['dataNasc']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setEmail($_POST['email']);

$clienteDAO = new ClienteDAO($conexao);

if ($clienteDAO->insereCliente($cliente)){
	$_SESSION["success"] = "Cliente {$cliente->getNome()} adicionado com sucesso!";
	header("Location: Cliente-lista.php");
	die();
} else {
<<<<<<< HEAD
<<<<<<< HEAD
	$_SESSION["danger"] = "Erro ao adicionar um novo Cliente!";
=======
	$_SESSION["danger"] = "Erro ao adicionar o Usuário!";
>>>>>>> parent of e0f8c65... Alteração da mensagem de erro no Adiciona usuário
=======
	$_SESSION["danger"] = "Erro ao adicionar o Usuário!";
>>>>>>> parent of e0f8c65... Alteração da mensagem de erro no Adiciona usuário
	header("Location: Cliente-lista.php");
	die();
}