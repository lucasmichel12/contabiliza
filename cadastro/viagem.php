<div class="content">
    <div class="card">
        <div class="card-header">
            <h4>Relatorio de Reembolso</h4>
        </div>
        <div class="card-body">
            <div class="default-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="form-viagem-tab" data-toggle="tab" href="#form-viagem" role="tab" aria-controls="form-viagem" aria-selected="true">Viagem</a>
                        <a class="nav-item nav-link" id="form-parada-tab" data-toggle="tab" href="#form-parada" role="tab" aria-controls="form-parada" aria-selected="false">Parada</a>
                        <a class="nav-item nav-link" id="form-despesa-tab" data-toggle="tab" href="#form-despesa" role="tab" aria-controls="form-despesa" aria-selected="false">Despesa</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="form-viagem" role="tabpanel" aria-labelledby="form-viagem-tab">
                        <form class="mt-4 p-3 mb-5 bg-white" action="persiste/viagem" method="POST" name="viagem">
                            <div class="form-row">
                                <input type="hidden" name="id" value="">
                                <input type="hidden" name="idColaborador" value="">
                                <div class="col-6">
                                    <input type="text" class="form-control" required placeholder="Ponto de partida" name="localPartida" value="">
                                </div>
                                <div class="col-3">
                                    <input type="date" class="form-control" required name="dataInicio" value="">
                                </div>
                                <div class="col-3">
                                    <input type="date" class="form-control" required name="dataTermino" value="">
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-8">
                                    <input type="text" class="form-control" required placeholder="Descrição da viagem" name="descricao" value="">
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="idFilial">Filial</label>
                                        </div>
                                        <select class="custom-select" id="idFilial" name="idFilial">
                                            <option value="1">Filial 1</option>
                                            <option value="2">Filial 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success float-right ml-3">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="form-parada" role="tabpanel" aria-labelledby="form-parada-tab">
                        <form class="mt-4 p-3 mb-5 bg-white" action="recursos/teste" method="POST" name="parada">
                            <div class="form-row">
                                <input type="hidden" name="id" value="">
                                <div class="col-6">
                                    <input type="text" class="form-control" required placeholder="Destino da parada" name="destino" value="">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" required placeholder="Motivo da parada" name="Motivo" value="">
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-3">
                                    <input type="date" class="form-control" required name="dataInicio" value="">
                                </div>
                                <div class="col-3">
                                    <input type="date" class="form-control" required name="dataTermino" value="">
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="idViagem">Viagem</label>
                                        </div>
                                        <select class="custom-select" id="idViagem" name="idViagem">
                                            <option value="1"></option>
                                            <option value="1"></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success float-right ml-3">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="form-despesa" role="tabpanel" aria-labelledby="form-despesa-tab">
                        <form class="mt-4 p-3 mb-5 bg-white" action="persiste/despesa" method="POST" name="despesa">
                            <div class="form-row">

                            </div>
                            <div class="form-row mt-4">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success float-right ml-3">Enviar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>