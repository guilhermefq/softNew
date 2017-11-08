<?php

class RomaneioFactory {
    public static function create($params)
    {

        $tipo = $params['tipo'];
        $cliente = new Cliente();
        $especie = EspecieFactory::create();
        $pesoBruto = $params['pesoBruto'];
        $pesoLiquido = $params['pesoLiquido'];
        $tara = $params['tara'];

        return new Romaneio($tipo,$cliente,$especie,$pesoBruto,$pesoLiquido,$tara);
    }
}