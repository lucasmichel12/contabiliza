<?php

declare(strict_types=1);

require_once("config/MySqlPDO.php");
require_once("config/Mensagens.php");

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

    

    public function setId($id = 0)
    {
        $this->id = $id;

    }

    public function setNome($nome)
    {
        $this->nome = $nome;

    }

    public function setCpf($cpf)
    {
        $msg = new Mensagens();
        
        // Extrai somente os números
	    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
	     
	    // Verifica se foi informado todos os digitos corretamente
	    if (strlen($cpf) != 11) {

	        $msg->erro("O CPF precisa ter ao menos 11 números");
	    }
	    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
	    if (preg_match('/(\d)\1{10}/', $cpf)) {

	        $msg->erro("CPF inválido");
	    }
	    // Faz o calculo para validar o CPF
	    for ($t = 9; $t < 11; $t++) {
	        for ($d = 0, $c = 0; $c < $t; $c++) {
	            $d += $cpf{$c} * (($t + 1) - $c);
	        }
	        $d = ((10 * $d) % 11) % 10;
	        if ($cpf{$c} != $d) {

	            $msg->erro("CPF inválido");
	        }
        }

        $this->cpf = $cpf;
        

    }

    public function setCelular($celular)
    {
        $celular = preg_replace( '/[^0-9]/is', '', $celular );
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
        return intval($this->id);
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
        $this->setId(($dados->id));
        $this->setNome(trim($dados->nome));
        $this->setCpf(trim($dados->cpf));
        $this->setCelular(trim($dados->celular));
        $this->setEmail(trim($dados->email));
        $this->setSenha(trim($dados->senha));
        $this->setLogin(trim($dados->login));
        $this->setAdmin(trim($dados->admin));
        $this->setAtivo(trim($dados->ativo));

    }

    public function selectOne($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM colaborador WHERE id = $id LIMIT 1");
        $this->setData($result);
        return $result;
    }

    public function selectAll()
    {
        $sql = new Sql();
        $result = $sql->query("SELECT * FROM colaborador ORDER BY nome");

        while($lista = $result->fetch(PDO::FETCH_OBJ))
        {
           $return[] = $lista;
        }

        return json_encode($return);
    }

    public function insert()
    {
        $sql = new Sql();
        $sql->query("CALL colaborador_insert(:id, :nome, :cpf, :celular, :email, :login, :senha, :admin, :ativo)",
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

    }

    public function update()
    {

        $sql = new Sql();
        $sql->query("UPDATE colaborador SET nome = ?, cpf = ?, celular = ?, email = ?, login = ?, admin = ?, ativo = ? WHERE id = ? LIMIT 1",
        array("1"=>$this->getNome(),
            "2"=>$this->getCpf(),
            "3"=>$this->getCelular(),
            "4"=>$this->getEmail(),
            "5"=>$this->getLogin(),
            "6"=>$this->getAdmin(),
            "7"=>$this->getAtivo(),
            "8"=>$this->getId()));
        
    }

    public function delete($id)
    {
        $sql = new Sql();
        $sql->query("DELETE FROM colaborador WHERE id = :id", array(":id"=>$id));
               
    }

}
