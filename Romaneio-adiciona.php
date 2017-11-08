<?php
require_once 'cabecalho.php';

$romaneio = RomaneioFactory::create($_POST);//Chamada de função estática

$romaneio->setTipo($_POST['tipo']);
$romaneio->getCliente()->setID($_POST['cliente_id']);
$romaneio->getEspecie()->setID($_POST['especie']);
$romaneio->setPesoBruto($_POST['pesoBruto']);
$romaneio->setTara($_POST['tara']);
$romaneio->setPesoLiquido($_POST['pesoLiquido']);

$romaneioDAO = new RomaneioDAO($conexao);

if ($romaneioDAO->insereRomaneio($romaneio)){
	$_SESSION["success"] = "Romaneio {$romaneio->getID()} adicionado com sucesso!";
	header("Location: Romaneio-lista.php");
	die();
} else {
	$_SESSION["danger"] = "Erro ao inserir o Romaneio!";
	header("Location: Romaneio-lista.php");
	die();
}