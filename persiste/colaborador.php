<?php

require_once("config/mensagens.php");
require_once("MySqlPDO.php");
require_once("Model/colaborador.php");


 $pdo = new Sql();
 $msg = new Mensagens();
 $func = new Funcoes();
 $colaborador = new Colaborador();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST))
        {
            $colaborador->setData($_POST);
        }


        if( !$colaborador->getSenha() === $check )
        {
            $msg::erro("As senhas digitadas não conferem!");

        } else {

            $senhaEncrypt = password_hash($colaborador->getSenha(), PASSWORD_DEFAULT);
            $func::seExiste('colaborador', 'cpf', $colaborador->getCpf());
        }

        
        if(empty($id))
        {
        }

    }