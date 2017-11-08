<?php


class Cliente{

	private $id;
	private $nome;
	private $dataNasc;
	private $telefone;
	private $email;
	private $rg;
	private $cpf;
	private $endereco;
	private $bairro;
	private $cidade;
	private $uf;

	public function __construct($id=0, $nome='', $dataNasc='', $telefone='', $email='', $rg='',$cpf='',$endereco='', $bairro='',$cidade='',$uf='' ){

		$this->id = $id;
		$this->nome = $nome;
		$this->dataNasc = $dataNasc;
		$this->telefone = $telefone;
		$this->email = $email;
		$this->rg = $rg;
		$this->cpf = $cpf;
		$this->endereco = $endereco;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->uf = $uf;
	}

	public function getID(){ return $this->id; }
	public function getNome(){ return $this->nome; }
	public function getDataNasc(){ return $this->dataNasc; }
	public function getTelefone(){ return $this->telefone; }
	public function getEmail(){ return $this->email; }
	public function getRG(){ return $this->rg; }
	public function getCPF(){ return $this->cpf; }
	public function getEndereco(){ return $this->endereco; }
	public function getBairro(){ return $this->bairro; }
	public function getCidade(){ return $this->cidade; }
	public function getUF(){ return $this->uf; }

	public function setID($id){ $this->id = $id; }
	public function setNome($nome){ $this->nome = $nome; }
	public function setDataNasc($dataNasc){ $this->dataNasc = $dataNasc; }
	public function setTelefone($telefone){ $this->telefone = $telefone; }
	public function setEmail($email){ $this->email = $email; }
	public function setRG($rg){ $this->rg = $rg; }
	public function setCPF($cpf){ $this->cpf = $cpf; }
	public function setEndereco($endereco){ $this->endereco = $endereco; }
	public function setBairro($bairro){ $this->bairro = $bairro; }
	public function setCidade($cidade){ $this->cidade = $cidade; }
	public function setUF($uf){ $this->uf = $uf; }





}