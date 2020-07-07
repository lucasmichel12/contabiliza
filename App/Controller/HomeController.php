<?php


namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;
use Contabiliza\Model\CentroCusto;
use Contabiliza\Model\Solicitacao;
use Contabiliza\Model\Usuario;

class HomeController extends Controller
{


    public function index()
    {
        $Solicitacao = new Solicitacao();
        $Usuarios = new Usuario();
        $CentroCusto = new CentroCusto();
        $solicitacoes = $Solicitacao->listSolicitacoesPendentes();
        $solicitacoesPendentes = count($solicitacoes);
        $solicitacoesConcluidas = count($Solicitacao->listSolicitacoesConcluidas());
        $solicitacoesAbertas = count($Solicitacao->listSolicitacoesAbertas());
        $usuarios = count($Usuarios->listActives());
        $centrosCusto = $CentroCusto->listActives();
        
        parent::loadViewAdmin("home", "index");
    }

    public function teste()
    {
        
    }
}
