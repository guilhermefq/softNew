<?php require_once 'cabecalho.php';

class EspecieDAO {
    
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function insereEspecie($especie)
    {
        $query = "INSERT INTO especies(descricao, preco, ncm, unidade_id)
                    VALUES (
                        '{$especie->getDescricao()}',
                         {$especie->getPreco()},
                        '{$especie->getNCM()}',
                         {$especie->getUnidade()->getID()}
                        )";        
        return mysqli_query($this->conexao, $query);
    }

    public function listaEspecies()
    {
        $query = "SELECT e.*, u.descricao as unidade_descricao 
                  FROM especies as e 
                  JOIN unidades as u 
                    ON (e.unidade_id = u.id)";

        $especies = array();
        $resultado = mysqli_query($this->conexao, $query);

        while($especieArray = mysqli_fetch_assoc($resultado)){
            $unidadeDescricao = $especieArray['unidade_descricao'];

            $especie = EspecieFactory::create($especieArray);

            /*
            $especie = new Especie(
                    $especieArray['descricao'],
                    $especieArray['preco'],
                    $especieArray['NCM'],
                    new Unidade
            );*/

            $especie->setID($especieArray['id']);
            $especie->getUnidade()->setDescricao($unidadeDescricao);

            array_push($especies,$especie);
        }
        return $especies;
    }

    public function deletaEspecie($id)
    {
        $query = "DELETE FROM especies WHERE id = {$id}";

        return mysqli_query($this->conexao, $query);
    }

    public function buscaEspecie($d)
    {
        $query = "SELECT * FROM especie WHERE id = {$id}";

        $resultado = mysqli_query($this->conexao, $query);
        $especieArray = mysqli_fetch_assoc($resultado);

        if($especieArray) {
            $especie = EspecieFactory::create($especieArray);

            $especie->setID($especieArray['id']);
            $especie->getUnidade()->setID($especieArray['unidade_id']);
        }
        return $especie;
    }
}