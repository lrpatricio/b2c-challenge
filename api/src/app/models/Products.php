<?php

namespace api\app\models;

use api\core\app\Model;

/**
 * Class Products
 * @package api\app\models
 *
 * @property $id
 * @property $status
 * @property $price
 * @property $image
 * @property $categoryId
 */
class Products extends Model
{
    public function fillables()
    {
        return [
            'status',
            'name',
            'price',
            'image',
            'categoryId'
        ];
    }

    public function allActiveByCategory($categoryId)
    {
        return $this->all('*', 'status = 1 AND categoryId = :categoryId', [':categoryId' => $categoryId]);
    }
}