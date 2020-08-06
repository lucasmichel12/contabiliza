<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Inicio Dados geral  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-check"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?=$data['concluidas'];?></span></div>
                                    <div class="stat-heading">Solicitações Concluídas</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-note2"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?=$data['abertas'];?></span></div>
                                    <div class="stat-heading">Solicitações em Aberto</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-clock"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?=$data['pendentes'];?></span></div>
                                    <div class="stat-heading">Solicitações Pendentes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?=$data['usuarios'];?></span></div>
                                    <div class="stat-heading">Funcionários Ativos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim de Dados geral -->

        <div class="clearfix"></div>

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
                                            <th>Data</th>
                                            <th>Usuario</th>
                                            <th>Rateio</th>
                                            <th>Valor</th>
                                            <th class="text-center">Opções</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody>
                                            <tr>
                                                <td>15/08/2020</td>
                                                <td>Larissa Carvalho</td>
                                                <td>Sicoob</td>
                                                <td>R$380,00</td>
                                                <td>
                                                    <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/auditar/<?= $solicitacao['id_solicitacao']; ?>">Auditar</a>
                                                </td>
                                            </tr>
                                    </tbody> -->
                                    <tbody>
                                        <?php foreach ($data['solicitacoes'] as $item) { ?>
                                            <tr>
                                                <td><?= $item['data'] ?></td>
                                                <td><?= $item['nome'] ?></td>
                                                <td><?= $item['centroCusto'] ?></td>
                                                <td>R$ <?= $item['valor_total'] ?></td>
                                                <td>
                                                    <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/auditoria/<?= $item['id_solicitacao']; ?>">Auditar</a>
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

