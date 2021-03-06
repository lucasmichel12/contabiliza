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
                format(sd.valor,2,'de_DE') AS valor
            FROM
                solicitacao_despesa AS sd
            INNER JOIN solicitacao AS s
            ON
                sd.id_solicitacao = s.id_solicitacao
            INNER JOIN despesa AS d
            ON
                d.id_despesa = sd.id_despesa
            WHERE
                s.data BETWEEN ? AND ?
            ORDER BY sd.valor  DESC",
                $parameter
            );
            return $result;
        } else {

            $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim'], "3" => $params['id_despesa']);
            $result = $this->select(
                "SELECT
                            s.descricao AS solicitacao,
                            sd.qtd_despesa,
                            d.descricao AS despesa,
                            format(sd.valor,2,'de_DE') AS valor
                        FROM
                            solicitacao_despesa AS sd
                        INNER JOIN solicitacao AS s
                        ON
                            sd.id_solicitacao = s.id_solicitacao
                        INNER JOIN despesa AS d
                        ON
                            d.id_despesa = sd.id_despesa
                        WHERE
                            s.data BETWEEN ? AND ? AND sd.id_despesa = ?
                            ORDER BY sd.valor  DESC",
                $parameter
            );
            return $result;
        }
    }

    public function centro($params)
    {
        if ($params['id_despesa']  == "0" && $params['idcentro_custo'] == "0") {
            $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim']);
            $result = $this->select(
                "SELECT
                cc.descricao AS centro_custo,
                format(SUM(sd.valor),2, 'de_DE') AS valor,
                count(sd.qtd_despesa) AS qtd
               FROM solicitacao AS s
               INNER JOIN centro_custo AS cc
               ON
                cc.idcentro_custo = s.idcentro_custo
               INNER JOIN solicitacao_despesa AS sd
                ON s.id_solicitacao = sd.id_solicitacao
                
                WHERE s.data BETWEEN ? AND ?
                GROUP BY cc.descricao
                ORDER BY sd.valor",
                $parameter
            );
            return $result;
        } elseif ($params['id_despesa']  != "0" && $params['idcentro_custo'] == "0") {

            $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim'], "3" => $params['id_despesa'],);
            $result = $this->select(
                "SELECT
            cc.descricao AS centro_custo,
            d.descricao AS despesa,
                format(SUM(sd.valor),2,'de_DE') AS valor,
            sd.qtd_despesa,
            s.descricao
        FROM
            solicitacao_despesa AS sd
        INNER JOIN solicitacao AS s
        ON
            sd.id_solicitacao = s.id_solicitacao
        INNER JOIN centro_custo AS cc
        ON
            cc.idcentro_custo = s.idcentro_custo
        INNER JOIN despesa AS d
        ON
            sd.id_despesa = d.id_despesa
        WHERE
            s.data BETWEEN ? AND ? AND d.id_despesa = ?
        ORDER BY
            s.data
        DESC",
                $parameter
            );
            return $result;
        } elseif ($params['id_despesa']  != "0" && $params['idcentro_custo'] != "0") {

            $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim'], "3" => $params['idcentro_custo'], "4" => $params['id_despesa']);
            $result = $this->select(
                "SELECT
            cc.descricao AS centro_custo,
            d.descricao AS despesa,
            format(SUM(sd.valor),2,'de_DE') AS valor,
            sd.qtd_despesa,
            s.descricao
        FROM
            solicitacao_despesa AS sd
        INNER JOIN solicitacao AS s
        ON
            sd.id_solicitacao = s.id_solicitacao
        INNER JOIN centro_custo AS cc
        ON
            cc.idcentro_custo = s.idcentro_custo
        INNER JOIN despesa AS d
        ON
            sd.id_despesa = d.id_despesa
        WHERE
            s.data BETWEEN ? AND ? AND cc.idcentro_custo = ? AND d.id_despesa = ?
        ORDER BY
            s.data
        DESC",
                $parameter
            );
            return $result;
        } elseif ($params['id_despesa']  == "0" && $params['idcentro_custo'] != "0") {

            $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim'], "3" => $params['idcentro_custo']);
            $result = $this->select(
                "SELECT
            cc.descricao AS centro_custo,
            d.descricao AS despesa,
            format(SUM(sd.valor),2, 'de_DE') AS valor,
            sd.qtd_despesa,
            s.descricao
        FROM
            solicitacao_despesa AS sd
        INNER JOIN solicitacao AS s
        ON
            sd.id_solicitacao = s.id_solicitacao
        INNER JOIN centro_custo AS cc
        ON
            cc.idcentro_custo = s.idcentro_custo
        INNER JOIN despesa AS d
        ON
            sd.id_despesa = d.id_despesa
        WHERE
            s.data BETWEEN ? AND ? AND cc.idcentro_custo = ?
        ORDER BY
            s.data
        DESC",
                $parameter
            );
            return $result;
        }
    }

    public function usuario($params)
    {
        if ($params['id_usuario'] == "0") {
            $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim']);
            $result = $this->select(
                "SELECT
                u.nome,
                format(sd.valor,2, 'de_DE') AS valor,
                d.descricao
            FROM
                solicitacao_despesa AS sd
            INNER JOIN solicitacao AS s
            ON
                sd.id_solicitacao = s.id_solicitacao
            INNER JOIN usuario AS u
            ON
                u.id_usuario = s.id_usuario
            INNER JOIN despesa AS d
            ON
                sd.id_despesa = d.id_despesa
            WHERE
                s.data BETWEEN ? AND ?  
            ORDER BY `d`.`descricao` ASC",
                $parameter
            );
            return $result;

        } else {

            $parameter = array("1" => $params['dataIni'], "2" => $params['dataFim'], "3" => $params['id_usuario']);
            $result = $this->select(
                "SELECT
                u.nome,
                format(SUM(sd.valor),2, 'de_DE') AS valor,
                2,
                'de_DE') AS valor
            FROM
                solicitacao_despesa AS sd
            INNER JOIN solicitacao AS s
            ON
                sd.id_solicitacao = s.id_solicitacao
            INNER JOIN usuario AS u
            ON
                u.id_usuario = s.id_usuario
            INNER JOIN despesa AS d
            ON
                sd.id_despesa = d.id_despesa
            WHERE
                s.data BETWEEN ? AND ? AND u.id_usuario = ?
            ORDER BY
                s.data
            DESC",
                $parameter
            );

            return $result;
        }
    }
}
