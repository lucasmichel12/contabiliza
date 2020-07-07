<?php

namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;

class ErrorController extends Controller
{
    public function index()
    {
        parent::loadViewAdmin("erro", "index");
    }
}