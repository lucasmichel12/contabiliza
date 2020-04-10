<?php


require_once("config/Funcoes.php");
require_once("config/Mensagens.php");
require_once("Model/Filial.php");




$msg = new Mensagens();
$filial = new Filial();
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


            $filial->setData($dados);
            
            $func::seExiste("filial", "cnpj", $filial->getCnpj(), $filial->getId());

            if($filial->getId() != 0 )
            {
          
                $filial->update();
                $msg::sucesso("Filial Atualizada com sucesso!", "cadastro/filial");

            } elseif ($filial->getId() === 0) {
                
                $filial->insert();


            } else {

                $msg::erro("Erro ao Cadastrar/Alterar Filial!");
            }

        } else {
            
            $msg::erro("Problema ao enviar os dados do formulario");
        }

    } else {
        $msg::erro("Problema ao enviar os dados do formulario");
    }