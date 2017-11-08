<?php
require_once 'cabecalho.php';

class UsuarioDAO
{

    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listaUsuarios()
    {
        $query     = "select * from users";
        $usuarios  = array();
        $resultado = mysqli_query($this->conexao, $query);

        while ($usuariosArray = mysqli_fetch_assoc($resultado)) {
            $usuario = new Usuario();

            $usuario->setId($usuariosArray['id']);
            $usuario->setLogin($usuariosArray['login']);
            $usuario->setSenha($usuariosArray['pass']);
            $usuario->setNome($usuariosArray['nome']);

            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }

    public function insereUsuarios($usuario)
    {
        $usuario->setNome(mysqli_real_escape_string($this->conexao, $usuario->getNome()));
        $usuario->setLogin(mysqli_real_escape_string($this->conexao, $usuario->getLogin()));
        $usuario->setSenha(mysqli_real_escape_string($this->conexao, $usuario->getSenha()));

        $query = "INSERT INTO users (login, pass, nome)
				  VALUES ('{$usuario->getLogin()}',
				  	 sha2('{$usuario->getSenha()}',256),
				  	      '{$usuario->getNome()}')";
        #"insert into users (login, pass, nome) value ('admin2', sha2('1937555',256),'Gustavo')";

        $resultadoDaInsercao = mysqli_query($this->conexao, $query);

        return $resultadoDaInsercao;
    }

    public function removeUsuario($id)
    {
        $query = "delete from users where id = {$id}";

        return mysqli_query($this->conexao, $query);
    }

    public function validaUsuario($login, $pass)
    {
        $passSHA256 = hash('sha256', $pass);
        $login      = mysqli_real_escape_string($this->conexao, $login);

        $query = "select * from users where login = '{$login}' and pass = '{$passSHA256}'";

        $resultado = mysqli_query($this->conexao, $query);
        $userArray = mysqli_fetch_assoc($resultado);

        if ($userArray) {
            $user = new Usuario($userArray['id'], $userArray['nome'], $userArray['login'], $userArray['pass']);
            return $user;
        }
        return null;
    }

    public function buscaUsuario($id)
    {
        
        $query = "select * from users where id = '{$id}'";

        $resultado = mysqli_query($this->conexao, $query);
        $userArray = mysqli_fetch_assoc($resultado);

        if ($userArray) {
            $user = new Usuario();
            $user->setID($userArray['id']);
            $user->setLogin($userArray['login']);
            $user->setSenha($userArray['pass']);
            $user->setNome($userArray['nome']);
            return $user;
        }
        return null;
    }

    public function alteraUsuario($usuario)
    {
        $id = $usuario->getID();
        $query = "update users set
		          login = '{$usuario->getLogin()}',
				  nome  = '{$usuario->getNome()}' where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }
}
