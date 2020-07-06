<div class="content">

    <!-- Solicitações Pendentes -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Solicitações Concluídas </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th scope="col">Usuário</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Data</th>
                                        <th class="text-center" scope="col">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($solicitacoes as $solicitacao) { ?>
                                        <tr>
                                            <td><?= $solicitacao['nome'] ?></td>
                                            <td><?= $solicitacao['descricao'] ?></td>
                                            <td class="text-center"><?= $solicitacao['data'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-info" href="<?= URL; ?>Solicitacao/vizualizar/<?= $solicitacao['id_solicitacao']; ?>">Visualizar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /Solicitações Pendentes -->
</div>