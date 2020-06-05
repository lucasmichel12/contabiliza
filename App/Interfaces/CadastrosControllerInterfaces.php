<?php


namespace Contabiliza\Interfaces;


interface CadastrosControllerInterfaces
{

    //* Carrega a página inicial do cadastro
    public function index();

    //* Carrega a listagem dos registros ativos
    public function listar();

    //* Carrega a listagem dos registro inativos
    public function listarInativos();

    //* Carrega um formulário com os campos preenchidos pela registro cujo ID foi passado pela URL
    public function editar();

    //* Chama a função insert() dentro da Model correspondente para inserir um novo registro no banco ou alterar um existente
    public function inserir();

    //* Chama a função delete() dentro da Model correspondente e deleta o registro
    public function deletar();

    //* Chama a função inactivate() dentro da Model correspondente e muda o campo 'ativo' de '0' para '1'
    public function desabilitar();

    //* Função para setar a propriedade ID, usando a variavel que é passado pela URL
    public function setId();
}