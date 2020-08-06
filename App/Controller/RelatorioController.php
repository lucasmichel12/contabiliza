<?php

namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;
use Contabiliza\Model\Despesa;
use Contabiliza\Model\Relatorios;

class RelatorioController extends Controller
{

    private $Relatorios;
    public function __construct()
    {
        $this->Relatorios = new Relatorios();
    }
    public function index()
    {
        parent::loadViewAdmin('relatorios', 'allrelatorios');
    }

    public function despesas()
    {
        $this->Despesa = new Despesa();
        $data['despesas'] = $this->Despesa->listActives();
        parent::loadViewAdmin('relatorios', 'despesas', $data);
    }

    public function relDespesa()
    {
        $data = $this->Relatorios->despesas($_POST);
        var_dump($data);
        parent::loadViewAdmin('relatorios', 'despesasrel', $data);
    }
}
