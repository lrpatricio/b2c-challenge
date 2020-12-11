<?php

namespace api\app\models;

use api\core\app\Model;

/**
 * Class Categories
 * @package api\app\models
 *
 * @property $id
 * @property $status
 * @property $name
 * @property $color
 */
class Categories extends Model
{
    public function allActive()
    {
        return $this->all('*', 'status = 1');
    }

    public function fillables()
    {
        return [
            'status',
            'name',
            'color'
        ];
    }
}