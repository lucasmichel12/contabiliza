<?php
require_once("Model/Filial.php");
require_once("Model/Viagem.php");
require_once("Model/Despesa.php");
require_once("Model/Parada.php");

$parada = new Parada();
$despesa = new Despesa();
$viagem = new Viagem();
$filiais = new Filial();

if (isset($url[2])) {
    $viagem->selectOne($url[2]);
}

?>
<div id='accordion'>
    <div class='card'>
        <div class='card-header' id='handing1'>
            <h5 class='mb-0'>
                <button class='btn btn-link' data-toggle='collapse' data-target='#collapse1' aria-expanded='true' aria-controls='collapse1'><strong>Relátorio  de: </strong><?php echo $viagem->getDescricao(); ?></button>
            </h5>
        </div>
        <div id='collapse1' class='collapse show' aria-labelledby='heading1' data-parent='#accordion'>
            <div class='card-body'>
                <form class='mt-4 p-3 mb-5 bg-white' action='persiste/viagem' method='POST' name='viagem'>
                    <div class='form-row'>
                        <input type='hidden' name='id' value=''>
                        <input type='hidden' name='idColaborador' value='<?php echo $viagem->getIdColaborador(); ?>'>
                        <input type='hidden' name='status' id='status' value='<?php echo $viagem->getStatus(); ?>'>

                        <div class='col-6'>
                            <input type='text' class='form-control' required placeholder='Ponto de partida' name='localPartida' value='<?php echo $viagem->getLocalPartida(); ?>'>
                        </div>
                        <div class='col-3'>
                            <input type='date' class='form-control' required name='dataInicio' value='<?php echo $viagem->getDataInicio(); ?>'>
                        </div>
                        <div class='col-3'>
                            <input type='date' class='form-control' required name='dataTermino' value='<?php echo $viagem->getDataTermino(); ?>'>
                        </div>
                    </div>
                    <div class='form-row mt-2'>
                        <div class='col-8'>
                            <input type='text' class='form-control' required placeholder='Descrição da viagem' name='descricao' value='<?php echo $viagem->getDescricao(); ?>'>
                        </div>
                        <div class='col-4'>
                            <div class='input-group mb-3'>
                                <div class='input-group-prepend'>
                                    <label class='input-group-text' for='idFilial'>Filial</label>
                                </div>
                                <select class="custom-select" id="idFilial" name="idFilial">
                                    <?php
                                    $filialOptions = $filiais->selectAll();
                                    foreach (json_decode($filialOptions) as $option) {
                                        echo "<option value='$option->id'>$option->nome</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-6'>
                            <input class='form-control' type='hidden' name='custoTotal' id='custoTotal' readonly placeholder='R$ 00,00'>
                        </div>
                    </div>
                    <div class='form-row mt-4'>
                        <div class='col-6'>
                            <button type='submit' class='btn btn-success float-right ml-3'>Enviar</button>
                        </div>
                    </div>
                </form>
                <!-- Aqui vai outro Car Collapse para adicionar as despesas -->
                                    <?php require_once("paradas.php");?>
            </div>
        </div>
    </div>
</div>