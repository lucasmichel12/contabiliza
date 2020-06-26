<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><strong>Solicitações Pendentes de aprovação</strong></li>
        </ol>
    </nav>
    <table class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <thead>
            <tr>
                <th scope="col">Usuário</th>
                <th scope="col">Descrição</th>
                <th class="text-center" scope="col">Data</th>
                <th class="text-center" scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solicitacoes as $solicitacao) { ?>
                <tr>
                    <td><?= $solicitacao['id_usuario'] ?></td>
                    <td><?= $solicitacao['descricao'] ?></td>
                    <td class="text-center"><?= $solicitacao['data'] ?></td>
                    <th class="text-center">
                        <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/auditar/<?= $solicitacao['id_solicitacao']; ?>">Auditar</a>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>