<?php


namespace Contabiliza\Controller;

use Contabiliza\Model\CentroCusto;
use Contabiliza\Model\Despesa;
use Contabiliza\Model\Regiao;
use Contabiliza\Model\Roteiro;
use Contabiliza\Model\Solicitacao;
use Contabiliza\Controller\ErrorController;

class SolicitacaoController
{
    private $id;
    private $Solicitacao;
    private $Roteiro;
    private $CentroCusto;
    private $Regiao;
    private $Despesa;
    private $Erro;

    public function __construct()
    {
        $this->setId();
        $this->Solicitacao = new Solicitacao();
        $this->Roteiro = new Roteiro();
        $this->CentroCusto = new CentroCusto();
        $this->Regiao = new Regiao();
        $this->Despesa = new Despesa();
        $this->Erro = new ErrorController();
    }

    public function index()
    {
        $solicitacao = $this->Solicitacao->getOpen();

        if (isset($solicitacao[0])) {

            $id_solicitacao = intval($solicitacao[0]['id_solicitacao']);
            $this->Solicitacao->updateValor($id_solicitacao);
            $despesasViagem = $this->Solicitacao->getDespesasSolicitacao($id_solicitacao);
            $roteiros = $this->Roteiro->getRoteirosSolicitacao($id_solicitacao);
            $rateios = $this->Solicitacao->getRateioSolicitacao($id_solicitacao);
            $centrosCusto = $this->CentroCusto->listActives();
            $regioes = $this->Regiao->listActives();
            $despesas = $this->Despesa->listActives();

            require APP . "View/_template/header.php";
            require APP . 'View/_template/menu.php';
            require APP . 'View/solicitacao/index.php';
            require APP . 'View/_template/footer.php';
        } else {

            //!Implementar mensagem de erro
            $this->Erro->index();
        }
    }

    public function abrirSolicitacao()
    {
        $this->Solicitacao->insert($_POST);
        header("location:" . URL . "Solicitacao/");
    }

    public function atualizaRateio()
    {
        $this->Solicitacao->updateRateio($_POST);
        header("location:" . URL . "Solicitacao/");
    }

    // Adiciona um Roteiro na Viagem
    public function adicionaRoteiro()
    {
        $this->Roteiro->insert($_POST);
        header("location:" . URL . "Solicitacao/");
    }

    // Exclui um Roteiro da viagem 
    public function deletaRoteiroViagem()
    {
        $this->Roteiro->delete($this->id);
        header("location:" . URL . "Solicitacao/");
    }

    //Adiciona uma Despesa na Viagem
    public function adicionarDespesa()
    {
        $this->Solicitacao->insertDespesa($_POST);
        header("location:" . URL . "Solicitacao/");
    }

    public function deletaDespesaViagem()
    {
        $this->Solicitacao->deleteDespesa(intval($this->id));
        header("location:" . URL . "Solicitacao/");
    }

    public function setId()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = explode('/', $url);
            if (isset($url[2])) $this->id = $url[2];
        }
    }

    public function finalizaSolicitacao()
    {

        $this->Solicitacao->closeSolicitation($this->id, 1);
        header("location:" . URL . "Home");
    }

    public function solicitacoesPendentes()
    {
        $solicitacoes = $this->Solicitacao->listSolicitacoes(1);

        require APP . "View/_template/header.php";
        require APP . 'View/_template/menu.php';
        require APP . 'View/solicitacao/pendentes.php';
        require APP . 'View/_template/footer.php';
    }

    
    public function solicitacoesConcluidas()
    {
        $solicitacoes = $this->Solicitacao->listSolicitacoes(2);

        require APP . "View/_template/header.php";
        require APP . 'View/_template/menu.php';
        require APP . 'View/solicitacao/concluidas.php';
        require APP . 'View/_template/footer.php';
    }
}
