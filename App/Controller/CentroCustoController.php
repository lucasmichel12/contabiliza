<?php

namespace Contabiliza\Controller;

use Contabiliza\Model\CentroCusto;

class CentroCustoController
{
    private $id;
    private $CentroCusto;


    public function __construct()
    {
        $this->getId();
        $this->CentroCusto = new CentroCusto();
    }

    public function index()
    {
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/cadastro/centroCusto.php';
        require APP . 'View/_template/footer.php';
    }

    public function listar()
    {
        $centroscusto = $this->CentroCusto->listAll();
        $btnHabilitar = true;
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/lista/centroCusto.php';
        require APP . 'View/_template/footer.php';
    }

    public function listarInativos()
    {
        $centroscusto = $this->CentroCusto->listAllInativos();

        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/lista/centroCusto.php';
        require APP . 'View/_template/footer.php';
    }

    public function editar()
    {
        $centrocusto = $this->CentroCusto->getOne($this->id);
        
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/alteracao/centroCusto.php';
        require APP . 'View/_template/footer.php';
    }

    public function insert()
    {
        if(isset($_POST['idcentro_custo']))
        {      
            $this->CentroCusto->update($_POST['idcentro_custo'], $_POST['descricao'], $_POST['cnpj'], $_POST['ativo']);
            header("location:" . URL . "CentroCusto/");
        } else { 
            $this->CentroCusto->insert($_POST['descricao'], $_POST['cnpj'], $_POST['ativo']);
            header("location:" . URL . "CentroCusto/");
        }        
    }

    public function deleta()
    {
        $this->CentroCusto->delete($this->id);
        header("location:" . URL . "CentroCusto/listar");
    }

    public function desabilita()
    {
        $this->CentroCusto->desabilita($this->id);
        header("location:" . URL . "CentroCusto/listar");
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