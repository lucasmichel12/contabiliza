<?php

require_once("config/MySqlPDO.php");
require_once("config/Mensagens.php");


class Filial
{
    private $id;
    private $cnpj;
    private $nome;
    private $cep;
    private $logradouro;
    private $bairro;
    private $numero;
    private $complemento;
    private $telefone;
    private $email;
    private $ativo;
    private $idCidade;
    public $cidade;
    public $estado;


    public function __construct()
    {
        
    }

    
    //Setters
    public function setId($id)
    {
        $this->id = $id;

    }
 
    public function setCnpj($cnpj)
    {
        $msg = new Mensagens();

        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	    // Valida tamanho
	    if (strlen($cnpj) != 14)
	        $msg->erro("CNPJ precisa ter ao menos 14 números");
	    // Valida primeiro dígito verificador
	    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	    {
	        $soma += $cnpj{$i} * $j;
	        $j = ($j == 2) ? 9 : $j - 1;
	    }
	    $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
        
	        $msg->erro("CNPJ inválido");
	    // Valida segundo dígito verificador
	    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	    {
	        $soma += $cnpj{$i} * $j;
	        $j = ($j == 2) ? 9 : $j - 1;
        }
        
	    $resto = $soma % 11;
        $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
        
        $this->cnpj = $cnpj;

    }
 
    public function setNome($nome)
    {
        $this->nome = $nome;

    }    
 
    public function setCep($cep)
    {
        $cep = preg_replace( '/[^0-9]/is', '', $cep );
        $this->cep = $cep;

    }
 
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

    }
 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

    }
 
    public function setNumero($numero)
    {
        $this->numero = $numero;

    }
 
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

    }
 
    public function setTelefone($telefone)
    {
        $telefone = preg_replace( '/[^0-9]/is', '', $telefone );
        $this->telefone = $telefone;

    }
 
    public function setEmail($email)
    {
        $this->email = $email;

    }
 
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

    }
 
    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;

    }
 
    //Getters
    public function getId()
    {
        return intval($this->id);
    }
 
    public function getCnpj()
    {
        return $this->cnpj;
    }
 
    public function getNome()
    {
        return $this->nome;
    }
 
    public function getCep()
    {
        return $this->cep;
    }
 
    public function getLogradouro()
    {
        return $this->logradouro;
    }
 
    public function getBairro()
    {
        return $this->bairro;
    }
 
    public function getNumero()
    {
        return $this->numero;
    }
 
    public function getComplemento()
    {
        return $this->complemento;
    }
 
    public function getTelefone()
    {
        return $this->telefone;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function getAtivo()
    {
        return $this->ativo;
    }
 
    public function getIdCidade()
    {
        return intval($this->idCidade);
    }
    

    public function setData($dados)
    {
        $this->setId($dados->id);
        $this->setCnpj(trim($dados->cnpj));
        $this->setNome(trim($dados->nome));
        $this->setcep(trim($dados->cep));
        $this->setLogradouro(trim($dados->logradouro));
        $this->setBairro(trim($dados->bairro));
        $this->setNumero(trim($dados->numero));
        $this->setComplemento(trim($dados->complemento));
        $this->setTelefone(trim($dados->telefone));
        $this->setEmail(trim($dados->email));
        $this->setAtivo(trim($dados->ativo));
        $this->setIdCidade(trim($dados->idCidade));
    }


    public function selectOne($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM filial WHERE id = $id LIMIT 1");
        $this->setData($result);
        $cidade = $sql->select("SELECT nome,idEstado FROM cidade WHERE id = :idCidade LIMIT 1",array(":idCidade"=>$this->getIdCidade()));
        $estado = $sql->select("SELECT uf FROM estado WHERE id = :idEstado LIMIT 1", array(":idEstado"=>$cidade->idEstado));
        $this->cidade = $cidade->nome;
        $this->estado = $estado->uf;
    }

    public function selectAll()
    {
        $msg = new Mensagens();
        $sql = new Sql();
        $result = $sql->query("SELECT * FROM filial ORDER BY nome");
        
        while($lista = $result->fetch(PDO::FETCH_OBJ))
        {
           $return[] = $lista;
        }
        
        if(!isset($return))
        {
            $msg::erro("Não há registros a serem listados!");
        }

        return json_encode($return);
    }

    public function insert()
    {
            $sql = new Sql();
            $msg = new Mensagens();
            $sql->query("CALL filial_insert(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )",
                array("1"=>$this->getId(),
                  "2"=>$this->getCnpj(),
                  "3"=>$this->getNome(),
                  "4"=>$this->getCep(),
                  "5"=>$this->getLogradouro(),
                  "6"=>$this->getBairro(),
                  "7"=>$this->getNumero(),
                  "8"=>$this->getComplemento(),
                  "9"=>$this->getTelefone(),
                  "10"=>$this->getEmail(),
                  "11"=>$this->getAtivo(),
                  "12"=>$this->getIdCidade()));
           
            
            $msg::sucesso("Filial cadastrada com sucesso!","cadastro/filial");

    }

    public function update()
    {

        $sql = new Sql();
        $sql->query("UPDATE filial SET cnpj = ?, nome = ?, cep = ?, logradouro = ?, bairro = ?, numero = ?, complemento = ?, telefone = ?, email = ?, ativo = ?, idCidade = ? WHERE id = ? LIMIT 1",
        array("1"=>$this->getCnpj(),
            "2"=>$this->getNome(),
            "3"=>$this->getCep(),
            "4"=>$this->getLogradouro(),
            "5"=>$this->getBairro(),
            "6"=>$this->getNumero(),
            "7"=>$this->getComplemento(),
            "8"=>$this->getTelefone(),
            "9"=>$this->getEmail(),
            "10"=>$this->getAtivo(),
            "11"=>$this->getIdCidade(),
            "12"=>$this->getId()));
    }

    public function delete($id)
    {
        $sql = new Sql();
        $sql->query("DELETE FROM filial WHERE id = :id", array(":id"=>$id));
               
    }

}