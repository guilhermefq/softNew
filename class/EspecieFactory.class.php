<?php

class EspecieFactory {
    public static function create($params)
    {
        $descricao = $params['descricao'];
        $preco = $params['preco'];
        $ncm = $params['ncm'];
        $unidade = new Unidade();

        return new Especie($descricao,$preco,$ncm,$unidade);
    }
}