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
            $data['solicitacoes'] = $Solicitacao->listSolicitacoes(2);
            $data['pendentes'] = count($data['solicitacoes']);
            $data['concluidas'] = count($Solicitacao->listSolicitacoes(3));
            $data['abertas'] = count($Solicitacao->listSolicitacoes(1));
            $data['usuarios'] = count($Usuarios->listActives());

            parent::loadViewAdmin("home", "admin", $data);
        } else {

            $data[] = "";
            parent::loadViewUser("home", "user", $data);
        }
    }
}
