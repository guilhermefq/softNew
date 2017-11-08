<?php require_once 'cabecalho.php';

$usuario->verificaUsuario();

$especieDAO = new EspecieDAO($conexao);
$especies = $especieDAO->listaEspecies();

?>


<h1 class="index">Espécie:</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>NCM</th>
            <th>Unidade</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($especies as $especie): ?>
            <tr>
                <td><?= $especie->getID() ?></td>
                <td><?= $especie->getDescricao() ?></td>
                <td><?= $especie->getPreco() ?></td>
                <td><?= $especie->getNCM() ?></td>
                <td><?= $especie->getUnidade()->getDescricao() ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?php require_once 'rodape.php'; ?>