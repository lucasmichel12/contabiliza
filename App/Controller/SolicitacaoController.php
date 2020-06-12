<?php


namespace Contabiliza\Controller;

use Contabiliza\Model\Solicitacao;

class SolicitacaoController
{
    private $id;
    private $Solicitacao;


    public function __construct()
    {
        $this->setId();
        $this->Solicitacao = new Solicitacao();
    }

    public function index()
    {
        $solicitacao = $this->Solicitacao->getOpen();
        
        require APP . "View/_template/header.php";
        require APP . 'View/_template/menu.php';
        require APP . 'View/solicitacao/index.php';
        require APP . 'View/_template/footer.php';
        
    }

    public function abrirSolicitacao()
    {
        $this->Solicitacao->insert($_POST);
        
        header("location:" . URL . "Solicitacao/index");
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