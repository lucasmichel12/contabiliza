<?php
	//iniciar a sessao
	session_start();

	//configurar para serem mostrados os erros do php
	ini_set("display_error",1);
	ini_set("display_startup_errors",1);
	error_reporting(E_ALL);

	//incluir a conexao com o banco e as funcoes
    require_once('config/MySqlPDO.php');
    $porta = $_SERVER["SERVER_PORT"];
	

?>
<!doctype html>
<head>
<base href="http://<?=$_SERVER['SERVER_NAME'] . ":$porta" .  $_SERVER['SCRIPT_NAME']?>">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Contabiliza </title>
    <meta name="description" content="Contabiliza">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="public/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <?php
        if (!isset ($_SESSION["usuario"]["id"]) )
        {
            include("recursos/login.php");

        } else {

            $pagina = "recursos/home";

            if (isset($_GET["param"]))
            {
                $pagina = trim($_GET["param"]);
            }

            $url = explode("/", $pagina);
            $pasta = $url[0];
            $arquivo = $url[1];
            
            $rota = "$pasta/$arquivo.php";

            include "recursos/main.php";

        }
    ?>
    

</body>

    <!-- JS -->
    <script src="public/bootstrap/jquery/jquery.min.js"></script>
    <script src="public/bootstrap/popper/popper.min.js"></script>
    <script src="public/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/bootstrap/jquery/jquery.matchHeight.min.js"></script>
    <script src="public/assets/js/main.js"></script>
