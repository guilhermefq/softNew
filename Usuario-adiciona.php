<?php
require_once 'cabecalho.php';

$usuario = new Usuario();

$usuario->setNome($_POST['nome']);
$usuario->setLogin($_POST['login']);
$usuario->setSenha($_POST['senha']);

$usuarioDAO = new UsuarioDAO($conexao);

if ($usuarioDAO->insereUsuarios($usuario)){
	$_SESSION["success"] = "Usuario {$usuario->getNome()} adicionado com sucesso!";
	header("Location: Usuario-lista.php");
	die();
} else {
	$_SESSION["danger"] = "Erro ao adicionar o Usuário!";
	header("Location: Usuario-lista.php");
	die();
}