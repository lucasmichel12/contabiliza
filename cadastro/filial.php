<?php


?>

<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="cadastro/filial">Filial</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="persiste/filial" method="POST" name="filial">
            <input type="hidden" name="id" value="0">
            <input type="hidden" name="idCidade" value="0">
        <div class="form-row">
            <div class="col-8">
            <input type="text" class="form-control" placeholder="Nome da Filial" name="nome">
            </div>
            <div class="col-4">
            <input type="text" class="form-control" placeholder="CNPJ" name="cnpj">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-8">
            <input type="email" class="form-control" placeholder="E-mail" name="email">
            </div>
            <div class="col-4">
            <input type="text" class="form-control" placeholder="Telefone" name="telefone">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-2">
                <input type="text" class="form-control" placeholder="CEP" name="cep">
            </div>
            <div class="col-2">
                <input type="password" class="form-control" placeholder="Número" name="numero">
            </div>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="Logradouro" name="logradouro">
            </div>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="Bairro" name="bairro">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-6">
                <input type="password" class="form-control" placeholder="Complemento" name="complemento">
            </div>
            <div class="col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="status">Filial Ativa?</label>
                </div>
                <select class="custom-select" id="status" name="status">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
                </div>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col-6">
                <button type="button" class="btn btn-info">Listar Colaboradores</button>
            </div>
            <div class="col-6">
                <button type="submit"  class="btn btn-success float-right ml-3">Enviar</button>
                <button type="button" onclick="reset()"class="btn btn-danger float-right">Apagar Formulário</button>
            </div>
        </div>    
    </form>
</div>

