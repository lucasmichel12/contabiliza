<div class="content pad-responsivo">

    <!-- Solicitações Abertas -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Relatórios Gerenciais </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Usuário</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Data</th>
                                        <th class="text-center" scope="col">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['solicitacoes'] as $solicitacao) { ?>
                                        <tr>
                                            <td><?= $solicitacao['nome'] ?></td>
                                            <td><?= $solicitacao['descricao'] ?></td>
                                            <td><?= $solicitacao['data'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-warning" href="<?= URL; ?>Solicitacao/aberta/<?= $solicitacao['id_solicitacao']; ?>">Continuar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /Solicitações Pendentes -->

<div class="content pad-responsivo">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Relatórios Gerenciais</li>
            <!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?=URL;?>Usuario">Usuário</a></li> -->
        </ol>
    </nav> 
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