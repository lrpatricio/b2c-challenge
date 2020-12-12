<?php

namespace api\app\controllers\site;

use api\app\models\Categories;
use api\app\models\Products;
use api\core\app\ControllerSample;
use api\core\helpers\Json;
use Psr\Http\Message\ResponseInterface as Response;

class ProductsController extends ControllerSample
{
    /**
     * @param $categoryId
     * @return Response
     */
    public function get($categoryId)
    {
        $categories = new Products();
        return Json::response($this->getResponse(), $categories->allActiveByCategory($categoryId));
    }
}