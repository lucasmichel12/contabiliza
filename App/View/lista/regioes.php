<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><strong>Regiões cadastradas</strong></li>
        </ol>
    </nav>
    <table class="table table-hover border shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <thead>
            <tr>
                <th scope="col">Descrição</th>
                <th class="text-center" scope="col">Percentual de acrescimo</th>
                <th class="text-center" scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['regioes'] as $regiao) { ?>
                <tr>
                    <td width='30%'><?= $regiao['descricao'] ?></td>
                    <td class="text-center" width='30%'><?= $regiao['percentual'] ?>%</td>
                    <th class="text-center">
                        <a class="btn btn-info" href="<?= URL; ?>Regiao/editar/<?= $regiao['id_regiao']; ?>">Alterar</a>
                        <?php if (isset($data['btn'])) {
                            echo "<button class='btn btn-warning' onclick=desabilitar('" . URL . "Regiao/desabilitar/{$regiao['id_regiao']}')>Desabilitar</button>";
                        } ?>
                        <button class="btn btn-danger" onclick="excluir('<?= URL; ?>Regiao/deletar/<?= $regiao['id_regiao']; ?>')">Excluir</button>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-danger" href="<?= URL; ?>Regiao/listarInativos">Listar Inativas</a>
    <a class="btn btn-info" href="<?= URL; ?>Regiao/listar">Listar Ativas</a>
</div>