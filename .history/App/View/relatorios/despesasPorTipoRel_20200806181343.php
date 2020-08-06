<div class="content pad-responsivo">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><strong>Despesas</strong></li>
        </ol>
    </nav>
    <table id="example" class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <thead>
            <tr>
                <th scope="col" class="text-center">Despesa</th>
                <th scope="col" class="text-center">Quantidade</th>
                <th scope="col" class="text-center">Solicitação</th>
                <th scope="col" class="text-center">Solicitante</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['relatorio'] as $despesa) { ?>
                <tr>
                    <td class="text-center"><?= $despesa['despesa'] ?></td>
                    <td class="text-center"><?= $despesa['qtd_despesa'] ?></td>   
                    <td class="text-center"><?= $despesa['solicitacao'] ?></td>         
                    <td class="text-center"><?= $despesa['nome'] ?></td>         
                </tr>
            <?php } ?>
        </tbody>
    </table>    
</div>