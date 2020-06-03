<?php

namespace Contabiliza\Core;

use Contabiliza\Controller\LoginController;

class App
{
    /** @var null A Controller */
    private $url_controller = null;

    /** @var null O metodo que será chamado dentro da controller "action" */
    private $url_action = null;

    /** @var array Parametros da URL */
    private $url_params = array();


    /**
     * Inicio da aplicação:
     * Analisa os elementos da URL e chama o controller/metodo solicitado
     */
    public function __construct()
    {
        //Prepara a URL e seta os Valores da Controller, Action e Parametros
        $this->splitUrl();

        //Verifica o controller: sem controller? então inicia a home definida abaixa(Controller e Método)
        if(!$this->url_controller)
        {
            //Verifica se está logado
            if(!isset($_SESSION["logado"]["id"]))
            {
                $page = new \Contabiliza\Controller\LoginController(); //Inicia a controller
                $page->index(); //Chama um dos metodos da controller acima
                

            } else {
                $page = new \Contabiliza\Controller\HomeController(); //Inicia a controller
                $page->index(); //Chama um dos metodos da controller acima
            }

        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->url_controller) . 'Controller.php')){
            
            //Se a controller existir então vamos cria-lá
            $controller = "\\Contabiliza\\Controller\\" . ucfirst($this->url_controller) . 'Controller';
            
            //Verifica se está logado
            if(!isset($_SESSION["logado"]["id"]))
            {
                $this->url_controller = new LoginController();

            } else {

                $this->url_controller = new $controller();//Instancia um objeto de forma dinamica
            }
        
            //Agora vamos verificar se o metodo dentro da Controller existe
            if(method_exists($this->url_controller, $this->url_action) && 
                is_callable(array($this->url_controller, $this->url_action)))
            {
                //Verifica se os parametros foram passados
                if(!empty($this->url_params))
                {
                    //Chama o metodo e passa os parametros
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {

                    //Se não foram passados parametros apenas chama a função sem passagem de parametros
                    $this->url_controller->{$this->url_action}();
                }


            } else {
                if(strlen($this->url_action) == 0)
                {
                    //Se não houver um metodo então chamar o metodo padrao das classes "index()"
                    $this->url_controller->index();

                } else {
                    //Caso não houver um "index()" então chamaremos a controller ErroController
                    $page = new \Contabiliza\Controller\ErrorController();
                    $page->index();
                }
            }
        } else {

            $page = new \Contabiliza\Controller\ErrorController();
            $page->index();
        }
        
    }

    /**
     * Pega e separa a URL
     */
    public function splitUrl()
    {
        if(isset($_GET['url'])) // A 'url' foi setada no arquivo .htaccess dentro da pasta public
        {
            //Separa a URL
            $url = trim($_GET['url'], '/'); //Retira a ultima '/' (Para não conter um indice vazio quando for fazer explode())
            $url = filter_var($url, FILTER_SANITIZE_URL); // Filtra e remove os caracteres ilegais da URL
            $url = explode('/', $url); // Cria um array separando os elementos por '/'

            //Coloca os valores da URL de acordo com suas propriedades usando operador ternario
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            unset($url[0], $url[1]);//Remove o Controller e a Action da URL separada

            $this->url_params = array_values($url);//Organiza e seta os parametros da URL
        }
    }    
}