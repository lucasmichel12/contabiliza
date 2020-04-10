<?php

require_once("Model/colaborador.php");
require_once("config/Mensagens.php");

    $colaborador = new Colaborador();
    $msg = new Mensagens();

if(isset($url[2]))
{
    $id = intval(trim($url[2]));
    $colaborador->delete($id);
    $msg::sucesso("Registro Excluido com Sucesso!","listagem/colaborador");
}

