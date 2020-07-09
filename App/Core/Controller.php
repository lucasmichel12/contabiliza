<?php


namespace Contabiliza\Core;


class Controller {

    public function loadViewAdmin(String $pasta, String $arquivo, array $data = array())
    {


        require APP . "View/_template/header.php";
        require APP . "View/_template/admin/menu.php";
        require APP . "View/$pasta/$arquivo.php";
        require APP . "View/_template/footer.php";

    }

    public function loadViewUser(String $pasta, String $arquivo, array $data)
    {

        require APP . "View/_template/header.php";
        require APP . "View/_template/user/menu.php";
        require APP . "View/$pasta/$arquivo.php";
        require APP . "View/_template/footer.php";

    }
}