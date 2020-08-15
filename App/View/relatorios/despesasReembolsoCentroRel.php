<div class="content pad-responsivo">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <p class="topo-auditoria text center font-600">Reembolso por Centro de Custo e Tipo <strong><?=$data['periodo']['dataIni'];?></strong> até <strong><?=$data['periodo']['dataFim'];?></strong></p>
            </li>
        </ol>
    </nav>
    <table id="example" class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <thead>
            <tr>
                <th scope="col" class="text-center">Centro de Custo</th>
                <th scope="col" class="text-center">Valor Reembolsado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['relatorio'] as $despesa) { ?>
                <tr>
                    <td class="text-center"><?= $despesa['centrocusto'] ?></td>
                    <td class="text-center"><?= $despesa['valor'] ?></td>      
                </tr>
            <?php } ?>
        </tbody>
    </table>    
</div>