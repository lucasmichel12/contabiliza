<?php

namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;
use Contabiliza\Interfaces\CadastrosControllerInterfaces;
use Contabiliza\Model\Usuario;

class UsuarioController extends Controller implements CadastrosControllerInterfaces
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

        if ($_SESSION['usuario_logado']['admin']) {
            parent::loadViewAdmin("cadastro", "usuario");
        } else {

            parent::loadViewUser("erro", "negado", array());
        }
    }

    public function listar()
    {

        if ($_SESSION['usuario_logado']['admin']) {
            $data['usuarios'] = $this->Usuario->listActives();
            $data['btn'] = true;
            parent::loadViewAdmin("lista", "usuarios", $data);
        } else {

            parent::loadViewUser("erro", "negado", array());
        }
    }

    public function listarInativos()
    {

        if ($_SESSION['usuario_logado']['admin']) {
            $data['usuarios'] = $this->Usuario->listInactives();
            parent::loadViewAdmin("lista", "usuarios", $data);
        } else {

            parent::loadViewUser("erro", "negado", array());
        }
    }

    public function inserir()
    {
        if (isset($_POST['id_usuario'])) {
            $this->Usuario->update($_POST);
            header("location:" . URL . "Usuario/listar");
        } else {

            $this->Usuario->insert($_POST);
            header("location:" . URL . "Usuario/");
        }
    }

    public function editar()
    {

        if ($_SESSION['usuario_logado']['admin']) {
            $data['usuario'] = $this->Usuario->getOne($this->id);
            parent::loadViewAdmin("edita", "usuario", $data);
        } else {

            parent::loadViewUser("erro", "negado", array());
        }
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
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = explode('/', $url);
            if (isset($url[2])) $this->id = $url[2];
        }
    }

    //! Metodos especificos desta classe

    // Traz o registro da tabela pelo ID e monta a tela para alterar a senha
    public function alterarSenha()
    {
        $data['usuario'] = $this->Usuario->getOne($this->id);
        parent::loadViewAdmin("edita", "alterarSenha", $data);
    }

    // Chama a função 'changeSenha()' da Model Usuario e registra a senha nova
    public function salvarSenha()
    {
        $this->Usuario->changePassword($_POST['senha'], $_POST['id_usuario']);
        header("location:" . URL . "Usuario/listar");
    }
}
