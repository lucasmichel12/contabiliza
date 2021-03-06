<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?=URL;?>Usuario/">Colaborador</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?=URL;?>Usuario/inserir" method="POST">
            <input type="hidden" name="id_usuario" value="<?=$data['usuario'][0]['id_usuario'];?>">
        <div class="form-row">
            <div class="col-8">
            <input type="text" class="form-control" placeholder="Nome Completo" required name="nome" value="<?=$data['usuario'][0]['nome'];?>">
            </div>
            <div class="col-4">
            <input type="text" class="form-control" placeholder="CPF" data-mask="999.999.999-99" required name="cpf" value="<?=$data['usuario'][0]['cpf'];?>">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="login" required name="login" value="<?=$data['usuario'][0]['login'];?>">
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
                <a href="<?=URL;?>Usuario/listar" class="btn btn-info">Listar Colaboradores</a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-success float-right ml-3">Enviar</button>
            </div>
        </div>    
    </form>
</div>
