<?php
$paradas = $parada->selectAll($url[2]);
foreach (json_decode($paradas) as $parada) {
    
?>


    <div id='accordion2'>
        <div class='card'>
            <div class='card-header' id='handing2'>
                <h5 class='mb-0'>
                    <button class='btn btn-link' data-toggle='collapse' data-target='#collapse2' aria-expanded='true' aria-controls='collapse2'><?php echo $parada->destino; ?></button>
                </h5>
            </div>
            <div id='collapse2' class='collapse' aria-labelledby='heading2' data-parent='#accordion2'>
                <div class='card-body bg-light'>
                    <form class="mt-4 p-3 mb-5 bg-light" action="persiste/parada" method="POST" name="parada">
                        <div class="form-row">
                            <input type="hidden" name="id" value="<?=$parada->id;?>">
                            <input type="hidden" name="idViagem" value="<?=$url[2];?>">
                            <div class="col-6">
                                <input type="text" class="form-control" required placeholder="Destino da parada" name="destino" value="<?=$parada->destino;?>">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" required placeholder="Motivo da parada" name="motivo" value="<?=$parada->motivo;?>">
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col-3">
                                <input type="date" class="form-control" required name="dataInicio" value="<?=$parada->dataInicio;?>">
                            </div>
                            <div class="col-3">
                                <input type="date" class="form-control" required name="dataTermino" value="<?=$parada->dataTermino;?>">
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="idViagem">Viagem</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-4">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success float-right ml-3">Enviar</button>
                            </div>
                        </div>
                    </form>
                    <!-- Aqui vai outro Car Collapse para adicionar as despesas -->
                    <?php require_once("despesas.php");?>
                </div>
            </div>
        </div>
    </div>


<?php } ?>