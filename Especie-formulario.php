<?php require_once 'cabecalho.php';

$usuario->verificaUsuario();

$unidade = new Unidade();
$unidade->setID(1);

$eDAO = new EspecieDAO($conexao);
$especie = new Especie(" ",0," ",$unidade);

$uDAO = new UnidadeDAO($conexao);
$unidades = $uDAO->listaUnidades();

$action = 'Especie-adiciona.php';

if(isset($_GET['id'])){
    $action = "Especie-altera.php";
    $especie = $uDAO->buscaEspecie($_GET['id']);
}
?>

<form action="<?=$action?>" method="post" class="form-horizontal">
    <div class="row">
        <h1>Cadastro de Especie: </h1>
        <input type="hidden" name="id" value="<?=$especie->getID()?>">

        <div class="form-group">
            <label class="col-lg-3 control-label" for="descricao">Descrição:</label>
            <div class="col-lg-8">
                <input type="text" name="descricao" value="<?=$especie->getDescricao()?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label" for="preco">Preço:</label>
            <div class="col-lg-8">
                <input type="number" step="0.0001" name="preco" value="<?=$especie->getPreco()?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label" for="ncm">NCM:</label>
            <div class="col-lg-8">
                <input type="text" name="ncm" value="<?=$especie->getNCM()?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label" for="unidade">Unidade:</label>
            <div class="col-lg-8">
                <select name="unidade_id" class="form-control">
                    <?php foreach($unidades as $unidade):
                        $esseEhaUnidade = $especie->getUnidade()->getID() == $unidade->getID();
                        $selecao = $esseEhaUnidade ? "select='selected'" : "";
                    ?>
                    <option value="<?=$unidade->getID()?>" <?=$selecao?>>
                        <?=$unidade->getDescricao()?>
                    </option>
                    <?php
                        endforeach
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <input class="btn btn-success" type="submit" value="Gravar">
            </div>            
        </div>
    </div>    
</form>

