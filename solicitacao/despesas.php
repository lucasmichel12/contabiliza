<?php
$despesasParada = $despesaParada->selectAll();
foreach (json_decode($despesasParada) as $despesaParada) {

?>


    <div id='accordion3'>
        <div class='card'>
            <div class='card-header' id='handing3'>
                <h5 class='mb-0'>
                    <button class='btn btn-link' data-toggle='collapse' data-target='#collapse3' aria-expanded='true' aria-controls='collapse3'><?php echo $despesaParada->idDespesa; ?></button>
                </h5>
            </div>
            <div id='collapse3' class='collapse' aria-labelledby='heading3' data-parent='#accordion3'>
                <div class='card-body'>
                    <form class="mt-4 p-3 mb-5 bg-white" action="persiste/despesaParada" method="POST" name="despesa">
                        <div class="form-row">
                            <input type="hidden" name="id" value="">
                            <div class="col-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="idDespesa">Despesa</label>
                                    </div>
                                    <select class="custom-select" id="idDespesa" name="idDespesa">
                                        <?php
                                        foreach (json_decode($despesaOptions) as $option) {
                                            if ($option->ativo === 'Sim') {
                                                echo "<option data-valor='$option->valor' value='$option->id'>$option->descricao</option>";
                                            }
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
                            <div class="col-7">
                                <button type="submit" class="btn btn-success float-left ml-3">Registrar Despesa</button>
                            </div>
                            <div class="col-5">
                                <a href="" class="btn btn-info float-right ml-3">Finalizar Relatório</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php } ?>