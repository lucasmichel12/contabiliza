<?php
//Require dos Classes e arqpuivos necessarios para o código rodar
require_once("../config/mensagens.php");
require_once("../config/MySqlPDO.php");
require_once("../Model/colaborador.php");
require_once("../config/Funcoes.php");


// Instanciando as Classes a serem usados no restante do código.
 $pdo = new Sql();
 $msg = new Mensagens();
 $func = new Funcoes();
 $colaborador = new Colaborador();


//Verificando qual o método de envio dos dodos, validando se estão vindo via POST pelo formulário.
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        //Verifica se veio as informações dentro do $_POST.
        if(isset($_GET))
        {
            //Transforma o array do $_POST em um Obj para passar para a função setData do Objeto Colaborador.
            $dados = new stdClass();
            foreach ($_GET as $key => $value)
            {
                $dados->$key = $value;
            }
            
            $colaborador->setData($dados);

            //Verifica as senha digitadas e faz o encrypt caso as senhas estejam iguais, depois verifica se o CPF digitado já existe na base de dados.
            if($colaborador->getSenha() !== $dados->check )
            {
                $msg::erro("As senhas digitadas não conferem!");
               
            } else {

                $colaborador->setSenha($senhaEncrypt = password_hash($colaborador->getSenha(), PASSWORD_DEFAULT));
                $func::seExiste('colaborador', 'cpf', $colaborador->getCpf());
                $func::seExiste('colaborador', 'login', $colaborador->getLogin());
            }

            //Verifica sem o ID veio vazio para fazer update ou insert na tabela.
            if($colaborador->getId() != 0 )
            {
          
                $colaborador->update();
                $msg::sucesso("Usuário Atualizado com sucesso!", "cadastro/colaborador");

            } elseif ($colaborador->getId() === 0) {
                
                $colaborador->insert();
                $msg::sucesso("Usuário cadastrado com sucesso!","cadastro/colaborador");

            } else {

                $msg::erro("Erro ao Cadastrar/Alterar usuário!");
            }


            } else {
                
                $msg::erro("Problema ao enviar os dados do formulario");

            }

        
       
    }