<?php

namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;
use Contabiliza\Model\CentroCusto;
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

    public function despesaPorTipo()
    {
        $this->Despesa = new Despesa();
        $data['despesas'] = $this->Despesa->listActives();
        parent::loadViewAdmin('relatorios', 'despesasPorTipo', $data);
    }
    
    public function despesaCentroTipo()
    {
        $this->Despesa = new Despesa();
        $data['despesas'] = $this->Despesa->listActives();
        $this->CentroCusto = new CentroCusto();
        $data['centrocusto'] = $this->CentroCusto->listActives();
        parent::loadViewAdmin('relatorios', 'despesasCentroTipo', $data);
    }

    public function despesaPorTipoRel()
    {
        $data['relatorio'] = $this->Relatorios->despesas($_POST);
        parent::loadViewAdmin('relatorios', 'despesasPorTipoRel', $data);
    }

    public function despesaCentroTipoRel()
    {
        $data['relatorio'] = $this->Relatorios->centro($_POST);
        parent::loadViewAdmin('relatorios', 'despesasCentroTipoRel', $data);
    }

    public function despesasReembolsoCentro()
    {
        $this->CentroCusto = new CentroCusto();
        $data['centrocusto'] = $this->CentroCusto->listActives();
        $data['relatorio'] = $this->Relatorios->reembolso($_POST);
        parent::loadViewAdmin('relatorios', 'despesasReembolsoCentro', $data);
    }
}
