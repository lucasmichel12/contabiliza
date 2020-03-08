<?php
    require_once("config/MySqlPDO.php");
    require_once("config/mensagens.php");

    if($_POST)
    {
        if (isset($_POST['login']) && isset($_POST['senha']))
        {
            $login = trim($_POST['login']);
            $senha = trim($_POST['senha']);
            $msg = new Mensagens();

            if(!empty($login) && !empty($senha))
            {
                $pdo = new Sql();
                $data = $pdo->select("SELECT id, login, senha, nome, ativo, admin FROM colaborador WHERE login = :login LIMIT 1", array(":login"=>$login));
                 

                if(!empty($data)){

                    if(password_verify($senha,$data->senha))
                    {
                        $_SESSION['usuario'] = array("id"=>$data->id,
                                                    "login"=>$data->login,
                                                    "nome"=>$data->nome,
                                                    "ativo"=>$data->ativo,
                                                    "admin"=>$data->admin);

                        echo "<script>location.href='recursos/home'</script>";

                    } else {
                        $msg::mensagem("Senha Inválida!!");
                    }

                } else {
                    $msg::mensagem("Login inválido!");
                }
                
            } else {
                $msg::mensagem("Digite seu Login e senha!");
            }

        }
    }
    
?>
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="public/images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form name="login" method="POST">
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
    </div>

