<?php


namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;
use Contabiliza\Interfaces\CadastrosControllerInterfaces;
use Contabiliza\Model\Regiao;

class RegiaoController extends Controller implements CadastrosControllerInterfaces
{
    private $id;
    private $Regiao;

    // Construct Inicia as duas variaveis acima
    public function __construct()
    {
        $this->setId();
        $this->Regiao = new Regiao();
    }

    public function index()
    {


        if ($_SESSION['usuario_logado']['admin']) {

            parent::loadViewAdmin("cadastro", "regiao");
        } else {

            parent::loadViewUser("erro", "negado", array());
        }
    }

    public function listar()
    {

        if ($_SESSION['usuario_logado']['admin']) {

            $data['regioes'] = $this->Regiao->listActives();
            $data['btn'] = true;
            parent::loadViewAdmin("lista", "regioes", $data);
        } else {

            parent::loadViewUser("erro", "negado", array());
        }
    }

    public function listarInativos()
    {

        if ($_SESSION['usuario_logado']['admin']) {

            $data['regioes'] = $this->Regiao->listInactives();
            parent::loadViewAdmin("lista", "regioes", $data);
        } else {

            parent::loadViewUser("erro", "negado", array());
        }
    }

    public function editar()
    {
        
        if ($_SESSION['usuario_logado']['admin']) {

            $data['regiao'] = $this->Regiao->getOne($this->id);
            parent::loadViewAdmin("edita", "regiao", $data);
        } else {

            parent::loadViewUser("erro", "negado", array());
        }
    }

    public function inserir()
    {
        if (isset($_POST['id_regiao'])) {
            $this->Regiao->update($_POST);
        } else {
            $this->Regiao->insert($_POST);
        }

        header("location:" . URL . "Regiao/listar");
    }

    public function deletar()
    {
        $this->Regiao->delete($this->id);
        header("location:" . URL . "Regiao/listar");
    }

    public function desabilitar()
    {
        $this->Regiao->inactivate($this->id);
        header("location:" . URL . "Regiao/listar");
    }

    public function setId()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = explode('/', $url);
            if (isset($url[2])) $this->id = $url[2];
        }
    }
}
