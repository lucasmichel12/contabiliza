<?php


namespace Contabiliza\Controller;

use Contabiliza\Model\Solicitacao;
use Contabiliza\Model\Usuario;

class HomeController
{


    public function index()
    {
        $Solicitacao = new Solicitacao();
        $Usuarios = new Usuario();
        $solicitacoes = $Solicitacao->listSolicitacoesPendentes();
        $solicitacoesPendentes = count($solicitacoes);
        $solicitacoesConcluidas = count($Solicitacao->listSolicitacoesConcluidas());
        $solicitacoesAbertas = count($Solicitacao->listSolicitacoesAbertas());
        $usuarios = count($Usuarios->listActives());
        
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/home/index.php';
        require APP . 'View/_template/footer.php';
    }

    public function teste()
    {
    }
}
