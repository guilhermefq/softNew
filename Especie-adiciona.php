<?php
require_once 'cabecalho.php';

$especie = EspecieFactory::create($_POST);

$especie->setDescricao($_POST['descricao']);
$especie->setPreco($_POST['preco']);
$especie->setNCM($_POST['ncm']);
$especie->getUnidade()->setID($_POST['unidade_id']);

$especieDAO = new EspecieDAO($conexao);

if ($especieDAO->insereEspecie($especie)){
    $_SESSION["success"] = "Espécie {$especie->getDescricao()} adicionado com sucesso!";
	header("Location: Especie-lista.php");
	die();
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Erro ao adicionar a Espécie! Erro: {$msg}";
	header("Location: Especie-lista.php");
	die();
}