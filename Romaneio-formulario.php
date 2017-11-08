<?php
require_once 'cabecalho.php';

$usuario->verificaUsuario();

$cliente = new Cliente();
$cliente->setID(1);

$especie = EspecieFactory::create();
$especie->setID(1);

$romaneio = new Romaneio(" ",$cliente,$especie, 0, 0, 0);

$daoC = new ClienteDAO($conexao);
$clientes = $daoC->listarClientes();

$daoE = new EspecieDAO($conexao);
$especies = $daoE->listaEspecies();

$daoR = new RomaneioDAO($conexao);

$action = 'Romaneio-adiciona.php';

if(isset($_GET['id'])){
    $action = 'Romaneio-altera.php';
    $romaneio = $daoR->buscaRomaneio($_GET['id']);
}
?>

<form action="<?=$action?>" method="post" class="form-horizontal">
    <div class="row">
        <h1>Cadastro de Romaneios(E/S):</h1>
        <input type="hidden" name="id" value="<?=$romaneio->getID()?>">

        <div class="form-group">
            <label class="col-lg-3 control-label" for="tipo">Tipo:</label>
            <div class="col-lg-2">
                <select name="tipo" class="form-control">
                    <option value="Entrada">Entrada</option>   
                    <option value="Saida">Saída</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label" for="cliente">Produtor:</label>
            <div class="col-lg-8">
                <select name="cliente_id" class="form-control">
			        <?php foreach($clientes as $cliente) : 
                        $esseEhOCliente = $romaneio->getCliente()->getId() == $cliente->getId();
				        $selecao = $esseEhOCliente ? "selected='selected'" : "";
                	?>
				    <option value="<?=$cliente->getId()?>" <?=$selecao?>>
					    <?=$cliente->getNome()?>
				    </option>
		        	<?php 
    			        endforeach
			        ?>
        		</select>            
            </div>
        </div>        

        <div class="form-group">
            <label class="col-lg-3 control-label" for="especie">Espécie:</label>
            <div class="col-lg-8">
                <select name="especie" class="form-control">
			        <?php foreach($especies as $especie) : 
                        $essaEhAEspecie = $romaneio->getEspecie()->getId() == $especie->getId();
				        $selecao = $essaEhAEspecie ? "selected='selected'" : "";
                	?>
				    <option value="<?=$especie->getId()?>" <?=$selecao?>>
					    <?=$especie->getDescricao()?>
				    </option>
		        	<?php 
    			        endforeach
			        ?>
        		</select>            
            </div>
        </div>        

        <div class="form-group">
            <label class="col-lg-3 control-label" for="pesoBruto">Peso Bruto:</label>
            <div class="col-lg-8">
                <input id="pesoBruto" type="number" step="0.0001" name="pesoBruto" class="form-control" value="<?=$romaneio->getPesoBruto()?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label" for="tara">Tara:</label>
            <div class="col-lg-8">
                <input id="tara" type="number" step="0.0001" name="tara" class="form-control" value="<?=$romaneio->getTara()?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label" for="pesoLiquido">Peso Liquido:</label>
            <div class="col-lg-8">
                <input id="pesoLiquido" type="number" step="0.0001" name="pesoLiquido" class="form-control" value="<?=$romaneio->getPesoLiquido()?>">
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


