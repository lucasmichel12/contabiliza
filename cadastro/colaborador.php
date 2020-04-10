<?php
    require_once("config/MySqlPDO.php");
    require_once("Model/Colaborador.php");
    $colaborador = new Colaborador();
    $required = "required";

    if(isset($url[2]))
    {
        $colaborador->selectOne($url[2]);
        $required = "";
    }
?>

<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="cadastro/colaborador">Colaborador</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="persiste/colaborador" method="POST" name="colaborador">
            <input type="hidden" name="id" value="<?=$colaborador->getId();?>">
        <div class="form-row">
            <div class="col-8">
            <input type="text" class="form-control" placeholder="Nome Completo" required name="nome" value="<?=$colaborador->getNome();?>">
            </div>
            <div class="col-4">
            <input type="text" class="form-control" placeholder="CPF" data-mask="999.999.999-99" required name="cpf" value="<?=$colaborador->getCpf();?>">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-8">
            <input type="email" class="form-control" placeholder="E-mail"  required name="email" value="<?=$colaborador->getEmail();?>">
            </div>
            <div class="col-4">
            <input type="text" class="form-control" placeholder="Celular" required data-mask="(99)99999-9999" name="celular" value="<?=$colaborador->getCelular();?>">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="login" required name="login" value="<?=$colaborador->getLogin();?>">
            </div>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="Senha" <?=$required;?> id="senha" name="senha">
            </div>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="Digite a senha novamente" <?=$required;?> onblur="validaSenha()" id="check" name="check">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="admin">Usúario Administrador?</label>
                </div>
                <select class="custom-select" id="admin" name="admin">
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                </select>
                </div>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="ativo">Usúario Ativo?</label>
                    </div>
                    <select class="custom-select" id="ativo" name="ativo">
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col-6">
                <a href="listagem/colaborador" class="btn btn-info">Listar Colaboradores</a>
            </div>
            <div class="col-6">
                <button type="submit" onclick="validaSenha()" class="btn btn-success float-right ml-3">Enviar</button>
            </div>
        </div>    
    </form>
</div>



<script>

function validaSenha() {
   let senha = document.getElementById('senha')
   let check = document.getElementById('check') 

    if(senha.value() != check.value()){
      alert("As senhas não conferem!")  
    }
  }

</script>