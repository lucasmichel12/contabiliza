<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

    <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content shadow p-3 mb-5 bg-white rounded">
                    <div class="login-logo">
                        <a href="index.html">
                            <img class="align-content" src="<?= URL;?>public/img/logo.png" alt="Contabiliza">
                        </a>
                    </div>
                    <div class="login-form">
                        <form name="login" action="<?=URL;?>Login\logar" method="POST">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="login" class="form-control" name="login" required placeholder="Digite seu login...">
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="senha" required placeholder="Digite sua senha">
                            </div>
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Entrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> 

    <div class="clearfix"></div>
 
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
      
    </div>
</div>
<!-- .animated -->
</div>



<!-- <body class="bg-login">
    <main>
        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content shadow p-3 mb-5 bg-white rounded">
                    <div class="login-logo">
                        <a href="index.html">
                            <img class="align-content" src="<?= URL;?>public/img/logo.png" alt="Contabiliza">
                        </a>
                    </div>
                    <div class="login-form">
                        <form name="login" action="<?=URL;?>Login\logar" method="POST">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="login" class="form-control" name="login" required placeholder="Digite seu login...">
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="senha" required placeholder="Digite sua senha">
                            </div>
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Entrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->