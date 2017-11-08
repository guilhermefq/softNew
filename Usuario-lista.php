<?php
require_once 'cabecalho.php';

$usuario->verificaUsuario();

$usuarioDao = new UsuarioDAO($conexao);
$usuarios   = $usuarioDao->listaUsuarios();
?>

<h1 class="index">Usuários:</h1>


<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Login</th>
			<th>Senha</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($usuarios as $usuario) {?>
			<tr>
				<td><?=$usuario->getID();?></td>
				<td><?=$usuario->getNome();?></td>
				<td><?=$usuario->getLogin();?></td>
				<td><?=$usuario->getSenha();?></td>
				<td>
					<a class="btn btn-primary" href="Usuario-formulario.php?id=<?=$usuario->getId()?>"> Alterar</a>
				</td>
				<td>
					<form method="post" action="Usuario-deleta.php">
						<input type="hidden" name="id" value="<?= $usuario->getID() ?>">
						<button type="submit" class="btn btn-danger">Deletar</button>
					</form>
				</td>
			</tr>
		<?php }?>
	</tbody>
</table>

<?php require_once 'rodape.php';?>
