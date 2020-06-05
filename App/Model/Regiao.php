<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;
use Contabiliza\Interfaces\ModelInterface;

class Regiao extends Model implements ModelInterface
{
   
    public function insert(Array $param)
    {
        $parameters = array("1"=>$param['descricao'], "2"=>$param['percentual'], "3"=>$param['ativo']);
        $this->query("INSERT INTO regiao (descricao, percentual, ativo) VALUES (?, ?, ?)", $parameters);
    }
    
    public function update(Array $param)
    {
        $parameters = array("1"=>$param['descricao'], "2"=>$param['percentual'], "3"=>$param['ativo'], "4"=>$param);
        $this->query("UPDATE regiao SET descricao = ?, percentual = ?, ativo = ? WHERE id_regiao = ? LIMIT 1", $parameters);
    }

    public function getOne(Int $id)
    {
        $parameter = array("1"=>$id);
        return $this->select("SELECT * FROM regiao WHERE id_regiao = ? LIMIT 1", $parameter);

    }

    public function listActives()
    {
        return $this->query("SELECT * FROM regiao WHERE ativo = true ORDER BY percentual DESC");
    }

    public function listInactives()
    {
        return $this->query("SELECT * FROM regiao WHERE ativo = false ORDER BY percentual DESC");
    }
 
    public function delete(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("DELETE FROM regiao WHERE id_regiao = ? LIMIT 1", $parameter);
    }

    public function inactivate(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("UPDATE regiao SET ativo = 'Não' WHERE id_regiao = ?", $parameter);
    }
}