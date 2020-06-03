<?php


namespace Contabiliza\Controller;


class HomeController
{
    public function index()
    {
            require APP . 'View/_template/header.php';
            require APP . 'View/_template/main.php';
            require APP . 'View/home/index.php';
            require APP . 'View/_template/footer.php';
    }

    public function teste()
    {
        
    }
}