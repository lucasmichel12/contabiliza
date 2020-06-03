<?php

namespace Contabiliza\Core;


use PDO;

class Model extends PDO
{
    private $conn;

    public function __construct()
    {
        //Inicia a conexão com o banco de dados
        try {
            $this->abreConexao();
        } catch (\PDOException $e) {
            exit("Falha ao estabelecer conexão com o banco de dados");
        }
    }

    
    private function abreConexao()
    {
		//Forma a Conexão com o banco de dados
        $this->conn = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    }

    //Seta varios parametros 
    private function setParams($statemant, $parameters = array())
	{
		foreach($parameters as $key => $value)
		{
			$this->setParam($statemant, $key, $value);
		}
	}

    //Seta os parametros
	private function setParam($statemant, $key, $value)
	{
		$statemant->bindParam($key, $value);
	}

    //Função que vai executar o SQL
	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}

    //Função pque executa o SQL e retorna o resultado em Objetos
	public function select($rawQuery, $params = array())
	{
		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll();
		 
	}
}