<?php

namespace Contabiliza\Model;


use Contabiliza\Core\Model;


class Solicitacao extends Model
{

    public function insert(array $param)
    {
        $jaExiste = $this->select("SELECT id_solicitacao FROM solicitacao WHERE id_status = 1 AND id_usuario = ?", array("1" => $param['id_usuario']));
        if (!$jaExiste) {
            $parameters = array("1" => $param['descricao'], "2" => $param['id_usuario'], "3"=> $param['idcentro_custo'], "4" => 1);
            $this->query("INSERT INTO solicitacao (descricao, id_usuario, idcentro_custo, id_status) VALUES (?, ?, ? ,?)", $parameters);
            return true;
        } else {
            return false;
        }
    }

    public function getById($id)
    {
        return $this->select("SELECT u.nome, s.id_solicitacao, s.descricao, DATE_FORMAT(data,'%d/%m/%Y') as 'data', s.valor_total, s.idcentro_custo, s.id_status FROM solicitacao AS s 
        INNER JOIN usuario AS u ON s.id_usuario = u.id_usuario WHERE s.id_solicitacao = ? LIMIT 1", array("1"=>$id));
    }
    public function getOpen()
    {
        return $this->select("SELECT u.nome, s.id_solicitacao, s.descricao, DATE_FORMAT(data,'%d/%m/%Y') as 'data', s.valor_total, s.idcentro_custo, s.id_status FROM solicitacao AS s 
        INNER JOIN usuario AS u ON s.id_usuario = u.id_usuario WHERE s.id_status = 1 LIMIT 1");
    }

    public function insertDespesa(array $param)
    {


        $despesa = $this->select("SELECT valor_definido, valor FROM despesa WHERE id_despesa = ? LIMIT 1", array("1" => $param['id_despesa']));

        if ($despesa[0]['valor_definido']) {
            $percentual_regiao = $this->select("SELECT percentual FROM regiao WHERE id_regiao = ?", array("1" => $param['id_regiao']));
            $qtd = intval($param['qtd_despesa']);
            $valor = floatval($despesa[0]['valor']);
            $result = $qtd * $valor;
            $percentual = $percentual_regiao[0]['percentual'] / 100;
            $result = $result + ($percentual * $result);
            $parameters = array("1" => $param['id_solicitacao'], "2" => $param['id_despesa'], "3" => $param['id_regiao'], "4" => $param['qtd_despesa'], "5" => $result);
            $this->query("INSERT INTO solicitacao_despesa (id_solicitacao, id_despesa, id_regiao, qtd_despesa, valor) VALUES (?, ?, ?, ?, ?)", $parameters);
        } else {

            $qtd = intval($param['qtd_despesa']);
            $valor = floatval($param['valor']);
            $valor_final = $qtd * $valor;
            $parameters = array("1" => $param['id_solicitacao'], "2" => $param['id_despesa'], "3" => $param['id_regiao'], "4" => $param['qtd_despesa'], "5" => $valor_final);
            $this->query("INSERT INTO solicitacao_despesa (id_solicitacao, id_despesa, id_regiao, qtd_despesa, valor) VALUES (?, ?, ?, ?, ?)", $parameters);
        }

        $this->updateValor($param['id_solicitacao']);
    }

    public function deleteDespesa($id)
    {
        $parameter = array("1" => $id);
        $this->query("DELETE FROM solicitacao_despesa WHERE id_solicitacao_despesa = ? LIMIT 1", $parameter);
    }

    public function getDespesasSolicitacao($param)
    {
        $parameter = array("1" => $param);
        return $this->select("SELECT s.id_solicitacao_despesa, s.id_solicitacao, s.id_despesa, s.id_regiao, s.qtd_despesa, s.valor, d.descricao, r.descricao AS regiao FROM solicitacao_despesa AS s INNER JOIN despesa as d ON s.id_despesa = d.id_despesa INNER JOIN regiao AS r ON s.id_regiao = r.id_regiao WHERE id_solicitacao = ?", $parameter);
    }

    public function getValorDespesa($param)
    {
        $parameter = array("1" => $param);
        return $this->select("SELECT valor FROM solicitacao_despesa WHERE id_solicitacao = ?", $parameter);
    }

    public function getRateioSolicitacao($param)
    {
        $parameter = array("1" => $param);
        return $this->select("SELECT s.id_solicitacao, s.idcentro_custo, c.descricao FROM solicitacao AS s INNER JOIN centro_custo AS c ON s.idcentro_custo = c.idcentro_custo WHERE id_solicitacao = ?", $parameter);
    }

    public function updateRateio(array $param)
    {
        $parameter = array("1" => $param['idcentro_custo'], "2" => $param['id_solicitacao']);
        $this->query("UPDATE solicitacao SET idcentro_custo = ? WHERE id_solicitacao = ? LIMIT 1", $parameter);
    }

    public function updateValor($id)
    {
        //Puxa todos os valores das despesas cadastradas buscando pelo ID da solicitação e soma todos
        $valores = $this->getValorDespesa($id);
        $totValor = 0;
        for ($i = 0; $i < count($valores); $i++) {
            $totValor += $valores[$i]['valor'];
        }
        $parameter = array("1" => $totValor, "2" => $id);
        $this->query("UPDATE solicitacao SET valor_total = ? WHERE id_solicitacao = ? LIMIT 1", $parameter);
    }

    public function closeSolicitation($id_solicitacao)
    {
        $parameters = array("1" => $id_solicitacao);
        $this->query("UPDATE solicitacao SET id_status = 2 WHERE id_solicitacao = ? LIMIT 1", $parameters);
    }

    public function listSolicitacoesConcluidas()
    {
        return $this->select("SELECT s.id_solicitacao, s.descricao, s.valor_total, s.id_usuario, s.idcentro_custo, u.nome, c.descricao AS centroCusto, DATE_FORMAT(data,'%d/%m/%Y') as 'data' FROM solicitacao AS s 
        INNER JOIN usuario AS u ON s.id_usuario = u.id_usuario 
        INNER JOIN centro_custo AS c ON s.idcentro_custo = c.idcentro_custo 
        WHERE id_status = 3 ORDER BY data");
    }

    public function listSolicitacoesPendentes()
    {
        return $this->select("SELECT s.id_solicitacao, s.descricao, s.valor_total, s.id_usuario, s.idcentro_custo, u.nome, c.descricao AS centroCusto, DATE_FORMAT(data,'%d/%m/%Y') as 'data' FROM solicitacao AS s 
        INNER JOIN usuario AS u ON s.id_usuario = u.id_usuario 
        INNER JOIN centro_custo AS c ON s.idcentro_custo = c.idcentro_custo 
        WHERE id_status = 2 ORDER BY data");
    }

    public function listSolicitacoesAbertas()
    {
        return $this->select("SELECT s.id_solicitacao, s.descricao, s.valor_total, s.id_usuario, s.idcentro_custo, u.nome, c.descricao AS centroCusto, DATE_FORMAT(data,'%d/%m/%Y') as 'data' FROM solicitacao AS s 
        INNER JOIN usuario AS u ON s.id_usuario = u.id_usuario 
        INNER JOIN centro_custo AS c ON s.idcentro_custo = c.idcentro_custo 
        WHERE id_status = 1 ORDER BY data");
    }
}
