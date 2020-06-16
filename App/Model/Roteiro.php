<?php

namespace Contabiliza\Model;

use Contabiliza\Core\Model;

class Roteiro extends Model
{

    public function getRoteirosViagem(Int $id_viagem)
    {
        $parameter = array("1"=>$id_viagem);
        return $this->select("SELECT * FROM roteiro WHERE id_solicitacao = ? ORDER BY inicio", $parameter);
    }
}