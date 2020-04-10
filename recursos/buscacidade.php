<?php

    require_once("../config/MySqlPDO.php");

    $sql = new Sql();

    if(isset($_GET['cidade']))
    {
        $cidade = trim($_GET['cidade']);

        $result = $sql->select("SELECT id FROM cidade WHERE nome = :nome", array(":nome"=>$cidade));
        if(empty($result->id))
        {
            echo "Erro";
        } else {
            echo $result->id;
        }
    }



