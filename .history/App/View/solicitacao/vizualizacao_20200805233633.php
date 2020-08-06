<div class="content pad-responsivo" id="imprimir">
    <div class="card-header bg-white">
        <h4>
            <p class="topo-auditoria"><strong><?= $data['solicitacao'][0]['descricao']; ?> | <?= $data['solicitacao'][0]['data']; ?> | R$ <?= $data['solicitacao'][0]['valor_total']; ?></strong></p>
        </h4>
    </div>

    <!-- Auditoria -->
    <div class="orders mt-4 pad-home ">
        <div class="row">
            <div class="col-xl-12">
                <!-- Painel de Auditoria -->
                <div class="card" style="border: 1px solid #adaeb2;">
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria">Resumo </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Colaborador</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Data</th>
                                        <th class="text-center" scope="col">Rateio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $data['solicitacao'][0]['nome']; ?></td>
                                        <td><?= $data['solicitacao'][0]['descricao']; ?></td>
                                        <td><?= $data['solicitacao'][0]['data']; ?></td>
                                        <td class="text-center">
                                            <?php if (isset($data['rateios']) && $data['rateios'] != null) foreach ($data['rateios'] as $rateio) { ?>
                                                <?= $rateio['descricao']; ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                    <!-- /Resumo -->

                    <!-- Despesas -->
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria">Despesas</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Descrição</th>
                                        <th class="text-center" scope="col">Valor</th>
                                    </tr>
                                </thead>
                                <?php if (isset($data['despesasViagem']) && $data['despesasViagem'] != null) foreach ($data['despesasViagem'] as $despesa) { ?>
                                    <tr>
                                        <td class="text-center"> <?= $despesa['descricao'] ?> </td>
                                        <td class="text-center"> <?= $despesa['valor'] ?> </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                    <!-- /Despesas -->

                    <!-- Roteiros -->
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria ">Roteiros </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Destino</th>
                                        <th class="text-center" scope="col">Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($data['roteiros']) && $data['roteiros'] != null) foreach ($data['roteiros'] as $roteiro) { ?>
                                        <tr>
                                            <td class="text-center"><?= $roteiro['destino'] ?></td>
                                            <td class="text-center"><?= $roteiro['descricao'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /Roteiros -->

                    <!-- Parecer Auditoria -->
                    <div class="card-body fundo-aud">
                        <h4 class="box-title titulo-auditoria ">Parecer do Auditor </h4>
                    </div>

                    <form action="<?= URL; ?>Solicitacao/auditado" method="POST">
                        <div class="pad-20-aud card-body--">
                            <div class="form-row">
                                <input type="hidden" name="id_solicitacao" value="<?= $data['solicitacao'][0]['id_solicitacao']; ?>">
                                <div class="col-lg-12 pad-bottom-20">
                                    <!-- <input type="text" class="form-control" required placeholder="Almoço, Janta, KM" name="descricao"> -->
                                    <textarea class="form-control" readonly aria-label="With textarea" name="auditoria" value="<?= $data['solicitacao'][0]['auditoria']; ?>">
                                        <?= $data['solicitacao'][0]['auditoria']; ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- /Parecer Auditoria -->

                </div>
                <!-- /Painel de Auditoria -->
                <button class="btn btn-info mar-bottom-20" onclick="imprimir()">Imprimir</button>
            </div>
        </div>
    </div>
    <!-- /Auditoria -->

</div>
<script>
	function imprimir() {
		var imprimir = document.querySelector("#imprimir");
		    	window.print();
		    	var time = window.setTimeout(function() {
		    		imprimir.style.display = 'block';
		    	}, 1000);
		    }
	
</script>