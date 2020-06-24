<?php


namespace Contabiliza\Controller;

use Contabiliza\Model\CentroCusto;
use Contabiliza\Model\Despesa;
use Contabiliza\Model\Regiao;
use Contabiliza\Model\Roteiro;
use Contabiliza\Model\Solicitacao;

class SolicitacaoController
{
    private $id;
    private $Solicitacao;
    private $Roteiro;
    private $CentroCusto;
    private $Regiao;
    private $Despesa;

    public function __construct()
    {
        $this->setId();
        $this->Solicitacao = new Solicitacao();
        $this->Roteiro = new Roteiro();
        $this->CentroCusto = new CentroCusto();
        $this->Regiao = new Regiao();
        $this->Despesa = new Despesa();
    }

    public function index()
    {
        $solicitacao = $this->Solicitacao->getOpen();

        if(isset($solicitacao[0]))
        {
            $id_solicitacao = intval($solicitacao[0]['id_solicitacao']);
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
        }
        
    }

    public function abrirSolicitacao()
    {
        $this->Solicitacao->insert($_POST);
        header("location:" . URL . "Solicitacao/index");
    }

    public function atualizaRateio()
    {
        $this->Solicitacao->updateRateio($_POST);
        header("location:" . URL . "Solicitacao/index");
    }

    //? Adiciona um Roteiro na Viagem
    public function adicionaRoteiro()
    {
        $this->Roteiro->insert($_POST);
        header("location:" . URL . "Solicitacao/index");
    }

    //Adiciona uma Despesa na Viagem
    public function adicionarDespesa()
    {
        $this->Solicitacao->insertDespesa($_POST);
        $this->calculaValorDespesas(intval($_POST['id_solicitacao']));
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


    //Puxa todos os valores das despesas cadastradas buscando pelo ID da solicitação e soma todos
    public function calculaValorDespesas(Int $id_solicitacao)
    {
       $valores = $this->Solicitacao->getValorDespesa($id_solicitacao);
       $totValor = 0;
       for($i = 0; $i < count($valores); $i++)
       {
           $totValor += $valores[$i]['valor'];
       }
       $this->Solicitacao->updateValor(floatval($totValor), $id_solicitacao);
    }
}