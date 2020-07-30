<?php

namespace Contabiliza\Helpers;

use Contabiliza\Core\Model;

class Validacao extends Model
{
	public $Message;

	public function __construct()
	{
		$this->Message = new Message();
		parent::__construct();
	}


	public function cpf($cpf, $id_usuario = 0)
	{

		// Extrai somente os números
		$cpf = preg_replace('/[^0-9]/is', '', $cpf);

		// Verifica se foi informado todos os digitos corretamente
		if (strlen($cpf) != 11) {
			return $this->Message->error("O CPF precisa ter ao menos 11 números");
		}
		// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
		if (preg_match('/(\d)\1{10}/', $cpf)) {
			return $this->Message->error("CPF inválido");
		}
		// Faz o calculo para validar o CPF
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{
					$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{
				$c} != $d) {
				return $this->Message->error("CPF inválido");
			}
		}

		if ($id_usuario != 0) {
			$parameter = array("1" => $cpf);
			$result = $this->select("SELECT id_usuario FROM usuario WHERE cpf = ? LIMIT 1", $parameter);
			if ($id_usuario != $result[0]['id_usuario'] && isset($result[0]['id_usuario'])) {
				$this->Message->error("O CPF já está vinculado a outro usuário");
			}
		} else {
			$parameter = array("1" => $cpf);
			$result = $this->select("SELECT id_usuario FROM usuario WHERE cpf = ? LIMIT 1", $parameter);
			if (count($result) == 1) {
				$this->Message->error("O CPF já está cadastrado na base de dados");
			}
		}
	}

	public function user($usuario, $id_usuario = 0)
	{
		if ($id_usuario != 0) {
			$parameter = array("1" => $usuario);
			$result = $this->select("SELECT id_usuario FROM usuario WHERE login = ? LIMIT 1", $parameter);
			if ($id_usuario != $result[0]['id_usuario'] && isset($result[0]['id_usuario'])) {
				$this->Message->error("O Usuário já está vinculado a outro usuário");
			}
		} else {
			$parameter = array("1" => $usuario);
			$result = $this->select("SELECT id_usuario FROM usuario WHERE login = ? LIMIT 1", $parameter);
			if (count($result) == 1) {
				$this->Message->error("O Usuário já está cadastrado na base de dados");
			}
		}
	}

	public function login(array $dados)
	{
		$parameter = array("1"=>$dados['login']);
		$result =  $this->select('SELECT * FROM usuario WHERE login = ? LIMIT 1', $parameter);
		if (isset($result[0]['login']) && $result[0]['ativo'] != '0') {
			if (password_verify($dados['senha'], $result[0]['senha'])) {
				return $result;
			} else {
				$this->Message->error("Senha inválida");
			}
		} else {
			$this->Message->error("O login informado não existe ou está desativado");
		}
	}

	public function senhas($senha, $senhaConfere)
	{
		if ($senha != $senhaConfere) {
			$this->Message->error("As senhas digitadas não conferem");
		}
	}
	public function cnpj($cnpj)
	{
		$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
		// Valida tamanho
		if (strlen($cnpj) != 14)
			return $this->errorMessage->error("CNPJ precisa ter ao menos 14 números");
		// Valida primeiro dígito verificador
		for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
			$soma += $cnpj{
				$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;
		if ($cnpj{
			12} != ($resto < 2 ? 0 : 11 - $resto))
			$this->errorMessage->error("CNPJ inválido");
		// Valida segundo dígito verificador
		for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
			$soma += $cnpj{
				$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;
		$cnpj{
			13} == ($resto < 2 ? 0 : 11 - $resto);
		return true;
	}

	public function notEmpty($dados)
	{
		foreach ($dados as $dado) {
			$validador = trim($dado);
			if ($validador == "") {
				$this->Message->error("O formulário não pode conter campos vazios!");
			}
		}
	}
}
