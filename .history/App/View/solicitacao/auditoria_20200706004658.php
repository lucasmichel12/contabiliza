<div class="content">
    <div class="card-header bg-white">
        <h4>
            <p class="topo-auditoria"><strong><?= $solicitacao[0]['descricao']; ?> | <?= $solicitacao[0]['data']; ?> | R$ <?= $solicitacao[0]['valor_total']; ?></strong></p>
        </h4>
    </div>

    <!-- Auditoria -->
    <div class="orders mt-4 pad-home pad-responsivo">
        <div class="row">
            <div class="col-xl-12">
                <!-- Painel de Auditoria -->
                <div class="card" style="border: 1px solid #adaeb2;">
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria">Resumo </h4>
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
                    <!-- /Resumo -->

                    <!-- Despesas --> 
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria">Despesas</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Descrição</th>
                                        <th class="text-center" scope="col">Valor</th> 
                                    </tr>
                                </thead>
                                <tbody> 
                                <tr>
                                    <td class="text-center">Almoço</td>
                                    <td class="text-center">R$50,00</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">Hotel</td>
                                    <td class="text-center">R$250,00</td>
                                </tr> 
                                <!-- <tr> 
                                    <td>
                                        <?php if (isset($despesasViagem) && $despesasViagem != null) foreach ($despesasViagem as $despesa) { ?>
                                            <?= $despesa['descricao'] ?>
                                        <?php } ?> 
                                    </td>
                                    
                                    <td>
                                        <?php if (isset($despesasViagem) && $despesasViagem != null) foreach ($despesasViagem as $despesa) { ?>
                                            <?= $despesa['valor'] ?>
                                        <?php } ?>
                                    </td>
                                </tr>  -->
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div> 
                    <!-- /Despesas -->

                    <!-- Roteiros -->
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria ">Roteiros </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Destino</th>
                                        <th class="text-center" scope="col">Descrição</th> 
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <td class="text-center">PA04 - Cruzeiro do Oeste</td>
                                        <td class="text-center">Manutenção Totem PA04</td>
                                    </tr> 
                                    <tr>
                                        <td class="text-center">PA10 - Tapejara</td>
                                        <td class="text-center">Manutenção PA10 e formatação computador</td>
                                    </tr> 

                                    <!-- <tr>
                                        <td>
                                        <?php if (isset($roteiros) && $roteiros != null) foreach ($roteiros as $roteiro) { ?>
                                            <?= $roteiro['destino'] ?>
                                        <?php } ?>
                                        </td> 

                                        <td>
                                        <?php if (isset($roteiros) && $roteiros != null) foreach ($roteiros as $roteiro) { ?>
                                            <?= $roteiro['descricao'] ?>
                                        <?php } ?>
                                        </td>
                                        
                                    </tr>  -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /Roteiros -->

                    <!-- Parecer Auditoria -->
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria ">Parecer do Auditor </h4>
                    </div>

                    <div class="pad-20-aud card-body--">
                        <div class="form-row">
                            <div class="col-lg-12 pad-bottom-20">
                                <!-- <input type="text" class="form-control" required placeholder="Almoço, Janta, KM" name="descricao"> -->
                                <textarea class="form-control" aria-label="With textarea" name="auditoria"></textarea>
                            </div> 

                            <div class="col-6">
                                <a href="<?=URL;?>Usuario/listar" class="btn btn-rejeitar">Rejeitar </a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-sucesso float-right ml-3">Aprovar</button>
                            </div> 
                        </div> 
                    </div>
                    <!-- /Parecer Auditoria -->
                    
                </div>
                <!-- /Painel de Auditoria -->
            </div>
        </div>
    </div>
    <!-- /Auditoria -->





    <!-- <form action="#" class="mt-4 shadow p-3 mb-5 bg-white rounded">
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
    </form> -->
</div>