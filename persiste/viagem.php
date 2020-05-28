<?php


require_once("config/Funcoes.php");
require_once("config/Mensagens.php");
require_once("Model/Viagem.php");




$msg = new Mensagens();
$viagem = new Viagem();
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

            $viagem->setData($dados);

            $func->seExiste('viagem','status','Aberto');
            if($viagem->getId() != 0 )
            {
                
                $viagem->update();
                $msg::sucesso("viagem Atualizada com sucesso!", "cadastro/viagem");

            } elseif ($viagem->getId() === 0) {
                
                $viagem->insert();
                $msg::sucesso("viagem Cadastrada com sucesso!", "cadastro/viagem");

            } else {

                $msg::erro("Erro ao Cadastrar/Alterar viagem!");
    
            }

        } else {
            
            $msg::erro("Problema ao enviar os dados do formulario");

        }

    } else {
        $msg::erro("Problema ao enviar os dados do formulario");
    }