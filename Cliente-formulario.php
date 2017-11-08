<?php
require_once 'cabecalho.php';

$usuario->verificaUsuario();

$daoC = new ClienteDAO($conexao);
$cliente = new Cliente();

$action = "Cliente-adiciona.php";

if(isset($_GET['id'])){
	$action = "Cliente-altera.php";
	$cliente = $daoC->buscaCliente($_GET['id']);
}

?>

<form action="<?=$action?>" method="post" class="form-horizontal">
	<div class="row">
		<h1>Cadastro de Clientes</h1>
		<input type="hidden" name="id" value="<?=$cliente->getID()?>">

		<div class="form-group">
			<label class="col-lg-3 control-label" for="nome">Nome:</label>
			<div class="col-lg-8">
				<input type="text" name="nome" id="nome" class="form-control" value="<?=$cliente->getNome()?>">
			</div>						
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label" for="dataNasc">Data Nasc:</label>
			<div class="col-lg-8">
				<input type="date" name="dataNasc" id="dataNasc" class="form-control" value="<?=$cliente->getDataNasc()?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label" for="telefone">Telefone:</label>
			<div class="col-lg-8">
				<input type="text" name="telefone" id="telefone" class="form-control" value="<?=$cliente->getTelefone()?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label" for="email">Email:</label>
			<div class="col-lg-8">
				<input type="email" name="email" id="email" class="form-control" value="<?=$cliente->getEmail()?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<div class="col-md-8">
				<input type="submit" class="btn btn-success" value="Salvar">
			</div>
		</div>
	</div>
</form>