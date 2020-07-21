<?php

namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;
use Contabiliza\Model\Despesa;

class RelatorioController extends Controller
{

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
}