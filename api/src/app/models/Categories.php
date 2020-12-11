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
    public function fillables()
    {
        return [
            'status',
            'name',
            'color'
        ];
    }
}