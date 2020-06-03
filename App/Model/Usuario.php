<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;

class Usuario extends Model
{
    public function insert(String $nome, String $login, String $senha, String $admin, String $ativo)
    {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $parameters = array("1"=>$nome, "2"=>$login, "3"=>$senha, "4"=>$admin, "5"=>$ativo);
        $this->query("INSERT INTO usuario (nome, login, senha, admin, ativo) VALUES (?,?,?,?,?)", $parameters);
    }

    public function listAll()
    {
       return $this->query("SELECT * FROM usuario WHERE ativo = 'Sim' ORDER BY nome");
    }

    public function update(Int $id, String $nome, String $login, String $senha, String $admin, String $ativo)
    {
        $parameters = array("1"=>$nome, "2"=>$login, "3"=>$admin, "4"=>$ativo, "5"=>$id);
        $this->query("UPDATE regiao SET nome = ?, login = ?, admin = ?, ativo = ? WHERE id = ? LIMIT 1");
    }
}