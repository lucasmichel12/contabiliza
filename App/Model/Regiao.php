<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;


class Regiao extends Model
{
    //Inseri um novo registro no tabela "regiao"
    public function insert(String $descricao, Int $percentual, String $ativo)
    {
        $parameters = array("1"=>$descricao, "2"=>$percentual, "3"=>$ativo);
        $this->query("INSERT INTO regiao (descricao, percentual, ativo) VALUES (?, ?, ?)", $parameters);
    }
    
    //Lista todas os registros da tabela "regiao"
    public function listAll()
    {
        return $this->query("SELECT * FROM regiao WHERE ativo = 'Sim'ORDER BY percentual DESC");
    }

    //Lista todos os registros ativos
    public function listAllInativos()
    {
        return $this->query("SELECT * FROM regiao WHERE ativo = 'Não' ORDER BY percentual DESC");
    }

    /** Recebe uma @var Int e faz uma busca no banco de dados pelo registro correspondente */ 
    public function getOne(Int $id)
    {
        $parameter = array("1"=>$id);
        return $this->select("SELECT * FROM regiao WHERE id_regiao = ? LIMIT 1", $parameter);

    }

    /** Recebe 4 variaveis sendo uma delas o ID que tera os dados alterados na tabela regiao */
    public function update(Int $id, String $descricao, Int $percentual, String $ativo)
    {
        $parameters = array("1"=>$descricao, "2"=>$percentual, "3"=>$ativo, "4"=>$id);
        $this->query("UPDATE regiao SET descricao = ?, percentual = ?, ativo = ? WHERE id_regiao = ? LIMIT 1", $parameters);
    }

    /** Recebe uma @var Int e delete o registro correspondente na tabela regiao */
    public function delete(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("DELETE FROM regiao WHERE id_regiao = ? LIMIT 1", $parameter);
    }

    /** Desabilita um registro na tabela regiao atraves do @var Int que corresponde a um ID de algum registro dentro da tabela */
    public function desabilita(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("UPDATE regiao SET ativo = 'Não' WHERE id_regiao = ?", $parameter);
    }
}