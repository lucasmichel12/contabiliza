<?php

require_once("Mensagens.php");
class Sql extends PDO
{
	private $conn;

	public function __construct()
	{
		$this->conn = new PDO("mysql:host=localhost;dbname=sistema","root","");
	}

	private function setParams($statemant, $parameters = array())
	{
		foreach($parameters as $key => $value)
		{
			$this->setParam($statemant, $key, $value);
		}
	}

	private function setParam($statemant, $key, $value)
	{
		$statemant->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}

	public function select($rawQuery, $params = array())
	{
		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetch(PDO::FETCH_OBJ);
		 
	}
}


