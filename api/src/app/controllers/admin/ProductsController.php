<?php

namespace api\app\controllers\admin;

use api\app\models\Products;
use api\core\app\ControllerAdmin;

class ProductsController extends ControllerAdmin
{
    function getObjectModel()
    {
        return new Products();
    }
}