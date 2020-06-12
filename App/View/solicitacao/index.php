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
                    <a class="nav-item nav-link" id="nav-concluir-tab" data-toggle="tab" href="#nav-concluir" role="tab" aria-controls="nav-concluir" aria-selected="true">Concluir</a>
                </div>
            </nav>
            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-resumo" role="tabpanel" aria-labelledby="nav-resumo-tab">
                    <div class="row mb-4 mt-4 border-dark border-bottom">
                        <h5>Resumo</h5>
                    </div>
                    <div class="row">
                        <div class="col-4 ">
                            <p class="text-dark"><strong>Descrição</strong></p>
                            <p class="text-dark"><?= $solicitacao[0]['descricao']; ?></p>
                        </div>
                        <div class="col-4">
                            <p class="text-dark"><strong>Colaborador</strong></p>
                            <p class="text-dark"><?= $solicitacao[0]['id_usuario']; ?></p>
                        </div>
                        <div class="col-4">
                            <p class="text-dark"><strong>Data</strong></p>
                            <p class="text-dark"><?= $solicitacao[0]['data']; ?></p>
                        </div>
                    </div>
                    <div class="row mb-4 mt-4 border-dark border-bottom">
                        <h6>Despesas</h6>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="text-dark"><strong>Descrição</strong></p>
                            <p class="text-dark">Janta</p>
                            <p class="text-dark">Almoço</p>
                        </div>
                        <div class="col-6">
                            <p class="text-dark"><strong>Valor</strong></p>
                            <p class="text-dark">R$ 88,00</p>
                            <p class="text-dark">R$ 66,00</p>
                        </div>
                    </div>
                    <div class="row mb-4 mt-4 border-dark border-bottom">
                        <h6>Roteiros</h6>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="text-dark"><strong>Destino</strong></p>
                            <p class="text-dark">Maringá - PR</p>
                            <p class="text-dark">Londrina - PR</p>
                        </div>
                        <div class="col-6">
                            <p class="text-dark"><strong>Descrição</strong></p>
                            <p class="text-dark">Central Unicoob</p>
                            <p class="text-dark">Sicoob Ouro verde UAD</p>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-roteiro" role="tabpanel" aria-labelledby="nav-roteiro-tab">
                    <button type="button" class="btn btn-success float-right mb-4" data-toggle="modal" data-target="#novoRoteiro">+ Adicionar</button>
                </div>
                <div class="tab-pane fade" id="nav-despesas" role="tabpanel" aria-labelledby="nav-despesas-tab">
                    <button type="button" class="btn btn-success float-right mb-4" data-toggle="modal" data-target="#novaDespesa">+ Adicionar</button>
                </div>
                <div class="tab-pane fade" id="nav-rateio" role="tabpanel" aria-labelledby="nav-rateio-tab">
                    <button type="button" class="btn btn-success float-right mb-4" data-toggle="modal" data-target="#rateio">+ Adicionar</button>
                </div>
                <div class="tab-pane fade" id="nav-concluir" role="tabpanel" aria-labelledby="nav-concluir-tab">
                    <button type="button" class="btn btn-warning float-right mb-4" data-toggle="modal" data-target="#">Concluir</button>
                </div>
            </div>
        </div>
    </div>
</div>

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
                <form action="<?= URL; ?>" method="POST">
                    <input type="hidden" name="id_solicitacao" value="">
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
                            <input type="date" class="form-control" name="data">
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="data">
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
                <form action="<?= URL; ?>Solicitacao/abrirSolicitacao" method="POST">
                    <input type="hidden" name="id_solicitacao" value="">
                    <div class="form-row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="selectDespesas">Despesa</label>
                            </div>
                            <select class="custom-select" id="selectDespesas">
                                <option value="1">Janta</option>
                                <option value="2">Almoço</option>
                                <option value="3">Hotel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="selectRegioes">Região</label>
                            </div>
                            <select class="custom-select" id="selectRegioes">
                                <option value="1">São Paulo</option>
                                <option value="2">Interior-PR</option>
                                <option value="3">Interior-SP</option>
                            </select>
                        </div>
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
                <form action="<?= URL; ?>Solicitacao/abrirSolicitacao" method="POST">
                    <div class="form-row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="selectCentroCusto">Rateio</label>
                            </div>
                            <select class="custom-select" id="selectCentroCusto">
                                <option value="1">UAD</option>
                                <option value="2">Central Unicoob</option>
                                <option value="3">PA 01</option>
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