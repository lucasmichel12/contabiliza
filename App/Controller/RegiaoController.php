<?php


namespace Contabiliza\Controller;

use Contabiliza\Model\Regiao;

class RegiaoController
{
    private $id;
    private $Regiao;

    public function __construct()
    {
        $this->getId();
        $this->Regiao = new Regiao();
    }

    public function index()
    {
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/cadastro/regiao.php';
        require APP . 'View/_template/footer.php';
    }

    public function insert()
    {
        if(isset($_POST['id_regiao']))
        {
            $this->Regiao->update(intval($_POST['id_regiao']), $_POST['descricao'], intval($_POST['percentual']), $_POST['ativo']);

        } else {
            $this->Regiao->insert($_POST['descricao'], intval($_POST['percentual']), $_POST['ativo']);
            
        }

        header("location:" . URL . "Regiao/");
    }

    public function listar()
    {
        $regioes = $this->Regiao->listAll();
        $btnHabilitar = true;
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/lista/regiao.php';
        require APP . 'View/_template/footer.php';
    }

    public function listarInativos()
    {
        $regioes = $this->Regiao->listAllInativos();
        
        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/lista/regiao.php';
        require APP . 'View/_template/footer.php';
    }

    public function altera()
    {
        $regiao = $this->Regiao->getOne($this->id);

        require APP . 'View/_template/header.php';
        require APP . 'View/_template/main.php';
        require APP . 'View/alteracao/regiao.php';
        require APP . 'View/_template/footer.php';
        
    }

    public function deleta()
    {
        $this->Regiao->delete($this->id);
        header("location:" . URL . "Regiao/listar");
    }

    public function desabilita()
    {
        $this->Regiao->desabilita($this->id);
        header("location:" . URL . "Regiao/listar");
    }



    //Função temporaria até eu achar uma forma melhor kkkk
    public function getId()
    {
        if(isset($_GET['url']))
        {
            $url = $_GET['url'];
            $url = explode('/', $url);
            $this->id = $url[2];
        }
    }
}