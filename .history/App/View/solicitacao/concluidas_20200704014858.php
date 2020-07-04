<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><strong>Solicitações Concluidas</strong></li>
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
                <tr>
                    <td>Larissa Carvalho de Morais</td>
                    <td>Maringá - Congresso Nacional de Comunicação</td>
                    <td class="text-center">15/08/2020</td>
                    <th class="text-center">
                        <a class="btn btn-info" href="#">Visualizar</a>
                    </th>
                </tr>
        </tbody>
        <!-- <tbody>
            <?php foreach ($solicitacoes as $solicitacao) { ?>
                <tr>
                    <td><?= $solicitacao['nome'] ?></td>
                    <td><?= $solicitacao['descricao'] ?></td>
                    <td class="text-center"><?= $solicitacao['data'] ?></td>
                    <th class="text-center">
                        <a class="btn btn-info" href="<?= URL; ?>Solicitacao/vizualizar/<?= $solicitacao['id_solicitacao']; ?>">Visualizar</a>
                    </th>
                </tr>
            <?php } ?>
        </tbody> -->
    </table>
</div>