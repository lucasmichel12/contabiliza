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