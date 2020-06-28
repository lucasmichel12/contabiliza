<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Inicio Dados geral  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-check"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">10</span></div>
                                    <div class="stat-heading">Solicitações Concluídas</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-note2"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">6</span></div>
                                    <div class="stat-heading">Solicitações em Aberto</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-clock"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">13</span></div>
                                    <div class="stat-heading">Solicitações Pendentes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">27</span></div>
                                    <div class="stat-heading">Funcionários Ativos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Fim de Dados geral -->

    <div class="clearfix"></div>

    <!-- Orders -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Solicitações pendentes </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h table-hover">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Usuario</th>
                                        <th>Centro de Custo</th>
                                        <th>Valor</th>
                                        <th class="text-center">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>04/06/2020</td>
                                        <td>Lucas Michel de Souza</td>
                                        <td>Sicoob</td>
                                        <td>R$ <span class="count">231</span></td>
                                        <td class="text-center">
                                            <a class="btn btn-success btn-sm" href="<?= URL; ?>#">Aprovar</a>
                                            <a class="btn btn-info btn-sm" href="<?= URL; ?>#">Auditar</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24/05/2020</td>
                                        <td>Larissa Carvalho</td>
                                        <td>Ecode</td>
                                        <td>R$ <span class="count">159</span></td>
                                        <td class="text-center">
                                            <a class="btn btn-success btn-sm" href="<?= URL; ?>#">Aprovar</a>
                                            <a class="btn btn-info btn-sm" href="<?= URL; ?>#">Auditar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.orders -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Despesas mais recorrentes</h4>
                    <div class="flot-container">
                        <div id="flot-pie" class="flot-pie-container" style="padding: 0px; position: relative;"><canvas class="flot-base" width="574" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 275px;"></canvas><canvas class="flot-overlay" width="574" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 275px;"></canvas>
                            <div class="legend">
                                <div style="position: absolute; width: 59px; height: 105px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                                <table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454">
                                    <tbody>
                                        <tr>
                                            <td class="legendColorBox">
                                                <div style="border:1px solid #ccc;padding:1px">
                                                    <div style="width:4px;height:0;border:5px solid #8fc9fb;overflow:hidden"></div>
                                                </div>
                                            </td>
                                            <td class="legendLabel">Janta</td>
                                        </tr>
                                        <tr>
                                            <td class="legendColorBox">
                                                <div style="border:1px solid #ccc;padding:1px">
                                                    <div style="width:4px;height:0;border:5px solid #007BFF;overflow:hidden"></div>
                                                </div>
                                            </td>
                                            <td class="legendLabel">Almoço</td>
                                        </tr>
                                        <tr>
                                            <td class="legendColorBox">
                                                <div style="border:1px solid #ccc;padding:1px">
                                                    <div style="width:4px;height:0;border:5px solid #00c292;overflow:hidden"></div>
                                                </div>
                                            </td>
                                            <td class="legendLabel">Hotel</td>
                                        </tr>
                                        <tr>
                                            <td class="legendColorBox">
                                                <div style="border:1px solid #ccc;padding:1px">
                                                    <div style="width:4px;height:0;border:5px solid #F44336;overflow:hidden"></div>
                                                </div>
                                            </td>
                                            <td class="legendLabel">Passagem Aerea</td>
                                        </tr>
                                        <tr>
                                            <td class="legendColorBox">
                                                <div style="border:1px solid #ccc;padding:1px">
                                                    <div style="width:4px;height:0;border:5px solid #32c39f;overflow:hidden"></div>
                                                </div>
                                            </td>
                                            <td class="legendLabel">Outros</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Quantidade de Solicitações de reembolso</h4>
                    <div class="flot-container">
                        <div id="chart1" style="width: 100%; height: 275px; padding: 0px; position: relative;"><canvas class="flot-base" width="574" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 275px;"></canvas>
                            <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 52px; top: 256px; left: 261px; text-align: center;">12/09</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 52px; top: 256px; left: 518px; text-align: center;">12/15</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 256px; left: 90px; text-align: center;">12/05</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 256px; left: 175px; text-align: center;">12/07</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 256px; left: 346px; text-align: center;">12/11</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 256px; left: 432px; text-align: center;">12/13</div>
                                </div>
                                <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 242px; left: 0px; text-align: right;">6320</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 193px; left: 0px; text-align: right;">6340</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 145px; left: 0px; text-align: right;">6360</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 97px; left: 0px; text-align: right;">6380</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 49px; left: 0px; text-align: right;">6400</div>
                                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 0px; text-align: right;">6420</div>
                                </div>
                            </div><canvas class="flot-overlay" width="574" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 275px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .animated -->
</div>