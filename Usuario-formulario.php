<?php
require_once 'cabecalho.php';

$usuario->verificaUsuario();

$daoU    = new UsuarioDAO($conexao);
$action = "Usuario-adiciona.php";

if(isset($_GET['id'])){
	$action = "Usuario-altera.php";
	$usuario = $daoU->buscaUsuario($_GET['id']);
}

?>

<form action="<?=$action?>" method="post" class="form-horizontal">
	<div class="row">
		<h1>Cadastro de Usuário</h1>
		<input type="hidden" name="id" value="<?=$usuario->getID()?>">

		<div class="form-group">
			<label class="col-lg-3 control-label" for="nome">Nome:</label>
			<div class="col-lg-8">
				<input type="text" name="nome" id="nome" class="form-control" value="<?=$usuario->getNome()?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label" for="login">Login:</label>
			<div class="col-lg-8">
				<input type="text" name="login" id="login" class="form-control" value="<?=$usuario->getLogin()?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label" for="senha">Senha:</label>
			<div class="col-lg-8">
				<input type="password" name="senha" id="senha" class="form-control" value="<?=$usuario->getSenha()?>">
			</div>
		</div>

		<div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <input class="btn btn-success" type="submit" value="Salvar">
            </div>
        </div>
	</div>
</form>

<?php require_once 'rodape.php' ?>