<?php
require_once 'cabecalho.php';
$usuario = new Usuario();

$usuario->logout();
$_SESSION["success"] = "Logout efetuado com sucesso!";
header("Location: index.php");
die();
