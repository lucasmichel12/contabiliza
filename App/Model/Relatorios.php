<?php


namespace Contabiliza\Model;

use Contabiliza\Core\Model;

class Relatorios extends Model
{
    public function despesas($params)
    {
        if ($params['id_despesa'] == "0") {
            $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim']);
            $result = $this->select(
                "SELECT
                            s.descricao AS solicitacao,
                            sd.qtd_despesa,
                            d.descricao AS despesa,
                            u.nome
                        FROM
                            solicitacao_despesa AS sd
                        INNER JOIN solicitacao AS s
                        ON
                            sd.id_solicitacao = s.id_solicitacao
                        INNER JOIN despesa AS d
                        ON
                            d.id_despesa = sd.id_despesa
                        INNER JOIN usuario AS u
                        ON
                            u.id_usuario = s.id_usuario
                        WHERE
                            s.data BETWEEN ? AND ?
                        ORDER BY
                            s.data
                        DESC",
                $parameter
            );
            return $result;
        } else {

            $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim'], "3"=>$params['id_despesa']);
            $result = $this->select(
                "SELECT
                            s.descricao AS solicitacao,
                            sd.qtd_despesa,
                            d.descricao AS despesa,
                            u.nome
                        FROM
                            solicitacao_despesa AS sd
                        INNER JOIN solicitacao AS s
                        ON
                            sd.id_solicitacao = s.id_solicitacao
                        INNER JOIN despesa AS d
                        ON
                            d.id_despesa = sd.id_despesa
                        INNER JOIN usuario AS u
                        ON
                            u.id_usuario = s.id_usuario
                        WHERE
                            s.data BETWEEN ? AND ? AND sd.id_despesa = ?
                        ORDER BY
                            s.data
                        DESC",
                $parameter
            );
            return $result;
        }
    }
}
