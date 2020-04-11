<?php


require_once("config/Funcoes.php");
require_once("config/Mensagens.php");
require_once("Model/Parada.php");




$msg = new Mensagens();
$parada = new Parada();
$func = new Funcoes();


    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST))
        {
            $dados = new stdClass();
            foreach ($_POST as $key => $value)
            {
                $dados->$key = $value;
            }

            $parada->setData($dados);

            if($parada->getId() != 0 )
            {
          
                $parada->update();
                $msg::sucesso("Parada Atualizada com sucesso!", "cadastro/viagem");

            } elseif ($parada->getId() === 0) {
                
                $parada->insert();
                $msg::sucesso("Parada Cadastrada com sucesso!", "cadastro/viagem");
                exit;

            } else {

                $msg::erro("Erro ao Cadastrar/Alterar Parada!");
    
            }

        } else {
            
            $msg::erro("Problema ao enviar os dados do formulario");

        }

    } else {
        $msg::erro("Problema ao enviar os dados do formulario");
    }