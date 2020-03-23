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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/estilo.css">  
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
   

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->


    <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>
<body>
    <?php
        if (!isset ($_SESSION["usuario"]["id"]) )
        {
            include "recursos/login.php";

        } else {

            $rota = "recursos/home";

            if (isset($_GET["param"]))
            {
                $rota = trim($_GET["param"]);
            }

            $url = explode("/", $rota);
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
