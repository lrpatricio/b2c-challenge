<?php

namespace api\core\app\interfaces;

interface IModel
{
    /**
     * @param string $fields
     * @param string $where
     * @param array $arrayBind
     * @param bool $limit
     * @return mixed
     *
     * Obter todos objetos
     */
    public function all($fields = '*', $where = '', $arrayBind = [], $limit = false);

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