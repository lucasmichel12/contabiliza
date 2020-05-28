<?php

require_once("MySqlPDO.php");
require_once("Mensagens.php");


Class Funcoes 
{


    public static function seExiste(String $tabela, String $coluna, $valor, $idUpdate = 0)
    {

        $pdo = new Sql();
        $result = $pdo->select("SELECT id FROM $tabela WHERE $coluna = :valor ", array(":valor"=>$valor));

        if(isset($result->id))
        {   
            if($idUpdate !== intval($result->id))
            {   
                $msg = new Mensagens();
                $msg::erro("Já existe um(a) $coluna cadastrado(a) na base de dados!");
            }
            
        }

    }

    public static function formataValor( $valor ) {
		//receber 5.000,00 -> 5000,00
		$valor = str_replace(".", "", $valor);
		//5000,00 -> 5000.00
		$valor = str_replace(",", ".", $valor);
		return $valor;
	}
}