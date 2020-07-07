<?php


namespace Contabiliza\Controller;

use Contabiliza\Model\CentroCusto;
use Contabiliza\Model\Despesa;
use Contabiliza\Model\Regiao;
use Contabiliza\Model\Roteiro;
use Contabiliza\Model\Solicitacao;
use Contabiliza\Controller\ErrorController;
use Contabiliza\Core\Controller;

class SolicitacaoController extends Controller
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

            parent::loadViewAdmin("solicitacao", "index");
            
        } else {

            //!Implementar mensagem de erro
            $this->Erro->index();
        }
    }

    public function abrirSolicitacao()
    {
        if ($this->Solicitacao->insert($_POST)) {
            header("location:" . URL . "Solicitacao/");
        } else {
            $this->Erro->index();
        }
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

    public function auditado()
    {

        $this->Solicitacao->closeSolicitation($_POST);
        header("location:" . URL . "Home");
    }

    public function solicitacoesPendentes()
    {
        $solicitacoes = $this->Solicitacao->listSolicitacoesPendentes();
        parent::loadViewAdmin("solicitacao", "pendentes");
    }


    public function solicitacoesConcluidas()
    {
        $solicitacoes = $this->Solicitacao->listSolicitacoesConcluidas();
        parent::loadViewAdmin("solicitacao", "concluidas");
    }

    public function auditoria()
    {
        if (isset($this->id)) {

            $id_solicitacao = intval($this->id);
            $solicitacao = $this->Solicitacao->getById($this->id);
            $despesasViagem = $this->Solicitacao->getDespesasSolicitacao($id_solicitacao);
            $roteiros = $this->Roteiro->getRoteirosSolicitacao($id_solicitacao);
            $rateios = $this->Solicitacao->getRateioSolicitacao($id_solicitacao);
            parent::loadViewAdmin("solicitacao", "auditoria");
        }
    }
}
