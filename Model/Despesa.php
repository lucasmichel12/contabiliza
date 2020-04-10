<?php

require_once("config/MySqlPDO.php");
require_once("config/Mensagens.php");

Class Despesa 
{
    private $id;
    private $descricao;
    private $valor;
    private $ativo;

    public function setId($id)
    {
        $this->id = $id;

    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

    }

    public function setValor($valor)
    {
        $msg = new Mensagens();
        if($valor < 0 )
        {
            $msg::erro("Valor não pode ser negativo!");
        }
        $this->valor = $valor;

    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

    }

    
    public function getId()
    {
        return intval($this->id);
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setData($dados)
    {
        $this->setId($dados->id);
        $this->setDescricao($dados->descricao);
        $this->setValor($dados->valor);
        $this->setAtivo($dados->ativo);

    }

    public function selectOne($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM despesa WHERE id = $id LIMIT 1");
        $this->setData($result);
        return $result;
    }

    public function selectAll()
    {
        $msg = new Mensagens();
        $sql = new Sql();
        $result = $sql->query("SELECT * FROM despesa ORDER BY descricao");
        
        while($lista = $result->fetch(PDO::FETCH_OBJ))
        {
           $return[] = $lista;
        }
        
        if(!isset($return))
        {
            $msg::erro("Não há registros a serem listados!");
        }

        return json_encode($return);
    }

    public function insert()
    {
        $sql = new Sql();
        $sql->query("CALL despesa_insert(:id, :descricao, :valor, :ativo)",
        array(":id"=>$this->getId(),
              ":descricao"=>$this->getDescricao(),
              ":valor"=>$this->getValor(),
              ":ativo"=>$this->getAtivo()
            ));

    }

    public function update()
    {

        $sql = new Sql();
        $sql->query("UPDATE despesa SET descricao = ?, valor = ?, ativo = ? WHERE id = ? LIMIT 1",
        array("1"=>$this->getDescricao(),
              "2"=>$this->getValor(),
              "3"=>$this->getAtivo(),
              "4"=>$this->getId()));
        
    }

    public function delete($id)
    {
        $sql = new Sql();
        $sql->query("DELETE FROM despesa WHERE id = :id", array(":id"=>$id));
               
    }
}
?>