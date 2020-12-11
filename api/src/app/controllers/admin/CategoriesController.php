<?php

namespace api\app\controllers\admin;

use api\app\models\Categories;
use api\core\app\ControllerAdmin;

class CategoriesController extends ControllerAdmin
{
    function getObjectModel()
    {
        return new Categories();
    }
}