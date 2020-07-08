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
        if ($_SESSION['usuario_logado']['admin']) {
            $Solicitacao = new Solicitacao();
            $Usuarios = new Usuario();
            $CentroCusto = new CentroCusto();
            $solicitacoes = $Solicitacao->listSolicitacoesPendentes();
            $data['pendentes'] = count($solicitacoes);
            $data['concluidas'] = count($Solicitacao->listSolicitacoesConcluidas());
            $data['abertas'] = count($Solicitacao->listSolicitacoesAbertas());
            $data['usuarios'] = count($Usuarios->listActives());
            $data['centrosCusto'] = $CentroCusto->listActives();

            parent::loadViewAdmin("home", "admin", $data);
        } else {

            parent::loadViewUser("home", "user");
        }
    }
}


