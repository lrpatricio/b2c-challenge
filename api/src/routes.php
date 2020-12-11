<?php

use api\app\controllers\admin\CategoriesController;
use api\app\controllers\admin\ProductsController;
use api\core\helpers\Directory;
use api\core\helpers\Routes;
use Slim\Factory\AppFactory;
use Slim\Interfaces\RouteCollectorProxyInterface as RouteCollectorProxy;

$app = AppFactory::create();
$app->setBasePath(Directory::getBase(__DIR__));

$app->group('/admin/categories', function (RouteCollectorProxy $group)
{
    Routes::groupCrud($group, CategoriesController::class);
});
$app->group('/admin/products', function (RouteCollectorProxy $group)
{
    Routes::groupCrud($group, ProductsController::class);
});

$app->run();