<?php


namespace Contabiliza\Core;


class Controller {

    public function loadViewAdmin($pasta, $arquivo)
    {
        require APP . "View/_template/header.php";
        require APP . "View/_template/menu.php";
        require APP . "View/$pasta/$arquivo.php";
        require APP . "View/_template/footer.php";

    }

    public function loadViewUser($pasta, $arquivo)
    {

        require APP . "View/_template/header.php";
        require APP . "View/_template/menu.php";
        require APP . "View/$pasta/$arquivo.php";
        require APP . "View/_template/footer.php";

    }
}