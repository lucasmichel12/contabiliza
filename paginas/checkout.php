<?php
require_once("Model/Filial.php");
require_once("Model/Viagem.php");
require_once("Model/DespesaParada.php");
require_once("Model/Parada.php");
require_once("Model/Colaborador.php");

$parada = new Parada();
$despesaParada = new DespesaParada();
$viagem = new Viagem();
$filial = new Filial();
$colaborador = new Colaborador();

$viagem->selectOne('status', '"Aberto"');
$colaborador->selectOne($viagem->getIdColaborador());
$filial->selectOne($viagem->getIdFilial());
$paradas = $parada->selectAll($viagem->getId());

?>
<h3><strong>Prestação de contas</strong> | <?=$viagem->getDescricao();?></h3>
<hr class="my-4">
<div class="row">
    <p><strong>Local de Partida: </strong><?=$viagem->getLocalPartida();?></p>
</div>
<div class="row">
    <p><strong>Colaborador: </strong> <?=$colaborador->getNome();?></p>
</div>
<div class="row">
    <p><strong>Centro de Custo: </strong> <?=$filial->getNome();?></p>
</div>
<div class="row">
    <p><strong>Valor total: </strong> R$ <?=$viagem->getCustoTotal();?></p>
</div>

<h4><strong>Paradas</strong></h4>
<hr class="my-4">
<?php foreach(json_decode($paradas) as $parada) { ?>
<div class="row">
    <p><strong>Destino: </strong> <?=$parada->destino;?> <strong>    Motivo: </strong> <?=$parada->motivo;?></p>
</div>
<?php } ?>

<h4><strong>Despesas</strong></h4>
<hr class="my-4">
<?php foreach(json_decode($paradas) as $parada) { ?>
<div class="row">
    <p><strong>Destino: </strong> <?=$parada->destino;?> <strong>    Motivo: </strong> <?=$parada->motivo;?></p>
</div>
<?php } ?>