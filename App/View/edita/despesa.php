<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="Despesa/">Despesa</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?=URL;?>Despesa/inserir" method="POST">
    <input type="hidden" name="id_despesa" value="<?=$despesa[0]['id_despesa']; ?>">
        <div class="form-row">
            <div class="col-8">
                <input type="text" class="form-control" required placeholder="Almoço, Janta, KM entre cidades" name="descricao" value="<?=$despesa[0]['descricao'];?>">
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="valor" name="valor" value="<?=$despesa[0]['valor'];?>">
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
            <div class="col-6 mt-3">
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="valor_definido">Valor Fixo?</label>
                        </div>
                        <select class="custom-select" id="valor_definido" name="valor_definido">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <a href="<?=URL;?>Despesa/listar" class="btn btn-info">Listar Despesas</a>
            </div>
            <div class="col-6 mt-2">
                <button type="submit"  class="btn btn-success float-right ml-3">Cadastrar</button>
            </div>
        </div>
    </form>

</div>