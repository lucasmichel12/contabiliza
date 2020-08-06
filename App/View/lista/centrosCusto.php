<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><strong>Centros de Custo cadastrados</strong></li>
        </ol>
    </nav>
    <table id="example" class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <thead>
            <tr>
                <th scope="col">Descrição</th>
                <th class="text-center" scope="col">CNPJ</th>
                <th class="text-center" scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['centroscusto'] as $item) { ?>
                <tr>
                    <td><?= $item['descricao'] ?></td>
                    <td class="text-center cnpj"><?= $item['cnpj'] ?></td>
                    <th class="text-center">
                        <a class="btn btn-info" href="<?= URL; ?>CentroCusto/editar/<?= $item['idcentro_custo']; ?>">Alterar</a>
                        <?php if ($data['btn']) {
                            echo "<button class='btn btn-warning' onclick=desabilitar('" . URL . "CentroCusto/desabilitar/{$item['idcentro_custo']}')>Desabilitar</button>";
                        } ?>
                        <button class="btn btn-danger" onclick="excluir('<?= URL; ?>CentroCusto/deletar/<?= $item['idcentro_custo']; ?>')">Excluir</button>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-danger" href="<?= URL; ?>CentroCusto/listarInativos">Listar Inativas</a>
    <a class="btn btn-info" href="<?= URL; ?>CentroCusto/listar">Listar Ativas</a>
</div>