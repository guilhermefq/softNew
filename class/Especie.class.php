<?php

class Especie {

    private $id;
    private $descricao;
    private $preco;
    private $NCM;
    private $unidade;

    function  __construct(
        $descricao,
        $preco,
        $NCM,
        Unidade $unidade
    ) {
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->NCM = $NCM;
        $this->unidade = $unidade;
    }

    public function getID(){ return $this->id; }
    public function getDescricao(){ return $this->descricao; }
    public function getPreco(){ return $this->preco; }
    public function getNCM(){ return $this->NCM; }
    public function getUnidade(){ return $this->unidade; }

    public function setID($id){ $this->id = $id; }
    public function setDescricao($descricao){ $this->descricao = $descricao; }
    public function setPreco($preco){ $this->preco = $preco; }
    public function setNCM($NCM){ $this->ncm = $NCM; }
    public function setUnidade($unidade){ $this->unidade = $unidade; }

}