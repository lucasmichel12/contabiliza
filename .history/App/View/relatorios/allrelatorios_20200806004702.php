<table class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
    <tbody>
        <tr>
            <td>Despesas</td>
            <th>
                <a class="btn btn-info" href="<?= URL; ?>Relatorio/despesas">Selecionar</a>
            </th>
        </tr>
        <tr>
            <td>Centros de Custo</td>
            <th>
                <a class="btn btn-info" href="<?= URL; ?>CentroCusto/?>">Selecionar</a>
            </th>
        </tr>
        <tr>
            <td>Financeiro</td>
            <th>
                <a class="btn btn-info" href="<?= URL; ?>CentroCusto/?>">Selecionar</a>
            </th>
        </tr>
    </tbody>
</table>

<div class="content pad-responsivo">
    
    <div class="card-header bg-white">
        <h4>
            <p class="topo-auditoria"><strong><?= $data['solicitacao'][0]['descricao']; ?> | <?= $data['solicitacao'][0]['data']; ?> | R$ <?= $data['solicitacao'][0]['valor_total']; ?></strong></p>
        </h4>
    </div>

    <div class="card-body bg-white pad-solicitacao">
        <div class="default-tab">
            <nav>
                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active show" id="nav-resumo-tab" data-toggle="tab" href="#nav-resumo" role="tab" aria-controls="nav-resumo" aria-selected="false">Resumo</a>
                    <a class="nav-item nav-link" id="nav-roteiro-tab" data-toggle="tab" href="#nav-roteiro" role="tab" aria-controls="nav-roteiro" aria-selected="false">Roteiros</a>
                    <a class="nav-item nav-link" id="nav-despesas-tab" data-toggle="tab" href="#nav-despesas" role="tab" aria-controls="nav-despesas" aria-selected="false">Despesas</a>
                    <a class="nav-item nav-link" id="nav-rateio-tab" data-toggle="tab" href="#nav-rateio" role="tab" aria-controls="nav-rateio" aria-selected="true">Rateio</a>
                </div>
            </nav>

            

            <!-- Conteudo das telas Resumo, Roteiro, Despesas, Rateio e Concluido -->
            <div class="tab-content  pt-2" id="nav-tabContent">
                <!-- Conteudo Resumo -->
                <div class="tab-pane fade active show card" id="nav-resumo" role="tabpanel" aria-labelledby="nav-resumo-tab">
                    <!-- <div class="row mb-4 mt-4 border-dark border-bottom">
                        <h5>Resumo</h5>
                    </div> -->
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria">Resumo </h4>
                    </div>
                    <div class="row ">
                        <div class="col-lg-3 col-5 margin-15">
                            <p class="text-dark"><strong>Descrição</strong></p>
                            <p class="text-dark"><?= $data['solicitacao'][0]['descricao']; ?></p>
                        </div>
                        <div class="col-lg-3 col-5 margin-15">
                            <p class="text-dark"><strong>Colaborador</strong></p>
                            <p class="text-dark"><?= $data['solicitacao'][0]['nome']; ?></p>
                        </div>
                        <div class="col-lg-2 col-5 margin-15">
                            <p class="text-dark"><strong>Data</strong></p>
                            <p class="text-dark"><?= $data['solicitacao'][0]['data']; ?></p>
                        </div>
                        <div class="col-lg-2 col-5 margin-15">
                            <p class="text-dark"><strong>Rateio</strong></p>
                            <?php if (isset($data['rateios']) && $data['rateios'] != null) foreach ($data['rateios'] as $rateio) { ?>
                                <p class="text-dark"><?= $rateio['descricao']; ?></p>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- <div class="row mb-4 mt-4 border-dark border-bottom">
                        <h6>Despesas</h6>
                    </div> -->
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria">Despesas </h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-5 margin-15">
                            <p class="text-dark"><strong>Descrição</strong></p>
                            <?php if (isset($data['despesasViagem']) && $data['despesasViagem'] != null)
                                foreach ($data['despesasViagem'] as $despesa) { ?>
                                <tr>
                                    <p class="text-dark"><?= $despesa['descricao'] ?></p>
                                </tr>
                            <?php } ?>
                        </div>
                        <div class="col-lg-5 col-5 margin-15">
                            <p class="text-dark"><strong>Valor</strong></p>
                            <?php if (isset($data['despesasViagem']) && $data['despesasViagem'] != null)
                                foreach ($data['despesasViagem'] as $despesa) { ?>
                                <tr>
                                    <p class="text-dark">R$ <?= $despesa['valor'] ?></p>
                                </tr>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- <div class="row mb-4 mt-4 border-dark border-bottom">
                        <h6>Roteiros</h6>
                    </div> -->
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria">Roteiros </h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-5 margin-15">
                            <p class="text-dark"><strong>Destino</strong></p>
                            <?php if (isset($data['roteiros']) && $data['roteiros'] != null)
                                foreach ($data['roteiros'] as $roteiro) { ?>
                                <tr>
                                    <p class="text-dark"><?= $roteiro['destino'] ?></p>
                                </tr>
                            <?php } ?>
                        </div>
                        <div class="col-lg-5 col-5 margin-15">

                            <p class="text-dark"><strong>Descrição</strong></p>
                            <?php if (isset($data['roteiros']) && $data['roteiros'] != null)
                                foreach ($data['roteiros'] as $roteiro) { ?>
                                <tr>
                                    <p class="text-dark"><?= $roteiro['descricao'] ?></p>
                                </tr>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 margin-15 pad-bottom-10">
                            <form action="<?= URL; ?>Solicitacao/auditado" id="solicitacao" method="post">
                                <input type="hidden" name="id_solicitacao" value="<?= $data['solicitacao'][0]['id_solicitacao']; ?>">
                                <a onclick="fecharSolicitacao()" class="btn btn-warning">Concluir</a>
                            </form>
                        </div>
                        <div class="col-5 margin-15 pad-bottom-10 pad-right-0">
                            <button class="btn btn-danger pull-right" onclick="excluir('<?= URL; ?>Solicitacao/deletar/<?= $data['solicitacao'][0]['id_solicitacao']; ?>')">Excluir</button>
                        </div>
                    </div>

                </div>
                <!-- Fim conteudo Resumo -->

               

                 

                

            </div>
            <!-- Fim dos Conteudos -->

             
             

             
        </div>
    </div>
</div>