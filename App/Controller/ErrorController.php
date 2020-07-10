<?php

namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;

class ErrorController extends Controller
{
    public function index()
    {
        if($_SESSION['usuario_logado']['admin'])
        {
            parent::loadViewAdmin("erro", "index");     
        } else {
            parent::loadViewUser("erro", "index");
        }


    }
}