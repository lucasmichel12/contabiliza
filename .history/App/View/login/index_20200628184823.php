<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

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
                    </form>
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