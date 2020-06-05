<?php

namespace Contabiliza\Controller;

use Contabiliza\Interfaces\CadastrosControllerInterfaces;
use Contabiliza\Model\Usuario;

class UsuarioController implements CadastrosControllerInterfaces
{
    private $id;
    private $Usuario;

    // Construct Inicia as duas variaveis acima
    public function __construct()
    {
        $this->setId();
        $this->Usuario = new Usuario();
    }

    public function index()
    {
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/cadastro/usuario.php';
        require APP . 'View/_template/footer.php';
    }

    public function listar()
    {
        $usuarios = $this->Usuario->listActives();
        $btnHabilitar = true;
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/lista/usuarios.php';
        require APP . 'View/_template/footer.php';
    }

    public function listarInativos()
    {
        $usuarios = $this->Usuario->listInactives();
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/lista/usuarios.php';
        require APP . 'View/_template/footer.php';
    }

    public function inserir()
    {
        if(isset($_POST['id_usuario']))
        {
            $this->Usuario->update(intval($_POST['id_usuario']), $_POST['nome'], $_POST['cpf'], $_POST['login'], $_POST['admin'], $_POST['ativo']);
            header("location:" . URL . "Usuario/listar");
        } else {

            $this->Usuario->insert($_POST['nome'], $_POST['cpf'], $_POST['login'], $_POST['senha'], $_POST['admin'], $_POST['ativo']);
            header("location:" . URL . "Usuario/");
        }
    }

    public function editar()
    {
        $usuario = $this->Usuario->getOne($this->id);

        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/edita/usuario.php';
        require APP . 'View/_template/footer.php';
        
    }

    public function deletar()
    {
        $this->Usuario->delete($this->id);
        header("location:" . URL . "Usuario/listar");
    }

    public function desabilitar()
    {
        $this->Usuario->inactivate($this->id);
        header("location:" . URL . "Usuario/listar");
    }

     public function setId()
     {
         if(isset($_GET['url']))
         {
             $url = $_GET['url'];
             $url = explode('/', $url);
             if(isset($url[2]))$this->id = $url[2];
         }
     }

     //! Metodos especificos desta classe

     // Traz o registro da tabela pelo ID e monta a tela para alterar a senha
     public function alterarSenha()
     {
         $usuario = $this->Usuario->getOne($this->id);
         
         require APP . 'View/_template/header.php';
         require APP . 'View/_template/main.php';
         require APP . 'View/edita/alterarSenha.php';
         require APP . 'View/_template/footer.php';
     }

     // Chama a função 'changeSenha()' da Model Usuario e registra a senha nova
     public function salvarSenha()
     {
         $this->Usuario->changePassword($_POST['senha'], $_POST['id_usuario']);
         header("location:" . URL . "Usuario/listar");
     }
}