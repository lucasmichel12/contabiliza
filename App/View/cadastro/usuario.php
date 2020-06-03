<div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?=URL;?>Usuario">Colaborador</a></li>
        </ol>
        </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?=URL;?>Usuario/insert" method="POST">
            <input type="hidden" name="id">
        <div class="form-row">
            <div class="col-8">
            <input type="text" class="form-control" placeholder="Nome Completo" required name="nome">
            </div>
            <div class="col-4">
            <input type="text" class="form-control" placeholder="CPF" data-mask="999.999.999-99" required name="cpf">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="login" required name="login">
            </div>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="Senha" required name="senha">
            </div>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="Digite a senha novamente">
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
                <a href="<?=URL;?>Usuario/listar" class="btn btn-info">Listar Colaboradores</a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-success float-right ml-3">Enviar</button>
            </div>
        </div>    
    </form>
</div>
