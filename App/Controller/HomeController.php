<?php


namespace Contabiliza\Controller;

use Contabiliza\Model\Solicitacao;

class HomeController
{


    public function index()
    {
        $Solicitacao = new Solicitacao();
        $solicitacoes = $Solicitacao->listSolicitacoes(1);
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/home/index.php';
        require APP . 'View/_template/footer.php';
    }

    public function teste()
    {
    }
}
