<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Despesa</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?=URL;?>Despesa/inserir" method="POST">
        <div class="form-row">
            <div class="col-lg-6 col-md-6 col-sm-12 pad-bottom-10">
                <input type="text" class="form-control" required placeholder="Almoço, Janta, KM" name="descricao">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 pad-bottom-10">
                <input type="text" class="form-control" placeholder="Valor" name="valor">
            </div>
        </div> 
        <div class="form-row">
            <div class="col-lg-6 col-md-6 col-sm-12 pad-bottom-10">
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
            <div class="col-lg-6 col-md-6 col-sm-12 pad-bottom-10">
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" id="money" for="valor_definido">Valor Fixo?</label>
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
                <a href="<?=URL;?>Despesa/listar" class="btn btn-info-2">Listar Despesas</a>
            </div>
            <div class="col-6">
                <button type="submit"  class="btn btn-sucesso float-right ml-3">Cadastrar</button>
            </div>
        </div>
    </form>

</div>