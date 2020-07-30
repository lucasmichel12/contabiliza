<?php


namespace Contabiliza\Controller;

use Contabiliza\Helpers\Validacao;

class LoginController
{

    public function index()
    {
        require APP . "View/_template/header.php";
        require APP . "View/login/index.php";
        require APP . "View/_template/footer.php";
    }

    /*
    *Função de Login, busca no banco atraves do login, trás os dados e salva na Session
    */
    public function logar()
    {
        $Login = new Validacao();
        $usuario = $Login->login($_POST);
        if (isset($usuario)) {
            $_SESSION['usuario_logado'] = array(
                "id" => $usuario[0]['id_usuario'],
                "login" => $usuario[0]['login'],
                "nome" => $usuario[0]['nome'],
                "ativo" => $usuario[0]['ativo'],
                "admin" => $usuario[0]['admin']
            );
        }


        header("location:" . URL . "Home/");
    }

    public function logout()
    {
        session_unset();
        header("location:" . URL . "Home/");
    }
}
