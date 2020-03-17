<?php

declare(strict_types=1);

require_once("../config/MySqlPDO.php");


class Colaborador {


    private $id;
    private $nome;
    private $cpf;
    private $celular;
    private $email;
    private $senha;
    private $login;
    private $admin;
    private $ativo;


    public function __construct()
    {
        
    }

    

    public function setId($id)
    {
        $this->id = $id;

    }

    public function setNome($nome)
    {
        $this->nome = $nome;

    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

    }

    public function setCelular($celular)
    {
        $this->celular = $celular;

    }

    public function setEmail($email)
    {
        $this->email = $email;

    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

    }

    public function setLogin($login)
    {
        $this->login = $login;

    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;

    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

    }

    //Getters

    
 
    public function getId()
    {
        return $this->id;
    }
 
    public function getNome()
    {
        return $this->nome;
    }
 
    public function getCpf()
    {
        return $this->cpf;
    }
 
    public function getCelular()
    {
        return $this->celular;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function getSenha()
    {
        return $this->senha;
    }
 
    public function getLogin()
    {
        return $this->login;
    }
 
    public function getAdmin()
    {
        return $this->admin;
    }
 
    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setData($dados)
    {
        $this->setId(trim($dados->id));
        $this->setNome(trim($dados->nome));
        $this->setCpf($dados->cpf);
        $this->setCelular($dados->celular);
        $this->setEmail($dados->email);
        $this->setSenha($dados->senha);
        $this->setLogin($dados->login);
        $this->setAdmin($dados->admin);
        $this->setAtivo($dados->ativo);

    }

    public function insert()
    {
        $sql = new Sql();
        $stmt = $sql->select("CALL colaborador_insert(:id, :nome, :cpf, :celular, :email, :login, :senha, :admin, :ativo)",
        array(":id"=>$this->getId(),
              ":nome"=>$this->getNome(),
              ":cpf"=>$this->getCpf(),
              ":celular"=>$this->getCelular(),
              ":email"=>$this->getEmail(),
              ":login"=>$this->getLogin(),
              ":senha"=>$this->getSenha(),
              ":admin"=>$this->getAdmin(),
              ":ativo"=>$this->getAtivo())
    );

    return $stmt;

    }

    public function getList()
    {
        $sql = new Sql();
        $stmt = $sql->select("SELECT * FROM colaborador ORDER BY nome");

    }

}




