<?php

namespace Contabiliza\Controller;

use Contabiliza\Model\Usuario;

class UsuarioController
{
    private $id;
    private $Usuario;

    public function __construct()
    {
        $this->getId();
        $this->Usuario = new Usuario();
    }
    public function index()
    {
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/cadastro/usuario.php';
        require APP . 'View/_template/footer.php';
    }

    public function listar()
    {
        $usuarios = $this->Usuario->listAll();
        $btnHabilitar = true;
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/lista/usuario.php';
        require APP . 'View/_template/footer.php';
    }

    public function insert()
    {
        if(isset($_POST['id_usuario']))
        {
            $this->Usuario->update(intval($_POST['id_regiao']), $_POST['nome'], $_POST['cpf'], $_POST['login'], $_POST['admin'], $_POST['ativo']);
        } else {

            $this->Usuario->insert($_POST['nome'], $_POST['cpf'], $_POST['login'], $_POST['senha'], $_POST['admin'], $_POST['ativo']);
            header("location:" . URL . "Usuario/");
        }
    }

    public function altera()
    {
        $usuario = $this->Usuario->getOne($this->id);

        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/alteracao/usuario.php';
        require APP . 'View/_template/footer.php';
        
    }

    

     //Função temporaria até eu achar uma forma melhor kkkk
     public function getId()
     {
         if(isset($_GET['url']))
         {
             $url = $_GET['url'];
             $url = explode('/', $url);
             if(isset($url[2]))$this->id = $url[2];
         }
     }
}