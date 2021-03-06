<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><strong>Usuários cadastrados</strong></li>
        </ol>
    </nav>
    <table id="example" class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th class="text-center" scope="col">Login</th>
                <th class="text-center" scope="col">CPF</th>
                <th class="text-center" scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['usuarios'] as $usuario) { ?>
                <tr>
                    <td><?= $usuario['nome'] ?></td>
                    <td class="text-center"><?= $usuario['login'] ?></td>
                    <td class="text-center cpf"><?= $usuario['cpf'] ?></td>
                    <th class="text-center">
                        <a class="btn btn-success" href="<?= URL; ?>Usuario/editar/<?= $usuario['id_usuario']; ?>">Editar</a>
                        <a class="btn btn-info" href="<?= URL; ?>Usuario/alterarSenha/<?= $usuario['id_usuario']; ?>">Alterar Senha</a>
                        <?php if (isset($data['btn'])) {
                            echo "<button class='btn btn-warning' onclick=desabilitar('" . URL . "Usuario/desabilitar/{$usuario['id_usuario']}')>Desabilitar</button>";
                        } ?>
                        <button class="btn btn-danger" onclick="excluir('<?= URL; ?>Usuario/deletar/<?= $usuario['id_usuario']; ?>')">Excluir</button>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-danger" href="<?= URL; ?>Usuario/listarInativos">Listar Inativos</a>
    <a class="btn btn-info" href="<?= URL; ?>Usuario/listar">Listar Ativos</a>
</div>