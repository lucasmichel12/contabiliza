<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Região</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?=URL;?>Regiao/inserir" method="POST">
        <div class="form-row">
            <div class="col-lg-6 col-md-6 col-sm-12 pad-bottom-10">
                <input type="text" class="form-control" required placeholder="Região" name="descricao">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 pad-bottom-10">
                <input type="text" class="form-control" placeholder="Percentual de acrescimo" name="percentual">
            </div>
        </div> 
        <div class="form-row">
            <div class="col-lg-6 col-md-6 col-sm-12 pad-bottom-10">
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="ativo">Região ativa?</label>
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
                <a href="<?=URL;?>Regiao/listar" class="btn btn-info">Listar Regiões</a>
            </div>
            <div class="col-6">
                <button type="submit"  class="btn btn-success float-right ml-3">Enviar</button>
            </div>
        </div>
    </form>

</div>