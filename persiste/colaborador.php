<?php

require_once("config/mensagens.php");
require_once("MySqlPDO.php");


 $pdo = new Sql();
 $msg = new Mensagens();
 $func = new Funcoes();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $id = $nome = $cpf = $celular = $email = $login = $senha = $check = $admin = $ativo = "";

        foreach ($_POST as $key => $value) {
            if(isset($_POST[$key]))
            {
                $$key = trim($value);
            }
        }


        if( !$senha === $check )
        {
            $msg::mensagem("As senhas digitadas não conferem!");
        } else {
            $senhaEncrypt = password_hash($senha, PASSWORD_DEFAULT);
        }

        $func::seExiste('colaborador', 'cpf', $cpf);


    }