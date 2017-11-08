<?php

$funcionario = array(
    'matricula' => 1,
    'salario' => 1000.00,
    'nome' => 'João da Silva',
    'ativo' => true);

//echo $funcionario['salario'];


$funcionarios = array(
    array(1, 1250.50, 'Pedro Alvares', true),
    array(2, 2540.90, 'Fernanda Alves',false)
);

foreach($funcionarios as $chave => $valor){
    echo "Funcionario {$chave} - {$valor[0]} : {$valor[2]}";
    echo "</br>";
}