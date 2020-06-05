<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;

class Usuario extends Model
{
    public function insert(String $nome, String $cpf, String $login, String $senha, String $admin, String $ativo)
    {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $parameters = array("1"=>$nome, "2"=>$cpf, "3"=>$login, "4"=>$senha, "5"=>$admin, "6"=>$ativo);
        $this->query("INSERT INTO usuario (nome, cpf, login, senha, admin, ativo) VALUES (?,?,?,?,?,?)", $parameters);
    }

    public function listAll()
    {
       return $this->query("SELECT * FROM usuario WHERE ativo = true ORDER BY nome");
    }

    public function listarInativos()
    {
       return $this->query("SELECT * FROM usuario WHERE ativo = false ORDER BY nome");
    }

    public function getOne(Int $id)
    {
        $parameter = array("1"=>$id);
         return $this->select("SELECT id_usuario, nome, cpf, login, admin, ativo FROM usuario WHERE id_usuario = ? LIMIT 1", $parameter);
    }
    
    public function update(Int $id, String $nome, String $cpf, String $login, String $admin, String $ativo)
    {
        $parameters = array("1"=>$nome, "2"=>$cpf, "3"=>$login, "4"=>$admin, "5"=>$ativo, "6"=>$id);
        $this->query("UPDATE usuario SET nome = ?, cpf = ?, login = ?, admin = ?, ativo = ? WHERE id_usuario = ? LIMIT 1", $parameters);
    }

    public function delete(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("DELETE FROM usuario WHERE id_usuario = ?", $parameter);
    }

    public function alteraSenha(String $senha, Int $id)
    {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $parameter = array("1"=>$senha, "2"=>$id);
        $this->query("UPDATE usuario SET senha = ? WHERE id_usuario = ? LIMIT 1", $parameter);
    }

    public function desabilita(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("UPDATE usuario SET ativo = 'Não' WHERE id_usuario = ? LIMIT 1", $parameter);
    }
}