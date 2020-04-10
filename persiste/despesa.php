<?php

require_once("config/Funcoes.php");
require_once("config/Mensagens.php");
require_once("Model/Despesa.php");
require_once("config/MySqlPDO.php");

$msg = new Mensagens();
$func = new Funcoes();
$despesa = new Despesa();

//Verificando qual o método de envio dos dodos, validando se estão vindo via POST pelo formulário.
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Verifica se veio as informações dentro do $_POST.
    if(isset($_POST))
    {
        //Transforma o array do $_POST em um Obj para passar para a função setData do Objeto Colaborador.
        $dados = new stdClass();
        foreach ($_POST as $key => $value)
        {
            $dados->$key = $value;
        }
        
        $dados->valor = $func::formataValor($dados->valor);
        $despesa->setData($dados);
        $func::seExiste('despesa', 'descricao', $despesa->getDescricao(),$despesa->getId());

        //Verifica se o ID veio vazio para fazer update ou insert na tabela.
        if($despesa->getId() != 0 )
        {

            $despesa->update();
            $msg::sucesso("Despesa Atualizado com sucesso!", "cadastro/despesa");

        } elseif ($despesa->getId() === 0) {

            $despesa->insert();
            $msg::sucesso("Despesa cadastrado com sucesso!","cadastro/despesa");

        } else {

            $msg::erro("Erro ao Cadastrar/Alterar despesa!");
        }


        } else {
            
            $msg::erro("Problema ao enviar os dados do formulario");

    }

    
   
} else {
    $msg::erro("Problema ao enviar os dados do formulario");
}