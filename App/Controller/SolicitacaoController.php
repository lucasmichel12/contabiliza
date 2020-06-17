<?php


namespace Contabiliza\Controller;

use Contabiliza\Model\Roteiro;
use Contabiliza\Model\Solicitacao;

class SolicitacaoController
{
    private $id;
    private $Solicitacao;
    private $Roteiro;

    public function __construct()
    {
        $this->setId();
        $this->Solicitacao = new Solicitacao();
        $this->Roteiro = new Roteiro();
    }

    public function index()
    {
        $solicitacao = $this->Solicitacao->getOpen();

        if(isset($solicitacao[0]))
        {
        
            $roteiros = $this->Roteiro->getRoteirosViagem($solicitacao[0]['id_solicitacao']);
            require APP . "View/_template/header.php";
            require APP . 'View/_template/menu.php';
            require APP . 'View/solicitacao/index.php';
            require APP . 'View/_template/footer.php';

        } else {

            //!Implementar mensagem de erro
        }
        
    }

    public function abrirSolicitacao()
    {
        $this->Solicitacao->insert($_POST);
        header("location:" . URL . "Solicitacao/index");
    }

    //? Inseri Roteiro na Viagem
    public function adicionaRoteiro()
    {
        $this->Roteiro->insert($_POST);
        header("location:" . URL . "Solicitacao/index");
    }

    // Exclui um Roteiro da viagem 
    public function deletaRoteiroViagem()
    {
        $this->Roteiro->delete($this->id);
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