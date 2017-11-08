<?php
require_once 'cabecalho.php';

$usuario->verificaUsuario();

$clienteDAO = new ClienteDAO($conexao);
$cliente = new Cliente();
$clientes = $clienteDAO->listarClientes();

?>


<h1 class="index">Lista de Clientes:</h1>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Data Nasc</th>
			<th>Telefone</th>
			<th>Email</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($clientes as $cliente) { ?>
			<tr>
				<td><?=$cliente->getID()?></td>
				<td><?=$cliente->getNome()?></td>
				<td><?php
					$timestamp = strtotime($cliente->getDataNasc());
					echo date('d/m/Y', $timestamp);
					?></td>
				<td><?=$cliente->getTelefone()?></td>
				<td><?=$cliente->getEmail()?></td>
				<td>
					<a class="btn btn-primary" href="Cliente-formulario.php?id=<?=$cliente->getID()?>">Alterar</a>
				</td>
				<td>
					<form method="post" action="Cliente-deleta.php">
						<input type="hidden" name="id" value="<?=$cliente->getID()?>">
						<button type="submit" class="btn btn-danger">Deletar</button>
					</form>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<?php require_once 'rodape.php' ?>