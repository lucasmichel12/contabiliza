<?php


namespace Contabiliza\Controller;

use Contabiliza\Interfaces\CadastrosControllerInterfaces;
use Contabiliza\Model\Regiao;

class RegiaoController implements CadastrosControllerInterfaces
{
    private $id;
    private $Regiao;

    // Construct Inicia as duas variaveis acima
    public function __construct()
    {
        $this->setId();
        $this->Regiao = new Regiao();
    }

    public function index()
    {
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/cadastro/regiao.php';
        require APP . 'View/_template/footer.php';
    }

    public function listar()
    {
        $regioes = $this->Regiao->listActives();
        $btnHabilitar = true;
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/lista/regioes.php';
        require APP . 'View/_template/footer.php';
    }

    public function listarInativos()
    {
        $regioes = $this->Regiao->listInactives();
        
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/lista/regioes.php';
        require APP . 'View/_template/footer.php';
    }

    public function editar()
    {
        $regiao = $this->Regiao->getOne($this->id);

        require APP . 'View/_template/header.php';
        require APP . 'View/_template/menu.php';
        require APP . 'View/edita/regiao.php';
        require APP . 'View/_template/footer.php';
        
    }

    public function inserir()
    {
        if(isset($_POST['id_regiao']))
        {
            $this->Regiao->update(intval($_POST['id_regiao']), $_POST['descricao'], intval($_POST['percentual']), $_POST['ativo']);

        } else {
            $this->Regiao->insert($_POST['descricao'], intval($_POST['percentual']), $_POST['ativo']);
            
        }

        header("location:" . URL . "Regiao/");
    }

    public function deletar()
    {
        $this->Regiao->delete($this->id);
        header("location:" . URL . "Regiao/listar");
    }

    public function desabilitar()
    {
        $this->Regiao->inactivate($this->id);
        header("location:" . URL . "Regiao/listar");
    }

    public function setId()
    {
        if(isset($_GET['url']))
        {
            $url = $_GET['url'];
            $url = explode('/', $url);
            $this->id = $url[2];
        }
    }
}