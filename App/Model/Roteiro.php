<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;

class Roteiro extends Model
{

    public function insert(Array $param)
    {
        $parameters = array("1"=>$param['destino'], "2"=>$param['descricao'], "3"=>$param['inicio'], "4"=>$param['termino'], "5"=>intval($param['id_solicitacao']));
        $this->query("INSERT INTO roteiro (destino, descricao, inicio, termino, id_solicitacao) VALUES (?, ?, ?, ?, ?)", $parameters);
    }

    public function delete(Int $id)
    {
        $parameter = array("1"=>$id);
        $this->query("DELETE FROM roteiro WHERE id_roteiro = ? LIMIT 1", $parameter);
    }

    public function getRoteirosViagem(Int $id_viagem)
    {
        $parameter = array("1"=>$id_viagem);
        return $this->select("SELECT * FROM roteiro WHERE id_solicitacao = ? ORDER BY inicio", $parameter);
    }
}