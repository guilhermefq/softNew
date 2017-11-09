<?php 
spl_autoload_register(function ($nomedaClasse){
	require_once("../softNew/class/".$nomedaClasse.".class.php");
});

$calculaSoma = function($a,$b){ return $a + $b; };

error_reporting(E_ALL ^ E_NOTICE);
require_once 'mostraAlerta.php';
require_once 'bd.php';
$usuario = new Usuario();
?>

<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>softNew 1.2 - Dev</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>

	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">softNew 1.2</a>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown">
        				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuário<b class="caret"></b></a>
        				<ul class="dropdown-menu">
          					<li><a href="Usuario-formulario.php">Adicionar</a></li>
          					<li><a href="Usuario-lista.php">Listar</a></li>
							<li><a href="Usuario-lista.php">Atualizar - Em Desenvolvimento</a></li>
        				</ul>
      				</li>
      				<li class="dropdown">
        				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes<b class="caret"></b></a>
        				<ul class="dropdown-menu">
          					<li><a href="Cliente-formulario.php">Adicionar</a></li>
          					<li><a href="Cliente-lista.php">Listar</a></li>
							<li><a href="Cliente-lista.php">Atualizar - Em desenvolvimento</a></li>  
        				</ul>
      				</li>
					<li class="dropdown">
        				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Romaneios<b class="caret"></b></a>
        				<ul class="dropdown-menu">
          					<li><a href="Romaneio-formulario.php">Adicionar</a></li>
          					<li><a href="Romaneio-lista.php">Listar</a></li>
        				</ul>
      				</li>
					<li class="dropdown">
        				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Espécies<b class="caret"></b></a>
        				<ul class="dropdown-menu">
          					<li><a href="Especie-formulario.php">Adicionar</a></li>
          					<li><a href="Especie-lista.php">Listar</a></li>
							<li><a href="Especie-lista.php">Atualizar - Em Desenvolvimento</a></li>
        				</ul>
      				</li>
					<li><a href="contato.php">Contato</a></li>
					<li><a href="about.php">Sobre</a></li>
					<?php if ($usuario->isLogado()) {?>
						<li><a href="logout.php"><?=$usuario->usuarioLogado()?>- Logout</a></li>
					<?php } else {?>
						<li><a href="login-form.php">Login</a></li>
					<?php }?>
				</ul>
			</div>
		</div>
	</nav>

	<main class="container">
		<article class="principal">

<?php 
	mostraAlerta("success");
	mostraAlerta("danger");
 ?>

