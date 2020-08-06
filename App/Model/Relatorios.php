<?php


namespace Contabiliza\Model;

use Contabiliza\Core\Model;

class Relatorios extends Model
{
    public function despesas($params)
    {
        $solicitacao_despesa[] = "";
        $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim']);
        $id_solicitacao = $this->select("SELECT id_solicitacao FROM solicitacao WHERE data BETWEEN ? AND ? ORDER BY DATA", $parameter);

        if ($params['id_despesa'] == "0") {
            foreach ($id_solicitacao as $solicitacao) {
                $parameter = array("1" => $solicitacao['id_solicitacao']);

                $solicitacao_despesa[] = $this->select("SELECT a.id_despesa, a.id_solicitacao, b.descricao FROM solicitacao_despesa AS a
                                                        INNER JOIN despesa AS b ON a.id_despesa = b.id_despesa WHERE a.id_solicitacao = ?", $parameter);
            }
            return $solicitacao_despesa;
        } else {
            foreach ($id_solicitacao as $solicitacao) {
                $parameter = array("1" => $solicitacao['id_solicitacao'], "2" => $params['id_despesa']);
                $solicitacao_despesa[] = $this->select("SELECT a.id_despesa, a.id_solicitacao, b.descricao FROM solicitacao_despesa AS a
                                                        INNER JOIN despesa AS b ON a.id_despesa = b.id_despesa WHERE a.id_solicitacao = ? AND a.id_despesa = ?", $parameter);
            }
            return $solicitacao_despesa;
        }
        
    }
}
