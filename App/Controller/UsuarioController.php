<?php

namespace Contabiliza\Controller;


class UsuarioController
{
    public function index()
    {
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/cadastro/usuario.php';
        require APP . 'View/_template/footer.php';
    }
}