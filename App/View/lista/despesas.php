<div class="content">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><strong>Despesas cadastradas</strong></li>
        </ol>
        </nav>
    <table class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <thead>
            <tr>
                <th scope="col">Descrição</th>
                <th class="text-center" scope="col">Valor Definido</th>
                <th class="text-center" scope="col">Valor</th>
                <th class="text-center" scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($data['despesas'] as $despesa) { ?>
                <tr>
                    <td><?=$despesa['descricao']?></td>
                    <td class="text-center"><?=$despesa['valor_definido']?></td>
                    <td class="text-center">R$ <?=$despesa['valor']?></td>
                    <th class="text-center">
                        <a class="btn btn-info" href="<?=URL;?>Despesa/editar/<?=$despesa['id_despesa'];?>">Alterar</a>
                        <?php if(isset($data['btn'])){echo "<a class='btn btn-warning' href=". URL . "Despesa/desabilitar/{$despesa['id_despesa']}'>Desabilitar</a>";} ?> 
                        <a class="btn btn-danger" href="<?=URL;?>Despesa/deletar/<?=$despesa['id_despesa'];?>">Excluir</a> 
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-danger" href="<?=URL;?>Despesa/listarInativos">Listar  Inativas</a> 
    <a class="btn btn-info" href="<?=URL;?>Despesa/listar">Listar Ativas</a> 
</div>