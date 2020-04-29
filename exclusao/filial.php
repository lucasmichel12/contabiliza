<?php

require_once("Model/Filial.php");
require_once("config/Mensagens.php");

    $filial = new Filial();
    $msg = new Mensagens();

if(isset($url[2]))
{
    $id = intval(trim($url[2]));
    $filial->delete($id);
    $msg::sucesso("Registro Excluido com Sucesso!","listagem/filial");
}
