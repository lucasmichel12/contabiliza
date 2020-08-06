<div class="content full-height">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Relatorio</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?= URL; ?>Usuario">Despesa</a></li>
        </ol>
    </nav>
    <form class="mt-4 shadow p-3 mb-5 bg-white rounded" action="<?= URL; ?>Relatorio/relDespesa" method="POST">
        <div class="form-row">
            <div class="col-lg-4 col-md-4 col-sm-12 pad-bottom-10">
                <label for="">Data Inicial</label>
                <input type="date" class="form-control"  name="dataIni">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 pad-bottom-10">
                <label for="">Data Final</label>
                <input type="date" class="form-control" name="dataFim">
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-4 col-md-4 col-sm-12 pad-bottom-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="selectDespesas">Despesa</label>
                    </div>
                    <select class="custom-select" id="selectDespesas" name="id_despesa">
                        <option value="0">Todas</option>
                        <?php foreach ($data['despesas'] as $despesa) { ?>
                            <option value="<?= $despesa['id_despesa']; ?>" valor="<?= $despesa['valor']; ?>"><?= $despesa['descricao']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <button type="submit" class="btn btn-sucesso float-right ml-3">Gerar</button>
            </div>
        </div>
    </form>
</div>