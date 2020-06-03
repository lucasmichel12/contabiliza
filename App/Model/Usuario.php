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
}