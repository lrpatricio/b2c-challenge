<?php

namespace api\core\app;

use api\core\app\interfaces\IModel;
use api\core\db\Connection;
use PDO;
use ReflectionClass;

abstract class Model implements IModel
{
    private $tableId;
    private $table;
    private $conn;

    public function __construct()
    {
        $this->tableId = 'id';
        $this->table = strtolower((new ReflectionClass($this))->getShortName());
        $this->conn = Connection::open();
    }

    /**
     * @return PDO
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @return string
     */
    public function getTableId()
    {
        return $this->tableId;
    }

    /**
     * @param string $tableId
     * @return Model
     */
    public function setTableId($tableId)
    {
        $this->tableId = $tableId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     * @return Model
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function buildSelect($fields = '*', $where = '', $limit = false)
    {
        return 'SELECT '.$fields.' '
            .'FROM '.$this->getTable()
            .($where ? ' WHERE '.$where : '').($limit ? ' LIMIT '.$limit : '');
    }

    public function all($fields = '*', $where = '', $arrayBind = [], $limit = false)
    {
        $self = new static();
        $sql = $self->buildSelect($fields, $where, $limit);
        $r = $self->getConn()->prepare($sql);
        $r->execute($arrayBind);

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $sql = $this->buildSelect('*', $this->getTableId().' = :id');
        $r = $this->getConn()->prepare($sql);
        $r->execute([
            ':id' => $id
        ]);

        return $r->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM '.$this->getTable().' WHERE '.$this->getTableId().' = :id';
        $r = $this->getConn()->prepare($sql);
        $r->execute([
            ':id' => $id
        ]);
    }

    public function create()
    {
        $fields = [];
        $values = [];
        $arrayBind = [];
        foreach($this->fillables() as $field)
        {
            $fields[] = $field;
            $values[] = ':'.$field;
            $arrayBind[':'.$field] = $this->$field;
        }

        $sql = 'INSERT INTO '.$this->getTable().' ('.join(', ', $fields).') VALUES ('.join(', ', $values).')';
        $r = $this->getConn()->prepare($sql);
        $r->execute($arrayBind);
    }

    public function update($id)
    {
        $fieldsUpdate = [];
        $arrayBind = [
            ':id' => $id
        ];
        foreach($this->fillables() as $field)
        {
            $fieldsUpdate[] = $field.' = :'.$field;
            $arrayBind[':'.$field] = $this->$field;
        }

        $sql = 'UPDATE '.$this->getTable().' SET '.join(', ', $fieldsUpdate).' WHERE '.$this->getTableId().' = :id';
        $r = $this->getConn()->prepare($sql);
        $r->execute($arrayBind);
    }

    /**
     * @return array
     */
    abstract function fillables();
}