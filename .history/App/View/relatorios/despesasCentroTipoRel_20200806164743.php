<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><strong>Despesas</strong></li>
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
                    <td class="text-center"><?= $centrocusto['valor'] ?></td>         
                    <td class="text-center"><?= $centrocusto['qtd_despesa'] ?></td>         
                    <td class="text-center"><?= $centrocusto['descricao'] ?></td>         
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>