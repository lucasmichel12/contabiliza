<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Alteração</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="CentroCusto/">Centro de Custo</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?=URL;?>CentroCusto/inserir" method="POST">
            <input type="hidden" name="idcentro_custo" value="<?=$data['centroCusto'][0]['idcentro_custo'];?>">
        <div class="form-row">
            <div class="col-8">
                <input type="text" class="form-control" required placeholder="Nome Empresarial ou Fantasia" name="descricao" value="<?=$data['centroCusto'][0]['descricao'];?>">
            </div>
            <div class="col-4">
                <input type="text" class="form-control cnpj" placeholder="00.000.000/0000-00" name="cnpj" value="<?=$data['centroCusto'][0]['cnpj'];?>">
            </div>
        </div> 
        <div class="form-row">
            <div class="col-6 mt-3">
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="ativo">Centro de custo ativo?</label>
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
                <a href="<?=URL;?>CentroCusto/listar" class="btn btn-info">Listar Centros de custo</a>
            </div>
            <div class="col-6 mt-2">
                <button type="submit"  class="btn btn-success float-right ml-3">Enviar</button>
            </div>
        </div>
    </form>
</div>