<?php

namespace Contabiliza\Model;


use Contabiliza\Core\Model;


class Solicitacao extends Model 
{

    public function insert(array $param)
    {
        $parameters = array("1"=>$param['descricao'], "2"=>$param['data'], "3"=>$param['id_usuario'],"4"=>4);
        $this->query("INSERT INTO solicitacao (descricao, data, id_usuario, id_status) VALUES (?, ?, ?, ?)",$parameters);
    }

    public function getOpen()
    {
        return $this->select("SELECT u.nome, s.id_solicitacao, s.descricao, DATE_FORMAT(data,'%d/%m/%Y') as 'data', s.valor_total, s.idcentro_custo, s.id_status FROM solicitacao AS s 
        INNER JOIN usuario AS u ON s.id_usuario = u.id_usuario WHERE s.id_status = 4 LIMIT 1");
    }

    public function insertDespesa(array $param)
    {
        $parameters = array("1"=>$param['id_solicitacao'], "2"=>$param['id_despesa'], "3"=>$param['id_regiao'], "4"=>$param['qtd_despesa'], "5"=>$param['valor']);
        $this->query("INSERT INTO solicitacao_despesa (id_solicitacao, id_despesa, id_regiao, qtd_despesa, valor) VALUES (?, ?, ?, ?, ?)",$parameters);
    }

    public function getDespesasViagem($param)
    {
        $parameter = array("1"=>$param);
        return $this->select("SELECT s.id_solicitacao, s.id_despesa, s.id_regiao, s.qtd_despesa, s.valor, d.descricao, r.descricao AS regiao FROM solicitacao_despesa AS s INNER JOIN despesa as d ON s.id_despesa = d.id_despesa INNER JOIN regiao AS r ON s.id_regiao = r.id_regiao WHERE id_solicitacao = 1", $parameter);
    }
}