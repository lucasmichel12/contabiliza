<?php

namespace Contabiliza\Controller;



class ErrorController
{
    public function index()
    {
        require APP . 'View/_template/header.php';
        require APP . 'View/erro/index.php';
        require APP . 'View/_template/footer.php';
    }
}