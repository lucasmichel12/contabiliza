<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?= URL; ?>Usuario/listar">Colaborador</a></li>
        </ol>
    </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?= URL; ?>Usuario/trocaSenha" method="POST">
        <input type="hidden" name="id_usuario" value="<?= $usuario[0]['id_usuario']; ?>">
        <div class="form-row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="<?= $usuario[0]['login']; ?>" readonly>
            </div>
            <div class="col-8">
                <input type="text" class="form-control" placeholder="<?= $usuario[0]['nome']; ?>" readonly>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-4">
                <input type="password" class="form-control" placeholder="Nova senha" required name="senha">
            </div>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="Digite a senha novamente" name="senhaConfere">
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col-6">
                <a href="<?= URL; ?>Usuario/listar" class="btn btn-info">Listar Colaboradores</a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-success float-right ml-3">Enviar</button>
            </div>
        </div>
    </form>
</div>