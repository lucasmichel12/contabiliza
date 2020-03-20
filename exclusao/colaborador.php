<?php

require_once("../Model/colaborador.php");
require_once("../config/Mensagens.php");

$colaborador = new Colaborador();

if(isset($_GET['param']))
{
    $id = intval(trim($_GET['param']));
}

$colaborador->delete($id);
