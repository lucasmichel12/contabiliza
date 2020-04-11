<?php
require_once("Model/Filial.php");
require_once("Model/Viagem.php");
require_once("Model/Despesa.php");
require_once("Model/Parada.php");
$parada = new Parada();
$despesa = new Despesa();
$viagem = new Viagem();
$filiais = new Filial();
$filialOptions = $filiais->selectAll();
$viagemOptions = $viagem->selectAll();
$despesaOptions = $despesa->selectAll();
$paradaOptions = $parada->selectAll();


?>
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
                                <input type="hidden" name="idColaborador" value="<?= $_SESSION['usuario']['id']; ?>">
                                <input type="hidden" name="status" id="status" value="Aberto">

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
                                            <?php
                                            foreach (json_decode($filialOptions) as $option) {
                                                echo "
                                                            <option value='$option->id'>$option->nome</option>
                                                        ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <input class="form-control" type="text" name="custoTotal" id="custoTotal" readonly placeholder="R$ 00,00">
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
                        <form class="mt-4 p-3 mb-5 bg-white" action="persiste/parada" method="POST" name="parada">
                            <div class="form-row">
                                <input type="hidden" name="id" value="">
                                <div class="col-6">
                                    <input type="text" class="form-control" required placeholder="Destino da parada" name="destino" value="">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" required placeholder="Motivo da parada" name="motivo" value="">
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
                                        <select class="custom-select" id="idViagem" required name="idViagem">
                                            <?php
                                            foreach (json_decode($viagemOptions) as $option) {
                                                echo "
                                                            <option value='$option->id'>$option->localPartida</option>
                                                        ";
                                            }
                                            ?>
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
                        <form class="mt-4 p-3 mb-5 bg-white" action="recursos/teste" method="POST" name="despesa">
                            <div class="form-row">
                                <div class="col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="idDespesa">Despesa</label>
                                        </div>
                                        <select class="custom-select" id="idDespesa" name="idDespesa">
                                            <?php
                                            foreach (json_decode($despesaOptions) as $option) {
                                                echo "
                                                            <option data-valor='$option->valor'value='$option->id'>$option->descricao</option>
                                                        ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" placeholder="Quantidade" name="quantidade" id="quantidade" value="">
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="idParada">Parada</label>
                                        </div>
                                        <select class="custom-select" id="idParada" name="idParada">
                                            <?php
                                            foreach (json_decode($paradaOptions) as $option) {
                                                echo "
                                                            <option value='$option->id'>$option->destino</option>
                                                        ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="valor">R$</label>
                                        </div>
                                        <input type="text" class="form-control" required placeholder="Valor total " id="valor" name="valor" value="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="observacao" id="observacao" placeholder="Observações">
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="row form-group">
                                    <div class="col-4"><label for="comprovante" class=" form-control-label">Anexar Comprovante</label></div>
                                    <div class="col-8"><input type="file" id="comprovante" name="comprovante" class="form-control-file"></div>
                                </div>
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

<script src="public/assets/jquery/jquery.min.js"></script>
<script src="public/assets/jquery/jqueryMaskMoney.min.js"></script>
<script>
    $("#quantidade").blur(function() {


        let valor = $("#idDespesa option:selected")
        outros = valor.text()

        if (outros !== 'Outros') {

            valor = valor.attr("data-valor")
            let quantidade = $("#quantidade").val()
            total = quantidade * valor
            $("#valor").attr("value", total)
            $("#valor").attr("readonly", "true")

        } else {
            
            $(document).ready(function() {
                $("#valor").maskMoney({
                    decimal: ",",
                    thousands: "."
                });
            });
        }
    })
</script>