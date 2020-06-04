<div class="content">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><strong>Centros de Custo cadastrados</strong></li>
        </ol>
        </nav>
    <table class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <thead>
            <tr>
                <th scope="col">Descrição</th>
                <th class="text-center" scope="col">CNPJ</th>
                <th class="text-center" scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($centroscusto as $centrocusto) { ?>
                <tr>
                    <td><?=$centrocusto['descricao']?></td>
                    <td class="text-center"><?=$centrocusto['cnpj']?></td>
                    <th class="text-center">
                        <a class="btn btn-info" href="<?=URL;?>CentroCusto/editar/<?=$centrocusto['idcentro_custo'];?>">Alterar</a>
                        <?php if(isset($btnHabilitar)){echo "<a class='btn btn-warning' href=". URL . "CentroCusto/desabilita/{$centrocusto['idcentro_custo']}'>Desabilitar</a>";} ?> 
                        <a class="btn btn-danger" href="<?=URL;?>CentroCusto/deleta/<?=$centrocusto['idcentro_custo'];?>">Excluir</a> 
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-danger" href="<?=URL;?>CentroCusto/listarInativos">Listar  Inativas</a> 
    <a class="btn btn-info" href="<?=URL;?>CentroCusto/listar">Listar Ativas</a> 
</div>