<?php
require_once 'cabecalho.php';

$usuarioDAO = new UsuarioDAO($conexao);
$usuario    = $usuarioDAO->validaUsuario($_POST['login'], $_POST['pass']);

if (!$usuario) {
	$_SESSION['danger'] = "Usuário ou senha inválida!";
	header("Location: index.php");
} else {
	$_SESSION['success'] = "Login efetuado com sucesso!";
	$usuario->logaUsuario($usuario);
	header("Location: index.php");
}

die();
