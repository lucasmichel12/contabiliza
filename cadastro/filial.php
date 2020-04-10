<?php

require_once("Model/Filial.php");
$filial = new Filial();

if(isset($url[2]))
$filial->selectOne($url[2]);

?>

<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="cadastro/filial">Filial</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="persiste/filial" method="POST" name="filial">
            <input type="hidden" name="id" value="<?=$filial->getId();?>">
            <input type="hidden" name="idCidade" id="idCidade" value="<?=$filial->getIdCidade();?>">
        <div class="form-row">
            <div class="col-8">
            <input type="text" class="form-control" placeholder="Nome da Filial" required name="nome" value="<?=$filial->getNome();?>">
            </div>
            <div class="col-4">
            <input type="text" class="form-control" placeholder="CNPJ"required data-mask="00.000.000/0000-00" name="cnpj" value="<?=$filial->getCnpj();?>">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-8">
            <input type="email" class="form-control" placeholder="E-mail" required name="email" value="<?=$filial->getEmail();?>">
            </div>
            <div class="col-4">
            <input type="text" class="form-control" placeholder="Telefone" required data-mask="(00)0000-0000" name="telefone" value="<?=$filial->getTelefone();?>">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-2">
                <input type="text" class="form-control" placeholder="CEP" required data-mask="00.000-000" name="cep"  id="cep" value="<?=$filial->getCep();?>">
            </div>
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Número" required name="numero" value="<?=$filial->getNumero();?>">
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Logradouro" required name="logradouro" id="logradouro" value="<?=$filial->getLogradouro();?>">
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Bairro" required name="bairro" id="bairro" value="<?=$filial->getBairro();?>">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-6">
                <input type="text" class="form-control" readonly placeholder="Cidade" name="cidade" id="cidade" value="<?=$filial->cidade;?>">
            </div>
            <div class="col-6">
                <input type="text" class="form-control" readonly placeholder="Estado" name="estado" id="estado" value="<?=$filial->estado;?>">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Complemento"  name="complemento" value="<?=$filial->getComplemento();?>">
            </div>
            <div class="col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="ativo">Filial Ativa?</label>
                </div>
                <select class="custom-select" id="ativo" name="ativo">
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                </select>
                </div>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col-6">
                <a href="listagem/filial" class="btn btn-info">Listar Filiais</a>
            </div>
            <div class="col-6">
                <button type="submit"  class="btn btn-success float-right ml-3">Enviar</button>
            </div>
        </div>    
    </form>
</div>
<script src="public/assets/jquery/jquery.min.js"></script>
<script src="public/assets/js/myFunctions.js"></script>