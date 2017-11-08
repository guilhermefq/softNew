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
	$_SESSION["danger"] = "Erro ao adicionar um novo cliente!";
	header("Location: Cliente-lista.php");
	die();
}