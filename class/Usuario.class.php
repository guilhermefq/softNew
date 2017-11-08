<?php

class Usuario {

	private $id;
	private $nome;
	private $login;
	private $senha;

	public function __construct($nome = '', $login = '', $senha = '') {
		$this->nome  = $nome;
		$this->login = $login;
		$this->senha = $senha;
		session_start();
	}
	public function getID() {return $this->id;}

	public function getLogin() {return $this->login;}

	public function getSenha() {return $this->senha;}

	public function getNome() {return $this->nome;}

	public function setID($id) {$this->id = $id;}

	public function setLogin($login) {$this->login = $login;}

	public function setSenha($senha) {$this->senha = $senha;}

	public function setNome($nome) {$this->nome = $nome;}

	public function verificaUsuario() {
		if (!$this->isLogado()) {
			$_SESSION["danger"] = "Você não tem acesso a esta funcionalidade!";
			header("Location: index.php");
			die();
		}
	}

	public function isLogado() {
		return isset($_SESSION['user_logado']);
	}

	public function usuarioLogado() {
		return $_SESSION['user_logado'];
	}

	public function logaUsuario($usuario) {
		$_SESSION['user_logado'] = $usuario->getLogin();
	}

	public function logout() {
		session_start();
		session_destroy();
		session_start();
	}

}