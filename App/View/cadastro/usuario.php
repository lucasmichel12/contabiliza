<div class="content full-height">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?=URL;?>Usuario">Usuário</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?=URL;?>Usuario/inserir" method="POST">
        <div class="form-row">
            <div class="col-lg-8 col-md-8 col-sm-12 pad-bottom-10">
            <input type="text" class="form-control" placeholder="Nome Completo" required name="nome">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 pad-bottom-10">
            <input type="text" class="form-control cpf" placeholder="CPF" required name="cpf">
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-4 col-md-4 col-sm-12 pad-bottom-10">
                <input type="text" class="form-control" placeholder="login" required name="login">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 pad-bottom-10">
                <input type="password" class="form-control" placeholder="Senha" required name="senha">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 pad-bottom-10">
                <input type="password" class="form-control" placeholder="Digite a senha novamente" required name="senhaConfere">
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-6 col-md-6 col-sm-12 pad-bottom-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="admin">Usúario Administrador?</label>
                </div>
                <select class="custom-select" id="admin" name="admin">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 pad-bottom-10">
                <div class="input-group">
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
        <div class="form-row">
            <div class="col-6">
                <a href="<?=URL;?>Usuario/listar" class="btn btn-info-2">Listar Colaboradores</a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-sucesso float-right ml-3">Enviar</button>
            </div>
        </div>    
    </form>
</div>
