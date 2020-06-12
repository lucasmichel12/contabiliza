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
}