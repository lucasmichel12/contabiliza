<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;
use Contabiliza\Helpers\Validacao;
use Contabiliza\Interfaces\ModelInterface;

class Usuario extends Model implements ModelInterface
{
    protected $Validacao;
    public function __construct()
    {
        $this->Validacao = new Validacao();
        parent::__construct();
    }

    public function insert(Array $param)
    {
        
        $this->Validacao->cpf($param['cpf']);
        $this->Validacao->user($param['login']);
        $senha = password_hash($param['senha'], PASSWORD_DEFAULT);
        $parameters = array("1"=>$param['nome'], "2"=>preg_replace('/[^0-9]/is', '', $param['cpf']), "3"=>$param['login'], "4"=>$senha, "5"=>$param['admin'], "6"=>$param['ativo']);
        $this->query("INSERT INTO usuario (nome, cpf, login, senha, admin, ativo) VALUES (?,?,?,?,?,?)", $parameters);
    }

    public function update(Array $param)
    {
        $this->Validacao->cpf($param['cpf'], $param['id_usuario']);
        $this->Validacao->user($param['login'], $param['id_usuario']);
        $parameters = array("1"=>$param['nome'], "2"=>preg_replace('/[^0-9]/is', '', $param['cpf']), "3"=>$param['login'], "4"=>$param['admin'], "5"=>$param['ativo'], "6"=>$param['id_usuario']);
        $this->query("UPDATE usuario SET nome = ?, cpf = ?, login = ?, admin = ?, ativo = ? WHERE id_usuario = ? LIMIT 1", $parameters);
    }

    public function getOne(Int $id)
    {
        $parameter = array("1"=>$id);
        return $this->select("SELECT id_usuario, nome, cpf, login, admin, ativo FROM usuario WHERE id_usuario = ? LIMIT 1", $parameter);
    }

    public function listActives()
    {
       return $this->select("SELECT * FROM usuario WHERE ativo = true ORDER BY nome");
    }

    public function listInactives()
    {
       return $this->select("SELECT * FROM usuario WHERE ativo = false ORDER BY nome");
    }

    public function delete(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("DELETE FROM usuario WHERE id_usuario = ?", $parameter);
    }

    public function inactivate(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("UPDATE usuario SET ativo = 0 WHERE id_usuario = ? LIMIT 1", $parameter);
    }

    //! Funções Especificas desta classe 

    //* Função que altera apenas a senha(criptografada) do usuário
    public function changePassword(String $senha, Int $id)
    {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $parameter = array("1"=>$senha, "2"=>$id);
        $this->query("UPDATE usuario SET senha = ? WHERE id_usuario = ? LIMIT 1", $parameter);
    }

    public function getByLogin(String $login)
    {
        $parameter = array("1"=>$login);
        return $this->select("SELECT * FROM usuario WHERE login = ? LIMIT 1", $parameter);
        
    }


}