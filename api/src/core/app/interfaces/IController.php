<?php

namespace api\core\app\interfaces;

interface IController
{
    /**
     * @return mixed
     *
     * Obter todos objetos
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     *
     * Obter um objeto
     */
    public function find($id);

    /**
     * @param $id
     * @return mixed
     *
     * Deletar um objeto
     */
    public function delete($id);

    /**
     * @return mixed
     *
     * Criar um objeto
     */
    public function create();

    /**
     * @param $id
     * @return mixed
     *
     * Atualizar objeto
     */
    public function update($id);
}