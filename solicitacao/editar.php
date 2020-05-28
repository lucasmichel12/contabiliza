<?php
require_once("Model/Filial.php");
require_once("Model/Viagem.php");
require_once("Model/DespesaParada.php");
require_once("Model/Parada.php");

$parada = new Parada();
$despesaParada = new DespesaParada();
$viagem = new Viagem();
$filiais = new Filial();

if (isset($url[2])) {
    $viagem->selectOne($url[2]);
}

?>
<div id='accordion'>
    <div class=''>
        <div class=' header-viagem' id='handing1'>
            <h5 class='mb-0'>
                <button class='btn btn-link' data-toggle='collapse' data-target='#collapse1' aria-expanded='true' aria-controls='collapse1'><strong>Relátorio  de: </strong><?php echo $viagem->getDescricao(); ?></button>
            </h5>
        </div>
        <div id='collapse1' class='collapse show' aria-labelledby='heading1' data-parent='#accordion'>
            <div class='card-body'>
                <form class='mt-4 p-3 mb-5 bg-white' action='persiste/viagem' method='POST' name='viagem'>
                    <div class='form-row'>
                        <input type='hidden' name='id' value='<?=$viagem->getId();?>'>
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
            </div>
        </div>
        
    </div>
</div>
<div class="">
            <div class="default-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="form-parada-tab" data-toggle="tab" href="#form-parada" role="tab" aria-controls="form-parada" aria-selected="false">Paradas</a>
                        <a class="nav-item nav-link" id="form-despesa-tab" data-toggle="tab" href="#form-despesa" role="tab" aria-controls="form-despesa" aria-selected="false">Despesas</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade" id="form-parada" role="tabpanel" aria-labelledby="form-parada-tab">
                    <div id="accordion">
  <div class="">
    <div class="" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="">
    <div class="" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
                    </div>

                    <div class="tab-pane fade" id="form-despesa" role="tabpanel" aria-labelledby="form-despesa-tab">
                  
                    </div>
                </div>
            </div>
        </div>

    </div>