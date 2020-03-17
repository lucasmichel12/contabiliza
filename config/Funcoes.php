<?php

require_once("MySqlPDO.php");
require_once("Mensagens");


Class Funcoes 
{


    public static function seExiste(String $tabela, String $coluna, $valor)
    {

        $pdo = new Sql();
        $result = $pdo->select("SELECT id FROM $tabela WHERE $coluna = :valor ", array(":valor"=>$valor));

        if(count($result) > 0)
        {
            $msg::erro("Já existe um(a) $valor cadastrado na base de dados!");
        }

    }
}