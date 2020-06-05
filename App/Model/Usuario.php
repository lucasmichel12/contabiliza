<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;
use Contabiliza\Interfaces\ModelInterface;

class Usuario extends Model implements ModelInterface
{
    public function insert(Array $param)
    {
        $senha = password_hash($param['senha'], PASSWORD_DEFAULT);
        $parameters = array("1"=>$param['nome'], "2"=>$param['cpf'], "3"=>$param['login'], "4"=>$senha, "5"=>$param['admin'], "6"=>$param['ativo']);
        $this->query("INSERT INTO usuario (nome, cpf, login, senha, admin, ativo) VALUES (?,?,?,?,?,?)", $parameters);
    }

    public function update(Array $param)
    {
        $parameters = array("1"=>$param['nome'], "2"=>$param['cpf'], "3"=>$param['login'], "4"=>$param['admin'], "5"=>$param['ativo'], "6"=>$param['id']);
        $this->query("UPDATE usuario SET nome = ?, cpf = ?, login = ?, admin = ?, ativo = ? WHERE id_usuario = ? LIMIT 1", $parameters);
    }

    public function getOne(Int $id)
    {
        $parameter = array("1"=>$id);
         return $this->select("SELECT id_usuario, nome, cpf, login, admin, ativo FROM usuario WHERE id_usuario = ? LIMIT 1", $parameter);
    }

    public function listActives()
    {
       return $this->query("SELECT * FROM usuario WHERE ativo = true ORDER BY nome");
    }

    public function listInactives()
    {
       return $this->query("SELECT * FROM usuario WHERE ativo = false ORDER BY nome");
    }

    public function delete(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("DELETE FROM usuario WHERE id_usuario = ?", $parameter);
    }

    public function inactivate(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("UPDATE usuario SET ativo = 'Não' WHERE id_usuario = ? LIMIT 1", $parameter);
    }

    //! Funções Especificas desta classe 

    //* Função que altera apenas a senha(criptografada) do usuário
    public function changePassword(String $senha, Int $id)
    {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $parameter = array("1"=>$senha, "2"=>$id);
        $this->query("UPDATE usuario SET senha = ? WHERE id_usuario = ? LIMIT 1", $parameter);
    }


}