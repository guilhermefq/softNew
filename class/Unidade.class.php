<?php

class Unidade {

    private $id;
    private $descricao;
    private $sigla;

    function __construct(
        $descricao = '',
        $sigla = ''
    ){
        $this->descricao = $descricao;
        $this->sigla = $sigla;
    }

    public function getID(){ return $this->id; }
    public function getDescricao(){ return $this->descricao; }
    public function getSigla(){ return $this->sigla; }

    public function setID($id){ $this->id = $id; }
    public function setDescricao($descricao){ $this->descricao = $descricao; }
    public function setSigla($sigla){ $this->sigla = $sigla; }
    
}