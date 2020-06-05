<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;
use Contabiliza\Interfaces\ModelInterface;

class Despesa extends Model implements ModelInterface
{
    public function insert(String $descricao, String $valor_definido, String $ativo, Float $valor)
    {
        $parameters = array("1"=>$descricao, "2"=>$valor_definido, "3"=>$valor, "4"=>$ativo);
        $this->query("INSERT INTO despesa (descricao, valor_definido, valor, ativo) VALUES (?, ?, ?, ?)", $parameters);
    }
    public function update(Int $id, String $descricao, String $valor_definido, String $ativo, Float $valor)
    {
        $parameters = array("1"=>$descricao, "2"=>$valor_definido, "3"=>$valor, "4"=>$ativo, "5"=>$id);
        $this->query("UPDATE despesa SET descricao = ?, valor_definido = ?, valor = ?, ativo = ? WHERE id_despesa = ? LIMIT 1", $parameters);
    }

    public function getOne(Int $id)
    {
        $paremeter = array("1"=>$id);
        return $this->select("SELECT * FROM despesa WHERE id_despesa = ? LIMIT 1", $paremeter);
    }

    public function listActives()
    {
        return $this->query("SELECT * FROM despesa WHERE ativo = true ORDER BY descricao");
    }

    public function listInactives()
    {
        return $this->query("SELECT * FROM despesa WHERE ativo = false ORDER BY descricao");
    }

    public function delete(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("DELETE FROM despesa WHERE id_despesa = ? LIMIT 1", $parameter);
    }

    public function inactivate(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("UPDATE despesa SET ativo = 'Não' WHERE id_despesa = ?", $parameter);
    }
}