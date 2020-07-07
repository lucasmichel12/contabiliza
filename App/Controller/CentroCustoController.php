<?php

namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;
use Contabiliza\Interfaces\CadastrosControllerInterfaces;
use Contabiliza\Model\CentroCusto;

class CentroCustoController extends Controller implements CadastrosControllerInterfaces
{

    private $id;
    private $CentroCusto;

    // Construct Inicia as duas variaveis acima
    public function __construct()
    {
        $this->setId();
        $this->CentroCusto = new CentroCusto();
    }

    public function index()
    {
        parent::loadViewAdmin("cadastro", "centroCusto");
    }

    public function listar()
    {
        $centroscusto = $this->CentroCusto->listActives();
        $btnHabilitar = true;
        parent::loadViewAdmin("lista", "centrosCusto");
    }

    public function listarInativos()
    {
        $centroscusto = $this->CentroCusto->listInactives();
  
        parent::loadViewUser("lista", "centrosCusto");
    }

    public function editar()
    {
        $centrocusto = $this->CentroCusto->getOne($this->id);
        parent::loadViewAdmin("edita", "centroCusto");
    }

    public function inserir()
    {
        if(isset($_POST['idcentro_custo']))
        {      
            $this->CentroCusto->update($_POST);
            header("location:" . URL . "CentroCusto/");
        } else { 
            $this->CentroCusto->insert($_POST);
            header("location:" . URL . "CentroCusto/");
        }        
    }

    public function deletar()
    {
        $this->CentroCusto->delete($this->id);
        header("location:" . URL . "CentroCusto/listar");
    }

    public function desabilitar()
    {
        $this->CentroCusto->inactivate($this->id);
        header("location:" . URL . "CentroCusto/listar");
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
}