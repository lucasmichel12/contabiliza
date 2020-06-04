<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;

class CentroCusto extends Model
{
    public function insert(String $descricao, String $cnpj, String $ativo)
    {
        $paremeters = array("1"=>$descricao, "2"=>$cnpj, "3"=>$ativo);
        $this->query("INSERT INTO centro_custo (descricao, cnpj, ativo) VALUES (?, ?, ?)", $paremeters);
    }

    public function update(Int $id, String $descricao, String $cnpj, String $ativo)
    {
        $paremeters = array("1"=>$descricao, "2"=>$cnpj, "3"=>$ativo, "4"=>$id);
        $this->query("UPDATE centro_custo SET descricao = ?, cnpj = ?, ativo = ? WHERE idcentro_custo = ? LIMIT 1", $paremeters);
    }

    public function getOne(Int $id)
    {
        $paremeter = array("1"=>$id);
        return $this->select("SELECT * FROM centro_custo WHERE idcentro_custo = ? LIMIT 1", $paremeter);
    }

    public function listAll()
    {
        return $this->query("SELECT * FROM centro_custo WHERE ativo = 'Sim' ORDER BY descricao DESC");
    }


    public function listAllInativos()
    {
        return $this->query("SELECT * FROM centro_custo WHERE ativo = 'Não' ORDER BY descricao DESC");
    }

    public function delete(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("DELETE FROM centro_custo WHERE idcentro_custo = ? LIMIT 1", $parameter);
    }

    public function desabilita(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("UPDATE centro_custo SET ativo = 'Não' WHERE idcentro_custo = ?", $parameter);
    }
    
}