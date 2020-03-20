<?php

require_once("MySqlPDO.php");
require_once("Mensagens.php");


Class Funcoes 
{


    public static function seExiste(String $tabela, String $coluna, $valor)
    {

        $pdo = new Sql();
        $result = $pdo->select("SELECT id FROM $tabela WHERE $coluna = :valor ", array(":valor"=>$valor));

        if(isset($result->id))
        {   
            $msg = new Mensagens();
            $msg::erro("Já existe um(a) $coluna cadastrado na base de dados!");
        }

    }
}