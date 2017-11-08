<?php
require_once 'cabecalho.php';

$usuario = new Usuario();
$usuario->setID($_POST['id']);
$usuario->setNome($_POST['nome']);
$usuario->setLogin($_POST['login']);

$uDAO = new UsuarioDAO($conexao);

if($uDAO->alteraUsuario($usuario)){ ?>
	<p class="alert alert-success">
		Usuario <?=$usuario->getNome()?> alterado com sucesso!
	</p>
<?php } else { 
	$msg = mysqli_error($conexao);
?>
	<p class="alert alert-danger">
		Erro ao alterar o usuario:<?= $msg ?>
	</p>
<?php } 
require_once 'rodape.php';
?>
