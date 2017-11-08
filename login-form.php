<?php
require_once 'cabecalho.php';
?>
<h2>Login</h2>
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4">
			<form action="login.php" method="post" class="form-signin">
				<div class="form-group">
					<label for="">Login:</label>
					<input type="text" name="login" class="form-control">
				</div>

				<div class="form-group">
					<label for="">Senha:</label>
					<input type="password" name="pass" class="form-control">
				</div>

				<button class="btn btn-primary" type="submit">Login</button>
			</form>
		</div>
	</div>

<?php require_once 'rodape.php';?>