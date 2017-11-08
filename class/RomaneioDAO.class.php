<?php require_once 'cabecalho.php';

class RomaneioDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function insereRomaneio($romaneio)
    {
        $query = "INSERT INTO romaneios(tipo, cliente_id, especie, pesoBruto, pesoLiquido, tara)
                    VALUES (
                        '{$romaneio->getTipo()}',
                        {$romaneio->getCliente()->getID()},
                        {$romaneio->getEspecie()->getID()},
                        {$romaneio->getPesoBruto()},
                        {$romaneio->getPesoLiquido()},
                        {$romaneio->getTara()}
                    )";
        return mysqli_query($this->conexao, $query);
    }

    public function listaRomaneios()
    {
        $query = "SELECT r.*, c.nome as cliente_nome,
                        e.descricao as especie_descricao 
                    FROM romaneios as r 
                    JOIN clientes as c on (c.id = r.cliente_id)
                    JOIN especies as e on (e.id = r.especie) ";
        $romaneios = array();
        $resultado = mysqli_query($this->conexao, $query);

        while ($romaneioArray = mysqli_fetch_assoc($resultado)) {
            //$factory = new RomaneioFactory();
            $romaneio = RomaneioFactory::create($romaneioArray);

            $romaneio->setID($romaneioArray['id']);
            $romaneio->getCliente()->setNome($romaneioArray['cliente_nome']);
            $romaneio->getEspecie()->setDescricao($romaneioArray['especie_descricao']);

            array_push($romaneios, $romaneio);
        }
        return $romaneios;
    }

    public function deletaRomaneio($id)
    {
        $query = "DELETE FROM romaneios where id = {$id}";

        return mysqli_query($this->conexao, $query);
    }

    public function buscaRomaneio($id)
    {
        $query = "SELECT * FROM romaneios WHERE id = {$id}";

        $resultado = mysqli_query($this->conexao, $query);
        $romaneioArray = mysqli_fetch_assoc($resultado);
        
        if($romaneioArray){
            $romaneio = RomaneioFactory::create($romaneioArray);
            $romaneio->setID($romaneioArray['id']);
            $romaneio->getCliente()->setID($romaneioArray['cliente_id']);
            $romaneio->getEspecie()->setID($romaneioArray['especie']);
        }
        return $romaneio;
    }
}
