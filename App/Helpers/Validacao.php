<?php

namespace Contabiliza\Helpers;

use Contabiliza\Core\Model;

class Validacao extends Model
{
    public $errorMessage;

    public function __construct()
    {
        $this->errorMessage = new Message();
    }
    public function cpf($cpf)
    {
        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        // $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            $this->errorMessage->sucessMessage("O CPF deve conter 11 Digítos");
 
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if (
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
        ) {

            return $this->errorMessage = "O CPF digitado é inválido";
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{
                        $c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{
                    $c} != $d) {
                    return $this->errorMessage = "O CPF digitado é inválido";
                }

                $parameter = array("1" => $cpf);
                $result = $this->select("SELECT * FROM usuario WHERE cpf = ?", $parameter);
                if (count($result) > 1) {
                    return $this->errorMessage = "O CPF digitado já está cadastrado na base";
                }
            }
        }
    }
}
