<?php
    require_once("Model/Despesa.php");
    $despesa = new Despesa();
    $required = "required";

    if(isset($url[2]))
    {
        $despesa->selectOne($url[2]);
        $required = "";
    }
?>
<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="cadastro/despesas">Despesa</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="persiste/despesa" method="POST" name="despesa">
            <input type="hidden" name="id" value="<?=$despesa->getId();?>">
        <div class="form-row">
            <div class="col-8">
            <input type="text" class="form-control" required placeholder="Descrição da despesa" name="descricao" value="<?=$despesa->getDescricao();?>">
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="valor">R$</label>
                    </div>
                <input type="text" class="form-control" placeholder="Valor" id="valor" name="valor" value="<?=$despesa->getValor();?>">
                </div>
            </div>
        </div> 
        <div class="form-row">
            <div class="col-6 mt-3">
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="ativo">Despesa ativa?</label>
                        </div>
                        <select class="custom-select" id="ativo" name="ativo">
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <a href="listagem/despesa" class="btn btn-info">Listar Despesas</a>
            </div>
            <div class="col-6 mt-2">
                <button type="submit"  class="btn btn-success float-right ml-3">Enviar</button>
            </div>
        </div>
    </form>

</div>

<script src="public/assets/jquery/jquery.min.js"></script>
<script src="public/assets/jquery/jqueryMaskMoney.min.js"></script>
<script>
    $(document).ready(function()
{
     $("#valor").maskMoney({
         decimal: ",",
         thousands: "."
     });
});
</script>