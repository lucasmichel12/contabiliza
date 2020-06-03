<?php
//Define uma constante que segura o caminho do projeto Ex: "C:\xampp\htdocs\contabiliza\"
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

//Define uma constante que segura o caminho da Aplicação Ex:
define('APP', ROOT . 'App' . DIRECTORY_SEPARATOR);

//Carregando o autoload do Composer
require ROOT . 'vendor/autoload.php';

//Carrega as configurações
require APP . 'config/config.php';

//Carrega a inicia a aplicação
use Contabiliza\Core\App;

session_start();
$_SESSION['logado'] = array("id"=>1);
$app = new App();
