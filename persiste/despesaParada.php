<?php

require_once("Model/DespesaParada.php");
require_once("config/Mensagens.php");
require_once("config/Funcoes.php");

$despesaParada = new DespesaParada();
$func = new Funcoes();
$msg = new Mensagens();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST))
    {
        $dados = new stdClass();
        foreach ($_POST as $key => $value)
        {
            $dados->$key = $value;
        }

        $dados->valor = $func::formataValor($dados->valor);
        $despesaParada->setData($dados);

        if($despesaParada->getId() != 0 )
        {

            $despesaParada->update();
            exit;
            $msg::sucesso("Despesa Atualizado com sucesso!", "cadastro/viagem");

        } elseif ($despesaParada->getId() === 0) {

            $despesaParada->insert();
            $msg::sucesso("Despesa cadastrado com sucesso!","cadastro/viagem");

        } else {

            $msg::erro("Erro ao Cadastrar/Alterar despesa!");
        }


        } else {
            
            $msg::erro("Problema ao enviar os dados do formulario");

    }

}else {
    $msg::erro("Problema ao enviar os dados do formulario");
}



