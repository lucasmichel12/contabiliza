<?php

namespace Contabiliza\Controller;

use Contabiliza\Model\Despesa;

class DespesaController
{
    private $id;
    private $Despesa;

    public function __construct()
    {
        $this->getId();
        $this->Despesa = new Despesa();
    }

    public function index()
    {
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/cadastro/despesa.php';
        require APP . 'View/_template/footer.php';
    }

    public function insert()
    {
        if(isset($_POST['id_despesa']))
        {
            $this->Despesa->update($_POST['id_despesa'], $_POST['descricao'], $_POST['valor_definido'], $_POST['ativo'], $_POST['valor']);
            header("location:" . URL . "Despesa/");
        } else {
            $this->Despesa->insert($_POST['descricao'], $_POST['valor_definido'], $_POST['ativo'], $_POST['valor']);
            header("location:" . URL . "Despesa/");
        }
    }
    public function listar()
    {
        $despesas = $this->Despesa->listAll();
        $btnHabilitar = true;
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/lista/despesa.php';
        require APP . 'View/_template/footer.php';
    }

    public function listarInativos()
    {
        $despesas = $this->Despesa->listAllInativos();
        
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/lista/despesa.php';
        require APP . 'View/_template/footer.php';
    }

    public function altera()
    {
        $despesa = $this->Despesa->getOne($this->id);

        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/alteracao/despesa.php';
        require APP . 'View/_template/footer.php';
        
    }


    public function deleta()
    {
        $this->Despesa->delete($this->id);
        header("location:" . URL . "Despesa/listar");
    }

    public function desabilita()
    {
        $this->Despesa->desabilita($this->id);
        header("location:" . URL . "Despesa/listar");
    }


       //Função temporaria até eu achar uma forma melhor kkkk
       public function getId()
       {
           if(isset($_GET['url']))
           {
               $url = $_GET['url'];
               $url = explode('/', $url);
               $this->id = $url[2];
           }
       }
}