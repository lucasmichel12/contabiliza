

<div class="content pad-responsivo">
    
    <div class="card-header bg-white">
        <h4>
            <!-- <p class="topo-auditoria"><strong><?= $data['solicitacao'][0]['descricao']; ?> | <?= $data['solicitacao'][0]['data']; ?> | R$ <?= $data['solicitacao'][0]['valor_total']; ?></strong></p> -->
        </h4>
    </div>

    <table class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <tbody>
            <tr>
                <td>Despesas</td>
                <th>
                    <a class="btn btn-info" href="<?= URL; ?>Relatorio/despesas">Selecionar</a>
                </th>
            </tr>
            <tr>
                <td>Centros de Custo</td>
                <th>
                    <a class="btn btn-info" href="<?= URL; ?>CentroCusto/?>">Selecionar</a>
                </th>
            </tr>
            <tr>
                <td>Financeiro</td>
                <th>
                    <a class="btn btn-info" href="<?= URL; ?>CentroCusto/?>">Selecionar</a>
                </th>
            </tr>
        </tbody>
    </table>


    </div>
</div>