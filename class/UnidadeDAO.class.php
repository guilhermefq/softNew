<?php require_once 'cabecalho.php';

class UnidadeDAO {
    
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function insereUnidade($unidade)
    {
        $query = "INSERT INTO unidades (descricao, sigla)
                    VALUES (
                        '{$unidade->getDescricao()}',
                        '{$unidade->getSigla()}'
                    )";

        return mysqli_query($this->conexao, $query);
    }

    public function listaUnidades()
    {
        $query = "SELECT * FROM unidades";

        $unidades = array();
        $resultado = mysqli_query($this->conexao, $query);

        while($unidadesArray = mysqli_fetch_assoc($resultado)){
            $unidade = new Unidade(
                $unidadesArray['descricao'],
                $unidadesArray['sigla']
            );
            $unidade->setID($unidadesArray['id']);

            array_push($unidades, $unidade);
        }
        return $unidades;
    }

    public function deletaUnidade($id)
    {
        $query = "DELETE FROM unidades WHERE id = {$id}";

        return mysqli_query($this->conexao, $query);
    }

}