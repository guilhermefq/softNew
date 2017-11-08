<?php

class Romaneio
{

    private $id;
    private $tipo;
    private $cliente;
    private $especie;
    private $pesoBruto;
    private $tara;
    private $pesoLiquido;

    function __construct(
        $tipo,
        Cliente $cliente,
        Especie $especie,
        $pesoBruto,
        $pesoLiquido,
        $tara
    ){
        $this->tipo = $tipo;
        $this->cliente = $cliente;
        $this->especie = $especie;
        $this->pesoBruto = $pesoBruto;
        $this->pesoLiquido = $pesoLiquido;
        $this->tara = $tara;
    }

    public function getID(){ return $this->id; }
    public function setID($id){ $this->id = $id; }
    public function getTipo(){ return $this->tipo; }
    public function setTipo($tipo){ $this->tipo = $tipo; }
    public function getCliente(){ return $this->cliente; }
    public function setCliente($cliente){ $this->cliente = $cliente; }
    public function getEspecie(){ return $this->especie; }
    public function setEspecie($especie){ $this->especie = $especie; }
    public function getPesoBruto(){ return $this->pesoBruto; }
    public function setPesoBruto($pesoBruto){ $this->pesoBruto; }
    public function getTara(){ return $this->tara; }
    public function setTara($tara){ $this->tara = $tara; }
    public function getPesoLiquido(){ return $this->pesoLiquido; }
    public function setPesoLiquido($pesoLiquido){ $this->pesoLiquido = $pesoLiquido; }        

}
