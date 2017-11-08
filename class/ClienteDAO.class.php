<?php
require_once 'cabecalho.php';

class ClienteDAO
{

    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function insereCliente($cliente)
    {
        $cliente->setNome(mysqli_real_escape_string($this->conexao, $cliente->getNome()));
        $cliente->setTelefone(mysqli_real_escape_string($this->conexao, $cliente->getTelefone()));
        $cliente->setEmail(mysqli_real_escape_string($this->conexao, $cliente->getEmail()));

        $query = "INSERT INTO clientes (nome, dataNasc, telefone, email)
					VALUES ('{$cliente->getNome()}',
							'{$cliente->getDataNasc()}',
							'{$cliente->getTelefone()}',
							'{$cliente->getEmail()}')";

        $resultadoInsercao = mysqli_query($this->conexao, $query);

        return $resultadoInsercao;
    }

    public function listarClientes()
    {
        $query = "SELECT * FROM clientes";
        $clientes = array();
        $resultadoListagem = mysqli_query($this->conexao, $query);

        while ($clientesArray = mysqli_fetch_assoc($resultadoListagem)) {
            $cliente = new Cliente();

            $cliente->setID($clientesArray['id']);
            $cliente->setNome($clientesArray['nome']);
            $cliente->setDataNasc($clientesArray['dataNasc']);
            $cliente->setTelefone($clientesArray['telefone']);
            $cliente->setEmail($clientesArray['email']);

            array_push($clientes, $cliente);
        }
        return $clientes;
    }

    public function buscaCliente($id)
    {
        $query = "SELECT * FROM clientes WHERE id = {$id}";

        $resultado = mysqli_query($this->conexao, $query);
        $clienteArray = mysqli_fetch_assoc($resultado);

        if ($clienteArray) {
            $cliente = new Cliente();

            $cliente->setID($clienteArray['id']);
            $cliente->setNome($clienteArray['nome']);
            $cliente->setDataNasc($clienteArray['dataNasc']);
            $cliente->setTelefone($clienteArray['telefone']);
            $cliente->setEmail($clienteArray['email']);

            return $cliente;
        }
        return null;
    }

	public function deletaCliente($id)
	{
		$query = "DELETE FROM clientes WHERE id = {$id}";

		return mysqli_query($this->conexao, $query);
	}

    public function alteraCliente($cliente)
    {
        $query = "UPDATE clientes SET
					nome = '{$cliente->getNome()}',
					dataNasc = '{$cliente->getDataNasc()}',
					telefone = '{$cliente->getTelefone()}',
					email = '{$cliente->getEmail()}' WHERE id = {$cliente->getID()}";
        return mysqli_query($this->conexao, $query);
    }
}
