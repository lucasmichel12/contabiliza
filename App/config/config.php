<?php

//Mostra qualquer problema com o codigo 
define('ENVIRONMENT', 'development');


if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev')
{
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}



//Setendo algumas constantes para segura valores que seram frequentemente usados durante o projeto
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);


//Setando Constantes para o Banco de Dados
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'bdcontabiliza');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');