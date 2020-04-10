<?php

require_once("Model/Despesa.php");
require_once("config/Mensagens.php");

$despesa = new Despesa();

if(isset($url[2]))
{
    $id = intval(trim($url[2]));

}

$despesa->delete($id);
