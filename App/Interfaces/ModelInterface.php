<?php

namespace Contabiliza\Interfaces;


interface ModelInterface
{
    //* Função para fazer o insert de um novo registro na tabela
    public function insert();

    //* Função para fazer o Update do registro na tabela
    public function update();

    //* Função para buscar um registro na tabela através do ID do registro
    public function getOne(Int $id);

    //* Função para listar todos os registro ativos da tebela
    public function listActives();

    //* Função para listar todos os registro inativos da tabela
    public function listInactives();

    //* Função para deletar um campo da tabela através do ID do registro
    public function delete(Int $id);

    //* Função para inativar um registro na tabela, colocando o campo 'ativo' como 'FALSE'
    public function inactivate(Int $id);

}