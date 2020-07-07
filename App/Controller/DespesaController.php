<?php

namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;
use Contabiliza\Interfaces\CadastrosControllerInterfaces;
use Contabiliza\Model\Despesa;

class DespesaController extends Controller implements CadastrosControllerInterfaces
{
    private $id;
    private $Despesa;

    // Construct Inicia as duas variaveis acima
    public function __construct()
    {
        $this->setId();
        $this->Despesa = new Despesa();
    }

    public function index()
    {
        parent::loadViewAdmin("cadastro", "despesa");
    }

    public function listar()
    {
        $despesas = $this->Despesa->listActives();
        $btnHabilitar = true;
        parent::loadViewAdmin("lista", "despesas");
    }

    public function listarInativos()
    {
        $despesas = $this->Despesa->listInactives();
        parent::loadViewAdmin("lista", "despesas");
    }

    public function editar()
    {
        $despesa = $this->Despesa->getOne($this->id);
        parent::loadViewAdmin("edita", "despesa");
    }

    public function inserir()
    {
        if (isset($_POST['id_despesa'])) {
            $this->Despesa->update($_POST);
            header("location:" . URL . "Despesa/");
        } else {
            $this->Despesa->insert($_POST);
            header("location:" . URL . "Despesa/");
        }
    }

    public function deletar()
    {
        $this->Despesa->delete($this->id);
        header("location:" . URL . "Despesa/listar");
    }

    public function desabilitar()
    {
        $this->Despesa->inactivate($this->id);
        header("location:" . URL . "Despesa/listar");
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
