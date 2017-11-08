<?php
require_once 'cabecalho.php';

$uDAO = new UsuarioDAO($conexao);

if($uDAO->removeUsuario($_POST['id'])){
	$_SESSION["success"] = "Usuário deletado com sucesso!";
	header("Location: Usuario-lista.php");	
	die();
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Erro ao deletar o usuário! Erro: {$msg}";
	header("Location: Usuario-lista.php");
	die();	
}
