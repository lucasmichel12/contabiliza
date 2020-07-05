<div class="content"> 

    <!-- Solicitações Pendentes -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Solicitações pendentes </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table ">
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
                                            <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/auditoria/<?= $solicitacao['id_solicitacao']; ?>">Auditar</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Lucas Michel</td>
                                        <td>São Paulo - Conferência Internacional Sicoob</td>
                                        <td class="text-center">15/08/2020</td>
                                        <th class="text-center">
                                            <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/auditoria/<?= $solicitacao['id_solicitacao']; ?>">Auditar</a>
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
                                            <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/auditoria/<?= $solicitacao['id_solicitacao']; ?>">Auditar</a>
                                        </th>
                                    </tr>
                                <?php } ?>
                                </tbody> -->
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /Solicitações Pendentes -->


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 font-13">
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
                            <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/auditoria/<?= $solicitacao['id_solicitacao']; ?>">Auditar</a>
                        </th>
                    </tr>
                    <tr>
                        <td>Lucas Michel</td>
                        <td>São Paulo - Conferência Internacional Sicoob</td>
                        <td class="text-center">15/08/2020</td>
                        <th class="text-center">
                            <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/auditoria/<?= $solicitacao['id_solicitacao']; ?>">Auditar</a>
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
                                <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/auditoria/<?= $solicitacao['id_solicitacao']; ?>">Auditar</a>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody> -->
            </table>
        </div>
    </div>
</div>