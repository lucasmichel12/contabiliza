<?php



?>

<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="cadastro/colaborador">Colaborador</a></li>
        </ol>
        </nav>
    <form class="mt-4" action="persiste/colaborador" method="POST" name="colaborador">
        <input type="hidden" name="id" value="0">
    <div class="form-row">
        <div class="col">
        <input type="text" class="form-control" placeholder="Nome Completo" name="nome">
        </div>
        <div class="col">
        <input type="text" class="form-control" placeholder="CPF" name="cpf">
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col-8">
        <input type="email" class="form-control" placeholder="E-mail" name="email">
        </div>
        <div class="col-4">
        <input type="text" class="form-control" placeholder="Celular" name="celular">
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col-4">
            <input type="text" class="form-control" placeholder="login" name="login">
        </div>
        <div class="col-4">
            <input type="password" class="form-control" placeholder="Senha" name="senha">
        </div>
        <div class="col-4">
            <input type="password" class="form-control" placeholder="Digite a senha novamente" name="check">
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="admin">Usúario Administrador?</label>
            </div>
            <select class="custom-select" id="admin" name="admin">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            </div>
        </div>
        <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="ativo">Usúario Ativo?</label>
            </div>
            <select class="custom-select" id="ativo" name="ativo">
                <option value="1">Sim</option>
                <option value="0">Não</option>
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



<script>

function reset()
{
   document.getElementById("myForm").reset()
}
</script>