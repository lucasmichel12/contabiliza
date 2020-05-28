<?php

require_once("config/MySqlPDO.php");


class Viagem
{
    private $id;
    private $localPartida;
    private $dataInicio;
    private $dataTermino;
    private $descricao;
    private $custoTotal;
    private $status;
    private $idColaborador;
    private $idFilial;

    


    public function setId($id)
    {
        $this->id = $id;

    }


    public function setLocalPartida($localPartida)
    {
        $this->localPartida = $localPartida;

    }


    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;

    }


    public function setDataTermino($dataTermino)
    {
        $this->dataTermino = $dataTermino;

    }


    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

    }


    public function setCustoTotal($custoTotal)
    {
        $this->custoTotal = $custoTotal;

    }


    public function setStatus($status)
    {
        $this->status = $status;

    }


    public function setIdColaborador($idColaborador)
    {
        $this->idColaborador = $idColaborador;

    }


    public function setIdFilial($idFilial)
    {
        $this->idFilial = $idFilial;

    }

    //================================================

    public function getId()
    {
        return intval($this->id);
    }

    public function getLocalPartida()
    {
        return $this->localPartida;
    }

    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    public function getDataTermino()
    {
        return $this->dataTermino;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getCustoTotal()
    {
        return $this->custoTotal;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getIdColaborador()
    {
        return intval($this->idColaborador);
    }

    public function getIdFilial()
    {
        return intval($this->idFilial);
    }

    public function setData($dados)
    {
        $this->setId($dados->id);
        $this->setLocalPartida(trim($dados->localPartida));
        $this->setDataInicio(trim($dados->dataInicio));
        $this->setDataTermino(trim($dados->dataTermino));
        $this->setDescricao(trim($dados->descricao));
        $this->setCustoTotal(($dados->custoTotal));
        $this->setStatus(($dados->status));
        $this->setIdColaborador(trim($dados->idColaborador));
        $this->setIdFilial(trim($dados->idFilial));
    }

    public function selectOne($campo, $value)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM viagem WHERE $campo LIKE $value LIMIT 1");
        $this->setData($result);
        return $result;
    }

    public function selectAll()
    {
        $sql = new Sql();
        $result = $sql->query("SELECT * FROM viagem ORDER BY 'Aberto'");
        
        while($lista = $result->fetch(PDO::FETCH_OBJ))
        {
           $return[] = $lista;
        }
        
        if(!isset($return))
        {
            $return = "Nenhuma viagem registrada";
        }

        return json_encode($return);
    }

    public function insert()
    {
        $sql = new Sql();
        $sql->query("CALL viagem_insert (:id, :localPartida, :dataInicio, :dataTermino, :descricao, :custoTotal, :status, :idFilial, :idColaborador)", array(
            ":id"=>$this->getId(),
            ":localPartida"=>$this->getLocalPartida(),
            ":dataInicio"=>$this->getDataInicio(),
            ":dataTermino"=>$this->getDataTermino(),
            ":descricao"=>$this->getDescricao(),
            ":custoTotal"=>$this->getCustoTotal(),
            ":status"=>$this->getStatus(),
            ":idFilial"=>$this->getIdFilial(),
            ":idColaborador"=>$this->getIdColaborador()
        ));
    }

    public function update()
    {
        $sql = new Sql();
        $sql->query("UPDATE viagem SET localPartida = :localPartida, dataInicio = :dataInicio, dataTermino = :dataTermino, descricao = :descricao, custoTotal = :custoTotal, status = :status, idFilial = :idFilial, idColaborador = :idColaborador WHERE id = :id LIMIT 1", array(
            ":id"=>$this->getId(),
            ":localPartida"=>$this->getLocalPartida(),
            ":dataInicio"=>$this->getDataInicio(),
            ":dataTermino"=>$this->getDataTermino(),
            ":descricao"=>$this->getDescricao(),
            ":custoTotal"=>$this->getCustoTotal(),
            ":status"=>$this->getStatus(),
            ":idFilial"=>$this->getIdFilial(),
            ":idColaborador"=>$this->getIdColaborador()
        ));

    }
    public function delete($id)
    {
        $sql = new Sql();
        $sql->query("DELETE FROM viagem WHERE id = :id", array(":id"=>$id));
               
    }

}

?>