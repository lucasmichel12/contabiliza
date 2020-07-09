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
            $data['solicitacoes'] = $Solicitacao->listSolicitacoesPendentes();
            $data['pendentes'] = count($data['solicitacoes']);
            $data['concluidas'] = count($Solicitacao->listSolicitacoesConcluidas());
            $data['abertas'] = count($Solicitacao->listSolicitacoesAbertas());
            $data['usuarios'] = count($Usuarios->listActives());
            $data['centrosCusto'] = $CentroCusto->listActives();

            parent::loadViewAdmin("home", "admin", $data);
        } else {

            $data[] = "";
            parent::loadViewUser("home", "user", $data);
        }
    }
}
