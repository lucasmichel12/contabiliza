<?php
require_once("config/MySqlPDO.php");
require_once("config/Mensagens.php");

class DespesaParada 
{
    private $id;
    private $idParada;
    private $idDespesa;
    private $quantidade;
    private $valor;
    private $comprovante;
    private $observacao;

    public function setId($id)
    {
        $this->id = $id;

    }

    public function setidParada($idParada)
    {
        $this->idParada = $idParada;

    }

    public function setidDespesa($idDespesa)
    {
        $this->idDespesa = $idDespesa;

    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

    }

    public function setValor($valor)
    {
        $this->valor = $valor;

    }

    public function setComprovante($comprovante)
    {
        $this->comprovante = $comprovante;

    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }

         //==============================================//

    public function getId()
    {
        return intval($this->id);
    }

    public function getidParada()
    {
        return intval($this->idParada);
    }

    public function getidDespesa()
    {
        return intval($this->idDespesa);
    }

    public function getQuantidade()
    {
        return intval($this->quantidade);
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getComprovante()
    {
        return $this->comprovante;
    }

    public function getObservacao()
    {
        return $this->observacao;
    }

    public function setData($dados)
    {
        $this->setId($dados->id);
        $this->setidParada(trim($dados->idParada));
        $this->setidDespesa(trim($dados->idDespesa));
        $this->setQuantidade(trim($dados->quantidade));
        $this->setValor(trim($dados->valor));
        $this->setComprovante($dados->comprovante);
        $this->setObservacao($dados->observacao);
    }

    public function selectOne($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM despesa_parada WHERE id = $id LIMIT 1");
        $this->setData($result);
        return $result;
    }

    public function selectAll()
    {
        $sql = new Sql();
        $result = $sql->query("SELECT * FROM despesa_parada ORDER BY id");
        
        while($lista = $result->fetch(PDO::FETCH_OBJ))
        {
           $return[] = $lista;
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
        $sql->query("CALL despesa_parada_insert (:id, :idDespesa, :idParada, :valor, :comprovante, :quantidade, :observacao)", array(
            ":id"=>$this->getId(),
            ":idDespesa"=>$this->getidDespesa(),
            ":idParada"=>$this->getidParada(),
            ":quantidade"=>$this->getQuantidade(),
            ":valor"=>$this->getValor(),
            ":comprovante"=>$this->getComprovante(),
            ":observacao"=>$this->getObservacao()
        ));

    }

    public function update()
    {
        $sql = new Sql();
        $sql->query("UPDATE despesa_parada SET idDespesa = :idDespesa, idParada = :idParada,  quantidade = :quantidade, valor = :valor, comprovante = :comprovante, observacao = :observacao WHERE id = :id LIMIT 1", array(
            ":id"=>$this->getId(),
            ":idDespesa"=>$this->getidDespesa(),
            ":idParada"=>$this->getidParada(),
            ":quantidade"=>$this->getQuantidade(),
            ":valor"=>$this->getValor(),
            ":comprovante"=>$this->getComprovante(),
            ":observacao"=>$this->getObservacao()
        ));
    }

    public function delete($id)
    {
        $sql = new Sql();
        $sql->query("DELETE FROM despesa_parada WHERE id = :id", array(":id"=>$id));
               
    }
}
?>