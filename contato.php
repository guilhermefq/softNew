<?php require_once 'cabecalho.php'; ?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form action="contatoEnvia.php" method="post">
			<table class="table">
				<tr>
					<td>Nome:</td>
					<td><input type="text" name="nome" class="form-control">
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="email" class="form-control">
				</tr>
				<tr>
					<td>Mensagem:</td>
					<td><textarea class="form-control" name="mensagem"></textarea></td>
				</tr>
				<tr>
					<td><button class="btn btn-primary">Enviar</button></td>
				</tr>
			</table>	
		</form>
	</div>
</div>

<?php require_once 'rodape.php' ?>