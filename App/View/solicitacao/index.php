<div class="content">
    <div class="card-header bg-white">
        <h4>
            <p class="text-dark"><strong><?= $solicitacao[0]['descricao']; ?> | <?= $solicitacao[0]['data']; ?> | R$ <?= $solicitacao[0]['valor_total']; ?></strong></p>
        </h4>
    </div>
    <div class="card-body bg-white">
        <div class="default-tab">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active show" id="nav-resumo-tab" data-toggle="tab" href="#nav-resumo" role="tab" aria-controls="nav-resumo" aria-selected="false">Resumo</a>
                    <a class="nav-item nav-link" id="nav-roteiro-tab" data-toggle="tab" href="#nav-roteiro" role="tab" aria-controls="nav-roteiro" aria-selected="false">Roteiros</a>
                    <a class="nav-item nav-link" id="nav-despesas-tab" data-toggle="tab" href="#nav-despesas" role="tab" aria-controls="nav-despesas" aria-selected="false">Despesas</a>
                    <a class="nav-item nav-link" id="nav-rateio-tab" data-toggle="tab" href="#nav-rateio" role="tab" aria-controls="nav-rateio" aria-selected="true">Rateio</a>
                </div>
            </nav>

            <!-- Conteudo das telas Resumo, Roteiro, Despesas, Rateio e Concluido -->
            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                <!-- Conteudo Resumo -->
                <div class="tab-pane fade active show" id="nav-resumo" role="tabpanel" aria-labelledby="nav-resumo-tab">
                    <div class="row mb-4 mt-4 border-dark border-bottom">
                        <h5>Resumo</h5>
                    </div>
                    <div class="row">
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
                    <div class="row mb-4 mt-4 border-dark border-bottom">
                        <h6>Despesas</h6>
                    </div>
                    <div class="row">
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
                    <div class="row mb-4 mt-4 border-dark border-bottom">
                        <h6>Roteiros</h6>
                    </div>
                    <div class="row">
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
                    <div class="row">
                       <div class="col">
                            <a href="<?=URL;?>Solicitacao/finalizaSolicitacao/<?=$solicitacao[0]['id_solicitacao'];?>" class="btn btn-warning" >Concluir</a>
                       </div>
                       <div class="col">
                            <a href="<?=URL;?>Solicitacao/index/<?=$solicitacao[0]['id_solicitacao'];?>" class="btn btn-danger" >Excluir Solicitação</a>
                       </div>
                    </div>

                </div>
                <!-- Fim conteudo Resumo -->

                <!-- Conteudo Roteiros -->
                <div class="tab-pane fade" id="nav-roteiro" role="tabpanel" aria-labelledby="nav-roteiro-tab">
                    <button type="button" class="btn btn-success float-right mb-4" data-toggle="modal" data-target="#novoRoteiro">+ Adicionar</button>
                    <!-- Tabela de Roteiros ativos -->
                    <table class="table table-hover  mt-4">
                        <thead>
                            <tr>
                                <th scope="col">Descrição</th>
                                <th class="text-center" scope="col">Destino</th>
                                <th class="text-center" scope="col">Inicio</th>
                                <th class="text-center" scope="col">Termino</th>
                                <th class="text-center" scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($roteiros) && $roteiros != null)
                                foreach ($roteiros as $roteiro) { ?>
                                <tr>
                                    <td><?= $roteiro['descricao'] ?></td>
                                    <td class="text-center"><?= $roteiro['destino'] ?></td>
                                    <td class="text-center"><?= $roteiro['inicio'] ?></td>
                                    <td class="text-center"><?= $roteiro['termino'] ?></td>
                                    <th class="text-center">
                                        <a class="btn btn-danger" href="<?= URL; ?>Solicitacao/deletaRoteiroViagem/<?= $roteiro['id_roteiro']; ?>">Excluir</a>
                                    </th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Fim conteudo Roteiros -->

                <!-- Conteudo Despesa -->
                <div class="tab-pane fade" id="nav-despesas" role="tabpanel" aria-labelledby="nav-despesas-tab">
                    <button type="button" class="btn btn-success float-right mb-4" data-toggle="modal" data-target="#novaDespesa">+ Adicionar</button>
                    <!-- Tabela de Despesas -->
                    <table class="table table-hover  mt-4">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Despesa</th>
                                <th class="text-center" scope="col">Região</th>
                                <th class="text-center" scope="col">Quantidade</th>
                                <th class="text-center" scope="col">Valor Total</th>
                                <th class="text-center" scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($despesasViagem) && $despesasViagem != null)
                                foreach ($despesasViagem as $despesa) { ?>
                                <tr>
                                    <td class="text-center"><?= $despesa['descricao']; ?></td>
                                    <td class="text-center"><?= $despesa['regiao']; ?></td>
                                    <td class="text-center"><?= $despesa['qtd_despesa']; ?></td>
                                    <td class="text-center"><?= $despesa['valor']; ?></td>
                                    <th class="text-center">
                                        <a class="btn btn-danger" href="<?= URL; ?>Solicitacao/deletaDespesaViagem/<?= $despesa['id_solicitacao_despesa']; ?>">Excluir</a>
                                    </th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Fim tabela -->
                </div>
                <!-- Fim Despesa -->

                <!-- Conteudo Rateio -->
                <div class="tab-pane fade" id="nav-rateio" role="tabpanel" aria-labelledby="nav-rateio-tab">
                    <button type="button" class="btn btn-success float-right mb-4" data-toggle="modal" data-target="#rateio">+ Adicionar</button>
                    <!-- Tabela de Despesas -->
                    <table class="table table-hover  mt-4">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Todos os custos vão para:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($rateios) && $rateios != null)
                                foreach ($rateios as $rateio) { ?>
                                <tr>
                                    <td class="text-center"><?= $rateio['descricao']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Fim tabela -->
                </div>
                <!-- Fim Rateio -->
                
            </div>
            <!-- Fim dos Conteudos -->

            <!-- Modais -->

            <!-- Modal Novo Roteiro -->
            <div class="modal fade" id="novoRoteiro" tabindex="-1" role="dialog" aria-labelledby="novoRoteiro" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="novoRoteiro">Descrição Roteiro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulário Novo Roteiro -->
                            <form action="<?= URL; ?>Solicitacao/adicionaRoteiro" method="POST">
                                <input type="hidden" name="id_solicitacao" value="<?= $solicitacao[0]['id_solicitacao']; ?>">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" required placeholder="Descrição" name="descricao">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" required placeholder="Destino" name="destino">
                                    </div>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="col">
                                        <input type="date" class="form-control" name="inicio">
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="termino">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-danger text-white" data-dismiss="modal">Fechar</a>
                                    <button type="submit" class="btn btn-success">Continuar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Nova Despesa -->
            <div class="modal fade" id="novaDespesa" tabindex="-1" role="dialog" aria-labelledby="novaDespesa" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="novaDespesa">Adicionar Despesa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!-- Formulário Nova Despesa -->
                            <form action="<?= URL; ?>Solicitacao/adicionarDespesa" method="POST">
                                <input type="hidden" name="id_solicitacao" value="<?= $solicitacao[0]['id_solicitacao']; ?>">
                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selectDespesas">Despesa</label>
                                        </div>
                                        <select class="custom-select" id="selectDespesas" name="id_despesa">
                                            <?php foreach ($despesas as $despesa) { ?>
                                                <option value="<?= $despesa['id_despesa']; ?>"><?= $despesa['descricao']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selectRegioes">Região</label>
                                        </div>
                                        <select class="custom-select" id="selectRegioes" name="id_regiao">
                                            <?php foreach($regioes as $regiao) { ?>
                                                <option value="<?=$regiao['id_regiao'];?>"><?=$regiao['descricao'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <input type="number" class="form-control" required name="qtd_despesa">
                                </div>
                                <div class="form-row mt-2">
                                    <div class="col">
                                        <input type="text" class="form-control" required placeholder="R$ 00,00" name="valor">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-danger text-white" data-dismiss="modal">Fechar</a>
                                    <button type="submit" class="btn btn-success">Continuar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Rateio -->
            <div class="modal fade" id="rateio" tabindex="-1" role="dialog" aria-labelledby="rateio" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rateio">Adicionar Despesa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!-- Formulário Rateio -->
                            <form action="<?= URL; ?>Solicitacao/atualizaRateio" method="POST">
                            <input type="hidden" name="id_solicitacao" value="<?= $solicitacao[0]['id_solicitacao']; ?>">
                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selectCentroCusto">Rateio</label>
                                        </div>
                                        <select class="custom-select" id="selectCentroCusto" name="idcentro_custo">
                                            <?php foreach ($centrosCusto as $centroCusto) { ?>
                                                <option value="<?= $centroCusto['idcentro_custo']; ?>"><?= $centroCusto['descricao']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-danger text-white" data-dismiss="modal">Fechar</a>
                                    <button type="submit" class="btn btn-success">Continuar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>