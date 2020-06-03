<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Alteração</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Região</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?=URL;?>Regiao/insert" method="POST">
            <input type="hidden" name="id_regiao" value="<?=$regiao['0']['id_regiao'];?>">
        <div class="form-row">
            <div class="col-8">
                <input type="text" class="form-control" required placeholder="Região Ex: São Paulo, Exterior..." name="descricao" value="<?=$regiao['0']['descricao'];?>">
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Percentual de acrescimo" name="percentual" value="<?=$regiao['0']['percentual'];?>">
            </div>
        </div> 
        <div class="form-row">
            <div class="col-6 mt-3">
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="ativo">Região ativa?</label>
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
                <a href="<?=URL;?>Regiao/listar" class="btn btn-info">Listar Região</a>
            </div>
            <div class="col-6 mt-2">
                <button type="submit"  class="btn btn-success float-right ml-3">Enviar</button>
            </div>
        </div>
    </form>
</div>