<div class="content pad-responsivo">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <p class="topo-auditoria text center font-600">Despesa por Centro de Custo e Tipo entre <strong><?=$data['periodo']['dataIni'];?></strong> até <strong><?=$data['periodo']['dataFim'];?></strong></p>
            </li>
        </ol>
    </nav>
    <table class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <thead>
            <tr>
                <th scope="col" class="text-center">Centro de Custo</th>
                <th scope="col" class="text-center">Despesa</th>
                <th scope="col" class="text-center">Valor</th>
                <th scope="col" class="text-center">Quantidade</th>
                <th scope="col" class="text-center">Solicitação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['relatorio'] as $centrocusto) { ?>
                <tr>
                    <td class="text-center"><?= $centrocusto['centro_custo'] ?></td>
                    <td class="text-center"><?= $centrocusto['despesa'] ?></td>   
                    <td class="text-center">R$ <?= $centrocusto['valor'] ?></td>         
                    <td class="text-center"><?= $centrocusto['qtd_despesa'] ?></td>         
                    <td class="text-center"><?= $centrocusto['descricao'] ?></td>         
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>