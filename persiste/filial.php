<?php

require_once("../config/Funcoes.php");
require_once("../config/Mensagens.php");
require_once("../Model/Filial.php");


$pdo = new Sql();
$msg = new Mensagens();
$filial = new Filial();
$func = new Funcoes();


    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        if(isset($_GET))
        {
            $dados = new stdClass();
            foreach ($_GET as $key => $value)
            {
                $dados->$key = $value;
            }

            $filial->setData($dados);
            $func::seExiste("filial", "cnpj", $filial->getCnpj());

            if($filial->getId() != 0 )
            {
          
                $filial->update();
                $msg::sucesso("Filial Atualizada com sucesso!", "cadastro/filial");

            } elseif ($filial->getId() === 0) {
                
                $filial->insert();
                $msg::sucesso("Filial cadastrada com sucesso!","cadastro/filial");

            } else {

                $msg::erro("Erro ao Cadastrar/Alterar Filial!");
            }

        } else {
            
            $msg::erro("Problema ao enviar os dados do formulario");
        }
    }