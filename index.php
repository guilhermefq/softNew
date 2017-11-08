<?php
require_once 'cabecalho.php';
?>

<h1 class="index">Bem Vindo!</h1>

<?php 
	if($usuario->isLogado()) { ?>
		<p class="alert alert-success h3 text-center">Você está logado como <?=$usuario->usuarioLogado()?>!</p>
<?php }	?>

<?php
require_once 'rodape.php';
?>