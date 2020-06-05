<?php

namespace Contabiliza\Controller;

use Contabiliza\Interfaces\CadastrosControllerInterfaces;
use Contabiliza\Model\CentroCusto;

class CentroCustoController implements CadastrosControllerInterfaces
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
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/cadastro/centroCusto.php';
        require APP . 'View/_template/footer.php';
    }

    public function listar()
    {
        $centroscusto = $this->CentroCusto->listActives();
        $btnHabilitar = true;
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/lista/centrosCusto.php';
        require APP . 'View/_template/footer.php';
    }

    public function listarInativos()
    {
        $centroscusto = $this->CentroCusto->listInactives();
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/lista/centrosCusto.php';
        require APP . 'View/_template/footer.php';
    }

    public function editar()
    {
        $centrocusto = $this->CentroCusto->getOne($this->id);
        
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/edita/centroCusto.php';
        require APP . 'View/_template/footer.php';
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