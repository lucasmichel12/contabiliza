<?php
require_once("config/MySqlPDO.php");
require_once("config/Mensagens.php");

class Parada 
{
    private $id;
    private $destino;
    private $motivo;
    private $dataInicio;
    private $dataTermino;
    private $idViagem;

    public function setId($id)
    {
        $this->id = $id;

    }

    public function setDestino($destino)
    {
        $this->destino = $destino;

    }

    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

    }

    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;

    }

    public function setDataTermino($dataTermino)
    {
        $this->dataTermino = $dataTermino;

    }

    public function setIdViagem($idViagem)
    {
        $this->idViagem = $idViagem;

    }

         //==============================================//

    public function getId()
    {
        return intval($this->id);
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function getMotivo()
    {
        return $this->motivo;
    }

    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    public function getDataTermino()
    {
        return $this->dataTermino;
    }

    public function getIdViagem()
    {
        return intval($this->idViagem);
    }

    public function setData($dados)
    {
        $this->setId($dados->id);
        $this->setDestino(trim($dados->destino));
        $this->setMotivo(trim($dados->motivo));
        $this->setDataInicio(trim($dados->dataInicio));
        $this->setDataTermino(trim($dados->dataTermino));
        $this->setIdViagem($dados->idViagem);
    }

    public function selectOne($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM parada WHERE id = $id LIMIT 1");
        $this->setData($result);
        return $result;
    }

    public function selectAll()
    {
        $sql = new Sql();
        $viagem = $sql->select("SELECT * FROM viagem WHERE status = 'Aberto' LIMIT 1");
        if(isset($viagem->id)){
            $result = $sql->query("SELECT * FROM parada WHERE idViagem = :idViagem ORDER BY destino", array(":idViagem"=>$viagem->id));
        
            while($lista = $result->fetch(PDO::FETCH_OBJ))
            {
            $return[] = $lista;
            }
        }
        
        if(!isset($return))
        {
            $return = "Nenhuma parada registrada";
        }

        return json_encode($return);
    }

    public function insert()
    {
        $sql = new Sql();
        $sql->query("CALL parada_insert (:id, :destino, :motivo, :dataInicio, :dataTermino, :idViagem)", array(
            ":id"=>$this->getId(),
            ":destino"=>$this->getDestino(),
            ":motivo"=>$this->getMotivo(),
            ":dataInicio"=>$this->getDataInicio(),
            ":dataTermino"=>$this->getDataTermino(),
            ":idViagem"=>$this->getIdViagem()
        ));

    }

    public function update()
    {
        $sql = new Sql();
        $sql->query("UPDATE parada SET destino = :destino, motivo = :motivo, dataInicio = :dataInicio, dataTermino = :dataTermino, idViagem = :idViagem WHERE id = :id LIMIT 1", array(
            ":id"=>$this->getId(),
            ":destino"=>$this->getDestino(),
            ":motivo"=>$this->getMotivo(),
            ":dataInicio"=>$this->getDataInicio(),
            ":dataTermino"=>$this->getDataTermino(),
            ":idViagem"=>$this->getIdViagem()
        ));
    }

    public function delete($id)
    {
        $sql = new Sql();
        $sql->query("DELETE FROM viagem WHERE id = :id", array(":id"=>$id));
               
    }
}
?>