<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;
use Contabiliza\Interfaces\ModelInterface;

class CentroCusto extends Model implements ModelInterface
{
    public function insert(Array $param)
    {
        $paremeters = array("1"=>$param['descricao'], "2"=>$param['cnpj'], "3"=>$param['ativo']);
        $this->query("INSERT INTO centro_custo (descricao, cnpj, ativo) VALUES (?, ?, ?)", $paremeters);
    }

    public function update(Array $param)
    {
        $paremeters = array("1"=>$param['descricao'], "2"=>$param['cnpj'], "3"=>$param['ativo'], "4"=>$param['id']);
        $this->query("UPDATE centro_custo SET descricao = ?, cnpj = ?, ativo = ? WHERE idcentro_custo = ? LIMIT 1", $paremeters);
    }

    public function getOne(Int $id)
    {
        $paremeter = array("1"=>$id);
        return $this->select("SELECT * FROM centro_custo WHERE idcentro_custo = ? LIMIT 1", $paremeter);
    }

    public function listActives()
    {
        return $this->query("SELECT * FROM centro_custo WHERE ativo = true ORDER BY descricao DESC");
    }

    public function listInactives()
    {
        return $this->query("SELECT * FROM centro_custo WHERE ativo = false ORDER BY descricao DESC");
    }

    public function delete(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("DELETE FROM centro_custo WHERE idcentro_custo = ? LIMIT 1", $parameter);
    }
 
    public function inactivate(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("UPDATE centro_custo SET ativo = 'Não' WHERE idcentro_custo = ?", $parameter);
    }
    
}