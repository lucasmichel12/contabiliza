<?php


namespace Contabiliza\Controller;



class LoginController
{

    public function index()
    {
        require APP . "View/_template/header.php";
        require APP . "View/login/index.php";
        require APP . "View/_template/footer.php";
    }
    
    public function logar()
    {
        
    }
}