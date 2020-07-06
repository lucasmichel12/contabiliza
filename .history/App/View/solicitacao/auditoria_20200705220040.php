<div class="content">
    <div class="card-header bg-white">
        <h4>
            <p class="topo-auditoria"><strong><?= $solicitacao[0]['descricao']; ?> | <?= $solicitacao[0]['data']; ?> | R$ <?= $solicitacao[0]['valor_total']; ?></strong></p>
        </h4>
    </div>

        <!-- Solicitações Pendentes -->
        <div class="orders mt-4">
        <div class="row">
            <div class="col-xl-12">
                <!-- Resumo -->
                <div class="card card-auditoria-bottom no-shaddow">
                    <div class="card-body">
                        <h4 class="box-title text-center">Resumo </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Colaborador</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Data</th>
                                        <th class="text-center" scope="col">Rateio</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                        <tr>
                                            <td><?= $solicitacao[0]['nome']; ?></td>
                                            <td><?= $solicitacao[0]['descricao']; ?></td>
                                            <td><?= $solicitacao[0]['data']; ?></td> 
                                            <td class="text-center">
                                                <?php if (isset($rateios) && $rateios != null) foreach ($rateios as $rateio) { ?>
                                                    <?= $rateio['descricao']; ?>
                                                <?php } ?>
                                            </td>
                                        </tr> 
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
                <!-- /Resumo -->
                
                <!-- Despesas -->
                <div class="card card-auditoria-top">
                    <div class="card-body">
                        <h4 class="box-title text-center">Despesas </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Colaborador</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Data</th>
                                        <th class="text-center" scope="col">Rateio</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                        <tr>
                                            <td><?= $solicitacao[0]['nome']; ?></td>
                                            <td><?= $solicitacao[0]['descricao']; ?></td>
                                            <td><?= $solicitacao[0]['data']; ?></td> 
                                            <td class="text-center">
                                                <?php if (isset($rateios) && $rateios != null) foreach ($rateios as $rateio) { ?>
                                                    <?= $rateio['descricao']; ?>
                                                <?php } ?>
                                            </td>
                                        </tr> 
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
                <!-- /Despesas -->

            </div> <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /Solicitações Pendentes -->

    <form action="#" class="mt-4 shadow p-3 mb-5 bg-white rounded">
        <div class="form-row mb-4 mt-4 border-dark border-bottom">
            <h5>Resumo</h5>
        </div>
        <div class="form-row">
            <div class="col-4">
                <p class="text-dark"><strong>Descrição</strong></p>
                <p class="text-dark"><?= $solicitacao[0]['descricao']; ?></p>
            </div>
            <div class="col-4">
                <p class="text-dark"><strong>Colaborador</strong></p>
                <p class="text-dark"><?= $solicitacao[0]['nome']; ?></p>
            </div>
            <div class="col-2">
                <p class="text-dark"><strong>Data</strong></p>
                <p class="text-dark"><?= $solicitacao[0]['data']; ?></p>
            </div>
            <div class="col-2">
                <p class="text-dark"><strong>Rateio</strong></p>
                <?php if (isset($rateios) && $rateios != null) foreach ($rateios as $rateio) { ?>
                    <p class="text-dark"><?= $rateio['descricao']; ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="form-row mb-4 mt-4 border-dark border-bottom">
            <h6>Despesas</h6>
        </div>
        <div class="form-row">
            <div class="col-6">
                <p class="text-dark"><strong>Descrição</strong></p>
                <?php if (isset($despesasViagem) && $despesasViagem != null)
                    foreach ($despesasViagem as $despesa) { ?>
                    <tr>
                        <p class="text-dark"><?= $despesa['descricao'] ?></p>
                    </tr>
                <?php } ?>
            </div>
            <div class="col-6">
                <p class="text-dark"><strong>Valor</strong></p>
                <?php if (isset($despesasViagem) && $despesasViagem != null)
                    foreach ($despesasViagem as $despesa) { ?>
                    <tr>
                        <p class="text-dark">R$ <?= $despesa['valor'] ?></p>
                    </tr>
                <?php } ?>
            </div>
        </div>
        <div class="form-row mb-4 mt-4 border-dark border-bottom">
            <h6>Roteiros</h6>
        </div>
        <div class="form-row">
            <div class="col-6">
                <p class="text-dark"><strong>Destino</strong></p>
                <?php if (isset($roteiros) && $roteiros != null)
                    foreach ($roteiros as $roteiro) { ?>
                    <tr>
                        <p class="text-dark"><?= $roteiro['destino'] ?></p>
                    </tr>
                <?php } ?>
            </div>
            <div class="col-6">

                <p class="text-dark"><strong>Descrição</strong></p>
                <?php if (isset($roteiros) && $roteiros != null)
                    foreach ($roteiros as $roteiro) { ?>
                    <tr>
                        <p class="text-dark"><?= $roteiro['descricao'] ?></p>
                    </tr>
                <?php } ?>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <label for="auditoria">Parecer Auditoria</label>
            <textarea class="form-control" aria-label="With textarea" name="auditoria"></textarea>
        </div>
        <div class="form-row">
            <select name="id_status" class="form-control">
                <option value="1">Aprovado</option>
                <option value="1">Rejeitado</option>
            </select>
        </div>
        <div class="form-row">
            <div class="col">
                <button type="submit" class="btn btn-success">Finalizar</button>
            </div>

        </div>
</form>
</div>