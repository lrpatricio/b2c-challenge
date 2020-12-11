<?php

namespace api\app\controllers\site;

use api\app\models\Categories;
use api\core\app\ControllerSample;
use api\core\helpers\Json;
use Psr\Http\Message\ResponseInterface as Response;

class MenuController extends ControllerSample
{
    /**
     * @return Response
     */
    public function categories()
    {
        $categories = new Categories();
        return Json::response($this->getResponse(), $categories->allActive());
    }
}