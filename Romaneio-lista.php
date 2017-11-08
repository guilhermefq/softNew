<?php
require_once 'cabecalho.php';

$usuario->verificaUsuario();

$romaneioDAO = new RomaneioDAO($conexao);
$romaneios    = $romaneioDAO->listaRomaneios();

?>

<h1 class="index">Romaneios:</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Cliente</th>
            <th>Especie</th>
            <th>Peso Bruto</th>
            <th>Tara</th>
            <th>Peso Liquido</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($romaneios as $romaneio) :?>
            <tr>
                <td><?= $romaneio->getID() ?></td>
                <td><?= $romaneio->getTipo() ?></td>
                <td><?= $romaneio->getCliente()->getNome() ?></td>
                <td><?= $romaneio->getEspecie()->getDescricao() ?></td>
                <td><?= $romaneio->getPesoBruto() ?></td>
                <td><?= $romaneio->getTara() ?></td>
                <td><?= $romaneio->getPesoLiquido() ?></td>
                <td>
					<form method="post" action="Romaneio-deleta.php">
						<input type="hidden" name="id" value="<?=$romaneio->getID()?>">
						<button type="submit" class="btn btn-danger">Deletar</button>
					</form>
				</td>
            </tr>
        <?php endforeach ?>
    </tbody>    

</table>

<?php require_once 'rodape.php';