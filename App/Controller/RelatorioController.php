<?php

namespace Contabiliza\Controller;

use Contabiliza\Core\Controller;
use Contabiliza\Model\CentroCusto;
use Contabiliza\Model\Despesa;
use Contabiliza\Model\Relatorios;
use Contabiliza\Model\Usuario;

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
        parent::loadViewAdmin('relatorios', 'despesasReembolsoCentro', $data);
    }

    public function despesasReembolsoCentroRel()
    {
        $data['relatorio'] = $this->Relatorios->reembolso($_POST);
        parent::loadViewAdmin('relatorios', 'despesasReembolsoCentroRel', $data);
    }

    public function despesasReembolsoUsuario()
    {
        $this->Usuario = new Usuario();
        $data['usuario'] = $this->Usuario->listActives();
        parent::loadViewAdmin('relatorios', 'despesasReembolsoUsuarios', $data);
    }

    public function despesasReembolsoUsuariosRel()
    {
        $data['relatorio'] = $this->Relatorios->usuario($_POST);
        parent::loadViewAdmin('relatorios', 'despesasReembolsoUsuariosrel', $data);
    }
}
