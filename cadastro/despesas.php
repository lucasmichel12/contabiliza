
<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="cadastro/despesas">Despesa</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="persiste/despesa" method="POST" name="despesa">
            <input type="hidden" name="id" value="0">
        <div class="form-row">
            <div class="col-8">
            <input type="text" class="form-control" placeholder="Descrição da despesa" name="descricao">
            </div>
            <div class="col-4">
            <input type="number" class="form-control" placeholder="Valor" name="valor">
            </div>
        </div> 
        <div class="form-row">
            <div class="col-6 mt-3">
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="ativo">Despesa ativa?</label>
                        </div>
                        <select class="custom-select" id="ativo" name="ativo">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <button type="button" class="btn btn-info">Listar Despesas</button>
            </div>
            <div class="col-6 mt-2">
                <button type="submit"  class="btn btn-success float-right ml-3">Enviar</button>
                <button type="button" onclick="reset()"class="btn btn-danger float-right">Apagar Formulário</button>
            </div>
        </div>
    </form>

</div>
